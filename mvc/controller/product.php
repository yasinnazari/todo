<?

class ProductController {

    public function search()
    {
        $sortType = post('sortType');
        $keyword = post('keyword');
        $viewType = post('viewType');

        $db = Db::getInstance();
        $products = $db->query("SELECT * FROM pym_product WHERE title LIKE '%$keyword%' ORDER BY $sortType");
        $data['products'] = $products;

        if ($viewType == 'grid') {
            session_set('viewType', 'grid');
            View::renderPartial("/payment/products-grid.php", $data);
        } else {
            session_set('viewType', 'linear');
            View::renderPartial("/payment/products-linear.php", $data);
        }
    }

    // ----------------------------------------------------------------------

    public function cartAddress()
    {
        $db = Db::getInstance();
        $cart = $this->getcartOrCreate();

        $orders = $db->query("SELECT * FROM pym_order LEFT OUTER JOIN pym_product ON pym_order.product_id=pym_product.product_id WHERE pym_order.cart_id=cart_id", array(
        ));

        $data['orders'] = $orders;

        View::render("/payment/cart.php", $data);
    }

    // ----------------------------------------------------------------------

    public function previewCart()
    {
        $db = Db::getInstance();
        $cart = $this->getcartOrCreate();

        $orders = $db->query("SELECT * FROM pym_order LEFT OUTER JOIN pym_product ON pym_order.product_id=pym_product.product_id WHERE pym_order.cart_id=cart_id", array());

        $data['orders'] = $orders;

        View::render("/payment/cart-preview.php", $data);
    }

    // ----------------------------------------------------------------------

    public function removeFromCart($orderId)
    {
        $db = Db::getInstance();
        $cart = $this->getcartOrCreate();

        ProductModel::remove_order_by_id($orderId);
        $itemCounts = $db->first("SELECT COUNT (pym_order.order_id) AS total FROM pym_order LEFT OUTER JOIN pym_cart ON pym_order.cart_id=pym_cart.cart_id", array(), 'total');
        $data['cartItemsCount'] = $itemCounts;

        echo json_encode($data);
    }

    // addToCart -----------------------------------------------------------------

    public function addToCart($productId)
    {
        $db = Db::getInstance();
        $cart = $this->getcartOrCreate();

        ProductModel::insert_order($cart['cart_id'], $productId, 1);

        $itemCounts = $db->first("SELECT COUNT(pym_order.order_id) AS total FROM pym_order LEFT OUTER JOIN pym_cart ON pym_order.cart_id=pym_cart.cart_id", array(), 'total');
        $data['cartItemsCount'] = $itemCounts;

        echo json_encode($data);
    }

    // AllCartChangeNumber -------------------------------------------------------

    public function changeQuantity()
    {
        $orderId = post('orderId');
        $quantity = post('quantity');

        ProductModel::update_order_quantity_orderId($orderId, $quantity);
    }

    private function findcart()
    {
        $db = Db::getInstance();

        $userId = getUserId();
        $sessionId = session_id();

        $cart = null;

        if ($userId != 0) {
            $cart = ProductModel::fetch_openCart_by_userId($userId);
            if ($cart != null){
                $cart = ProductModel::update_openCartSession_by_cartId($userId);
                return $cart;
            }
        }

        if ($cart == null) {
            $cart = $db->first("SELECT * FROM pym_cart WHERE payed!=1 AND session_id=session_id", array(
                'session_id' => $sessionId,
            ));

            if ($userId != 0) {
               ProductModel::latest_cart_sessionId_and_cartId($cart['cart_id'], $userId);
            }
        }

        if ($cart != null){
            return $cart;
        }

        return null;
    }

    // ----------------------------------------------------------------------

    public function getcartOrCreate()
    {
        $db = Db::getInstance();

        $userId = getUserId();
        $sessionId = session_id();

        $cart = $this->findcart();
        if ($cart != null){
            return $cart;
        }

        $db->insert("INSERT INTO pym_cart (user_id, session_id, payed) VALUES (user_id, session_id, 0)", array(
            'user_id' => $userId,
            'session_id' => $sessionId,
        ));


        $cart = $this->findcart();
        return $cart;
    }

}


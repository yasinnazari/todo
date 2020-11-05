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
            View::renderPartial("/mvc/view/payment/products-grid.php", $data);
        } else {
            session_set('viewType', 'linear');
            View::renderPartial("/mvc/view/payment/products-linear.php", $data);
        }
    }

    // ----------------------------------------------------------------------

    public function cartAddress()
    {
        $db = Db::getInstance();
        $cart = $this->getCartOrCreate();

        $orders = $db->query("SELECT * FROM pym_order LEFT OUTER JOIN pym_product ON pym_order.product_id=pym_product.product_id WHERE pym_order.cart_id=cart_id", [
        ]);

        $data['orders'] = $orders;

        View::render("/mvc/view/payment/cart.php", $data);
    }

    // ----------------------------------------------------------------------

    public function previewCart()
    {
        $db = Db::getInstance();
        $cart = $this->getCartOrCreate();

        $orders = $db->query("SELECT * FROM pym_order LEFT OUTER JOIN pym_product ON pym_order.product_id=pym_product.product_id WHERE pym_order.cart_id=cart_id", [
        ]);

        $data['orders'] = $orders;

        View::render("/mvc/view/payment/cart-preview.php", $data);
    }

    // ----------------------------------------------------------------------

    public function removeFromCart($orderId)
    {
        $db = Db::getInstance();
        $cart = $this->getCartOrCreate();

        ProductModel::remove_order_by_id($orderId);
        $itemCounts = $db->first("SELECT COUNT (pym_order.order_id) AS total FROM pym_order LEFT OUTER JOIN pym_cart ON pym_order.cart_id=pym_cart.cart_id", [], 'total');
        $data['cartItemsCount'] = $itemCounts;

        echo json_encode($data);
    }

    // addToCart -----------------------------------------------------------------

    public function addToCart($productId)
    {
        $db = Db::getInstance();
        $cart = $this->getCartOrCreate();

        ProductModel::insert_order($cart['cart_id'], $productId, 1);

        $itemCounts = $db->first("SELECT COUNT(pym_order.order_id) AS total FROM pym_order LEFT OUTER JOIN pym_cart ON pym_order.cart_id=pym_cart.cart_id", [], 'total');
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
        $userId = getUserId();
        $sessionId = session_id();

        $cart = null;

        if (!isGuest()) {
            $cart = ProductModel::fetch_openCart_by_userId($userId);
            if ($cart != null){
                ProductModel::update_openCartSession_by_cartId($cart['cart_id']);
                return $cart;
            }
        }

        $cart = ProductModel::fetch_openCart_by_sessionId($sessionId);

        if ($cart != null) {
            if (!isGuest()) {
                ProductModel::update_openCartUserId_by_cartId($cart['cart_id'], $userId);
            }
        }

        return $cart;
    }

    // ----------------------------------------------------------------------

    public function getCartOrCreate()
    {
        $userId = getUserId();

        $cart = $this->findcart();
        if ($cart != null){
            return $cart;
        }

        ProductModel::insert_cart($userId);

        $cart = $this->findcart();
        return $cart;
    }

}


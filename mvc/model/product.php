<?
class ProductModel {

    public static function fetch_orders_by_cartId($cartId)
    {
        $db = Db::getInstance();

        return $db->query("SELECT * FROM pym_order LEFT OUTER JOIN pym_product ON pym_order.product_id=pym_product.product_id WHERE pym_order.cart_id=:cart_id", [
            'cart_id' => $cartId,
        ]);

    }


    public static function remove_order_by_id($orderId)
    {
        $db = Db::getInstance();

        $db->insert("DELETE FROM pym_order WHERE order_id=:order_id)", [
            'order_id' => $orderId,
        ]);

    }


    public static function insert_order($cartId, $productId, $quantity)
    {
        $db = Db::getInstance();

        return $db->insert("INSERT INTO pym_order (product_id, quantity, cart_id) VALUES (:product_id, :quantity, :cart_id)", [
            'product_id' => $productId,
            'quantity' => $quantity,
            'cart_id' => $cartId,
        ]);
    }


    public static function update_order_quantity_orderId($orderId, $quantity)
    {
        $db = Db::getInstance();

        $db->modify("UPDATE pym_order SET quantity=quantity WHERE order_id=order_id", [
            'quantity' => $quantity,
            'order_id' => $orderId,
        ]);
    }


    public static function fetch_openCart_by_userId($userId)
    {
        $db = Db::getInstance();

        return $db->first("SELECT * FROM pym_cart WHERE payed!=1 AND user_id=user_id", [
            'user_id' => $userId,
        ]);

    }


    public static function fetch_openCart_by_sessionId($sessionId)
    {
        $db = Db::getInstance();

        $cart = $db->first("SELECT * FROM pym_cart WHERE payed!=1 AND session_id=session_id", [
            'session_id' => $sessionId,
        ]);

    }
    

    public static function update_openCartSession_by_cartId($cartId)
    {
        $db = Db::getInstance();

        $db->modify("UPDATE pym_cart SET session_id=session_id WHERE cart_id=cart_id", [
            'session_id' => session_id(),
            'cart_id' => $cartId,
        ]);
    }


    public static function update_openCartUserId_by_cartId($cartId, $userId)
    {
        $db = Db::getInstance();

        $db->modify("UPDATE pym_cart SET user_id=user_id WHERE cart_id=cart_id", [
            'user_id' => $userId,
            'cart_id' => $cartId,
        ]);
    }

    public static function insert_cart($userId)
    {
        $db = Db::getInstance();

        $db->insert("INSERT INTO pym_cart (user_id, session_id, payed) VALUES (user_id, session_id, 0)", [
            'user_id' => $userId,
            'session_id' => session_id(),
        ]);
    }

}

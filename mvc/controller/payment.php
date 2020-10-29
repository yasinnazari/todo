<?
class PaymentController {

    public function pay()
    {
        View::render('/payment/cart.php');
    }

    public function linearProduct()
    {
        View::render('/payment/products-linear.php');
    }

    public function gridProduct()
    {
        View::render('/payment/products-grid.php');
    }
}


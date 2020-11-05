<?
class PaymentController {

    public function pay()
    {
        View::render('/mvc/view/payment/cart.php');
    }

    public function linearProduct()
    {
        View::render('/mvc/view/payment/products-linear.php');
    }

    public function gridProduct()
    {
        View::render('/mvc/view/payment/products-grid.php');
    }
}


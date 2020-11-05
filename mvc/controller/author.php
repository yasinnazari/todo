<?php

class AuthorController {
    public function __construct()
    {
        grantAuthor();
    }

    public function defineProduct()
    {
        $title = post('title');
        if ($title == null) {
            View::render("/mvc/view/author/define-product.php");
            return;
        }

        $description = post('description');
        $brief = post('brief');
        $price = post('price');
        $discount = post('discount');

        $productId = ProductModel::add_product($title, $description, $brief, $price, $discount);
        message('scs', _product_defined);
    }

}

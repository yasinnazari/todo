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

        $file = $_FILES['image']['tmp_name'];
        $ext = $_FILES['image']['type'];
        $ext = str_replace("image/", ".", $ext);

        $productId = ProductModel::add_product($title, $description, $brief, $price, $discount);

        // copy($file, "/tmp/" . $productId . $ext);

        $thumb = imagecreatetruecolor(50, 50);
        list($width, $height) = getimagesize($file);

        imagepng($thumb, "/tmp/" . $productId . $ext);

        message('scs', _product_defined, true);
    }

}

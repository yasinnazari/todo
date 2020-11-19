<?php

class WsTesterController {
    public function test()
    {
        $data = curl_request("localhost/dev/workspace/web/shop/webservice/list_of_products");
        $products = json_decode($data, true);

        foreach ($products as $product){
            echo $product['product_id'];
            echo "<br>";
            echo $product['title'];
            echo "<hr>";
        }
    }
}

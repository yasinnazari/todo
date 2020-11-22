<?php

class WsTesterController {

    public function test($sortTypeIndex = 1)
    {
        $data = curl_request("localhost/dev/workspace/web/shop/webservice/list_of_products/" . $sortTypeIndex);
        $products = json_decode($data, true);

        echo "<table style='border: 1px solid #080'>";
        foreach ($products as $product) {
            echo "<tr>";
            echo "<td style='border: 1px solid #080'>" . $product['product_id'] . "</td>";
            echo "<td style='border: 1px solid #080'>" . $product['title'] . "</td>";
            echo "<td style='border: 1px solid #080'>" . $product['brief'] . "</td>";
            echo "<td style='border: 1px solid #080'>" . $product['price'] . "</td>";
            echo "<td style='border: 1px solid #080'>" . $product['discount'] . "</td>";
            echo "</tr>";
        }
    }

}

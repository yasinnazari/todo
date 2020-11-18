<?php
class TempController {

    function generateSampleJson()
    {
        $json = [
            "Compute config 1" => [
                "CPU" => "intel 4790K",
                "RAM" => "KinStone HyperX 16GB",
            ],

            "Compute Config 2" => [
                "CPU" => "AMD 965",
                "RAM" => "Patriot 32GB",
            ],

        ];

        $jsonEncoded = json_encode($json);
        echo $jsonEncoded;
    }

    //    function populateData(){
    //      for ($i=0; $i<200; $i++) {
    //      $productName = "#" . $i;
    //      productModel::add_product("Product ID " . $productName, "Description for " . $productName, "Brief for ". $productName, 100*$i , 0);
    //      }
    //    }


}

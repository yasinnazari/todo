<?php
class TempController {

    function generateSampleJson()
    {
        $json = '{"age":12,"name":"Yasin"}';
        $jsonDecoded = json_decode($json, true);
        echo json_encode($jsonDecoded);
    }

    //    function populateData(){
    //      for ($i=0; $i<200; $i++) {
    //      $productName = "#" . $i;
    //      productModel::add_product("Product ID " . $productName, "Description for " . $productName, "Brief for ". $productName, 100*$i , 0);
    //      }
    //    }


}

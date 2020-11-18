<?php

class WebserviceController{
    public function test()
    {
        $json = [
          'message' => 'success',
           'code' => 100,
        ];

        echo json_encode($json);
    }

    public function list_of_products()
    {
        $db = Db::getInstance();
        $result = $db->query("SELECT * FROM pym_product ORDER BY price DESC");
        print_r($result);
        echo json_encode($result);
    }
}
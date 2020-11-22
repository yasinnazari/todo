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

    public function list_of_products($sortTypeIndex)
    {
        $db = Db::getInstance();

        switch ($sortTypeIndex) {
            case 1: $sortType = "price"; break;
            case 2: $sortType = "discount"; break;
            case 3: $sortType = "creationTime"; break;
            default: $sortType = "price"; break;
        }
        $result = $db->query("SELECT * FROM pym_product ORDER BY $sortType DESC");
        echo json_encode($result);
    }
}

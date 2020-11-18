<?php

class WstesterController {
    public function test()
    {
        br();
        echo "Hello World !";
        br();br();
        br();br();
        br();br();

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "http://www.example.com");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $data = curl_exec($ch);
        curl_close($ch);

        echo $data;
    }
}
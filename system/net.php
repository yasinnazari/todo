<?php

function curl_request($url, $return = true)
{
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, $return);

    $data = curl_exec($ch);
    curl_close($ch);

    if ($return) {
        return $data;
    }
}

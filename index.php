<?php

    define('test', true);

    require_once('/var/www/html/dev/workspace/web/notes-v3/system/loader.php');


    $uri = getRequestUri();
    $uri = str_replace('/notes-v3/', '/', $uri);

    global $config;
    $route = $config['route'];

    $uri = urldecode($uri);
    foreach ($route as $alias=>$target) {
        $alias = '^' . $alias;
        $alias = str_replace('/', '\/', $alias);
        $alias = str_replace('*', '(.*)', $alias);
        if (preg_match('/'.$alias.'/', $uri)){
            $uri = preg_replace('/'.$alias.'/', $target, $uri);
        }
    }


    $parts = explode('/', $uri);
    $controller = $parts[4];
    $method = $parts[5];

    $params = array();
    for ($i=6; $i<count($parts); $i++){
        $params[] = $parts[$i];
    }

    //  "/user/profile/10" => UserController 
    $controllerClassname = ucfirst($controller) . "Controller";
    $controllerInstance = new $controllerClassname();
    call_user_func_array(array($controllerInstance, $method), $params);
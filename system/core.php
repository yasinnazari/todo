<?

    // UserModel => usermodel . Delete => Model
    // UserController => usercontroller . Delete -> Controller

    function __autoload($classname) {

        if (strhas($classname, "Model")) {
            $filename = str_replace("Model", "", $classname);
            $filename = strtolower($filename);
            require_once("/var/www/html/dev/workspace/web/todo/mvc/model/$filename.php");
            return;
        }

        if (strhas($classname, "Controller")) {
            $filename = str_replace("Controller", "", $classname);
            $filename = strtolower($filename);
            require_once("/var/www/html/dev/workspace/web/todo/mvc/controller/$filename.php");
            return;
        }
    }

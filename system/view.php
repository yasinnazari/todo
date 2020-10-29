<?php

Class View {
    public static function render($filePath, $data = array()){
        extract($data);

        ob_start();
            require_once("/var/www/html/dev/workspace/web/shop/mvc/view" . $filePath);
        $content = ob_get_clean();

        require_once("/var/www/html/dev/workspace/web/shop/theme/default.php");
    }

    public static function renderPartial($filePath, $data = array()){
        extract($data);
        $viewType = post('viewType');

        if ($viewType == 'grid') {
            $_SESSION['viewType'] = 'grid';
            require_once("/var/www/html/dev/workspace/web/shop/mvc/view/payment/products-grid.php");
        } else {
            $_SESSION['viewType'] = 'linear';
            require_once("/var/www/html/dev/workspace/web/shop/mvc/view/payment/products-linear.php");
        }
    }

}


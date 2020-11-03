<?php

Class View {
    public static function render($filePath, $data = []){
        extract($data);

        ob_start();
            require_once("/var/www/html/dev/workspace/web/shop/mvc/view" . $filePath);

        // don't remove below $content that requires for rendering template
        $content = ob_get_clean();

        require_once("/var/www/html/dev/workspace/web/shop/theme/default.php");
    }

    public static function renderPartial($filePath, $data = []){
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


<?php

Class View {

    public static function render($filePath, $data = array()){
        extract($data);

        ob_start();
            require_once($filePath);
        $content = ob_get_clean();

        require_once("/var/www/html/dev/workspace/web/notes-v3/theme/default.php");

    }

}


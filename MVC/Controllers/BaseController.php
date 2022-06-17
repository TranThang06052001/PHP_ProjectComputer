<?php

class BaseController {
    
    function renderView($view, $data = null) {
        ob_start();

        require_once(__DIR__."/../views/{$view}.php");

        $content = ob_get_contents();
        ob_end_clean();
        echo  $content;
    }
    
}
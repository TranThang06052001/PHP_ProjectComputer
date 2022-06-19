<?php

class BaseController
{

    function renderView($view, $data = null, $title, $action,$message=null)
    {
        $action=strtolower($action);
        switch ($action) {
            case  "content":
                ob_start();
                require_once(__DIR__ . "/../views/{$view}.php");
                $content = ob_get_contents();
                ob_end_clean();
                echo $content;
                break;
            case "title":
                echo  $title;
                break;
            default:
                echo "error: unknown action";
                return false;
        }
    }
}

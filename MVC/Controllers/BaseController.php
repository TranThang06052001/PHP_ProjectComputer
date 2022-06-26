<?php

require_once('MVC/Models/Product/CategoryModel.php');

require_once('MVC/Models/Product/ProductModel.php');
class BaseController
{

    function renderView($view, $data = null, $title, $action, $message = null)
    {
        $categoryModel = new CategoryModel();
        $datas = $categoryModel->getListCategorys();
        $_SESSION['categorys'] =  $datas;

        $prroductModel = new ProductModel();
        $datas = $prroductModel->getListProducts();
        $_SESSION['products'] =  $datas;
        $action = strtolower($action);
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

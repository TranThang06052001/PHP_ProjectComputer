<?php
require_once('handleURL.php');
require_once('MVC/Controllers/Users/UserController.php');
require_once('MVC/Controllers/Product/ProductController.php');
require_once('MVC/Controllers/Product/CategoryController.php');
require_once("MVC/Controllers/Manager/ManagerController.php");
class Route
{
    function str_contains(string $haystack, string $needle): bool
    {
        return '' === $needle || false !== strpos($haystack, $needle);
    }
    function __construct()
    {
    }
    function routeResult($action)
    {
        $handleurl = new handleURL();
        $path = $handleurl->getURL();
        $this->route(strtolower($path), $action);
    }


    function route($path, $action)
    {
        $ManageController = new ManagerController();
        $ProductController = new ProductController();
        $CategoryController= new CategoryController();
        if ($this->str_contains(explode("/", $path)[0], "admin")) {
            $path = !empty(str_replace('admin', '', $path)) ? $path : '/';
            switch ($path) {
                case '/':
                    return $ManageController->index("Shop Computer", $action);
                    break;
                case 'admin/login':
                    return $ManageController->Login("Login", $action);
                    break;
                case 'admin/logout':
                    return $ManageController->Logout();
                    break;
                case 'admin/register':
                    return $ManageController->Register("Register", $action);
                    break;
                case 'admin/changepassword':
                    return $ManageController->ChangeUserPassword("Change Password", $action);
                    break;
                case 'admin/productmanagement':
                    return $ProductController->index("Product", $action);
                    break;
                case 'admin/addproduct':
                    return $ProductController->AddProduct("Product",$action);
                    break;
                case 'admin/category':
                    return $CategoryController->index("Category",$action);
                    break;
                default:
                    echo "not found";
                   
            };
        }
    }
}

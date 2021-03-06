<?php
require_once('handleURL.php');
require_once('MVC/Controllers/Users/UserController.php');
require_once('MVC/Controllers/Product/ProductController.php');
require_once('MVC/Controllers/Product/CategoryController.php');
require_once('MVC/Controllers/Users/UserController.php');
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



    function route($path, $action)
    {
        $ManageController = new ManagerController();
        $ProductController = new ProductController();
        $CategoryController = new CategoryController();
        $UserController = new UserController();
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
                    return $ProductController->AddProduct("Product", $action);
                    break;
                case 'admin/updateproduct':
                    return $ProductController->UpdateProduct($_GET['id']);
                    break;
                case 'admin/deleteproduct':
                    return $ProductController->DeleteProduct();
                    break;
                case 'admin/form':
                    return $ProductController->form("", $action);
                    break;
                case 'admin/category':
                    return $CategoryController->index("Category", $action);
                    break;
                case 'admin/addcategory':
                    return $CategoryController->AddCategory("Category", $action);
                    break;
                case 'admin/updatecategory':
                    return $CategoryController->UpdateCategory();
                    break;
                case 'admin/deletecategory':
                    return $CategoryController->DeleteCategory();
                    break;
                case 'admin/employeemanager':
                    return $UserController->index("User", $action);
                    break;
                case 'admin/adduser':
                    return $UserController->formADD("User", $action);
                    break;
                default:
                    echo "not found";
            };
        }
    }
    function routeResult($action)
    {
        $handleurl = new handleURL();
        $path = $handleurl->getURL();
        return $this->route(strtolower($path), $action);
    }
}

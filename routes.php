<?php
require_once('handleURL.php');
require_once("MVC/Controllers/Manager/ManagerController.php");
require_once('MVC/Controllers/Users/UserController.php');
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
        $this->route(strtolower($path),$action);
    }


    function route($path,$action)
    {
        $ManageController = new ManagerController();
        $UserController = new UserController();
        if ($this->str_contains(explode("/", $path)[0], "admin")) {
            $path = !empty(str_replace('admin', '', $path)) ? $path : '/';

            switch ($path) {
                case '/':
                    return $ManageController->index("Shop Computer",$action);
                    break;
                case 'admin/login':
                    return $ManageController->Login("Shop Computer - Login",$action);
                    break;
                case 'admin/logout':
                    return $ManageController->Logout();
                    break;
                case 'admin/register':
                    return $ManageController->Register("Shop Computer - Register",$action);
                    break;
                default:
                    echo "not found";
            };
        }
    }
}

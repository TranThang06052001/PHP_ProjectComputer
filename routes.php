<?php
require_once(__DIR__ . '/handleURL.php');
include_once(__DIR__ . '/MVC/Controllers/Manager/ManagerController.php');
include_once(__DIR__ . '/MVC/Controllers/Users/UserController.php');
class Route
{
    function __construct()
    {
        $handleurl = new handleURL();
        $path = $handleurl->getURL();
        $this->route(strtolower($path));
    }

    function str_contains(string $haystack, string $needle): bool
    {
        return '' === $needle || false !== strpos($haystack, $needle);
    }

    function route($path)
    {

       
        $ManageController = new ManagerController();
        $UserController = new UserController();
        if ($this->str_contains(explode("/", $path)[0], "admin")) {
            $path = !empty(str_replace('admin', '', $path)) ? $path : '/';

            switch ($path) {
                case '/':
                    return $ManageController->index();
                    break;
                case 'admin/login':
                    return $ManageController->Login();
                    break;
                case 'admin/logout':
                    return $ManageController->Logout();
                    break;
                case 'admin/register':
                    return $ManageController->Register();
                    break;
                default:
                    echo "not found";
            };
        }
    }
}

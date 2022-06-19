<?php

require_once('MVC/Models/ManagerModel/ManagerModel.php');
require_once('MVC/Controllers/BaseController.php');

class ManagerController extends BaseController
{
    private  function connectModel()
    {
        $managerModel = new ManagerModel();
        return  $managerModel;
    }
    private function checkLogin($param)
    {
        include("evConfig.php");
        if (!isset($_SESSION["User"])) {
            header("Location:$host/admin/login");
        } else {
            return $param;
        }
    }
    public function index($title, $action)
    {
        $data = [];
        $this->checkLogin($this->renderView('Manager/index', $data, $title, $action));
    }
    public function Login($title, $action)
    {
        $data = [];
        include("evConfig.php");
        if (isset($_POST["password"]) && isset($_POST["username"])) {
            $User = $this->connectModel()->CheckUser($_POST["username"], $_POST["password"]);

            echo $_POST["password"] . $_POST["username"];
            if (!empty($User)) {
                // $User=(array) $User;
                $_SESSION["User"] = $User;
                if (isset($_SESSION['message'])) {
                    unset($_SESSION['message']);
                }
                if (isset($_POST["Remember"])) {
                    $infoLogin = [$_POST["username"], $_POST["password"]];
                    setcookie("user", json_encode($infoLogin));
                }
                header("Location:$host/admin");
            } else {
                $message = "Tài khoản hoặc mật khẩu không chính xác !";
                $_SESSION['message'] = $message;
                header("Location:$host/admin/login");
            }
        }
        return $this->renderView('Manager/Login', $data, $title, $action);
    }
    public function Logout()
    {
        include("evConfig.php");
        if (isset($_SESSION["User"])) {
            unset($_SESSION["User"]);
        }
        header("Location:$host/admin/login");
    }
    public function Register($title, $action)
    {
        $data = [];
        return   $this->checkLogin($this->renderView('Manager/Register', $data, $title, $action));
    }
}

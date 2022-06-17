<?php

require_once(__DIR__ . '/../BaseController.php');

class ManagerController extends BaseController
{
    private function checkLogin($param)
    {
        include("evConfig.php");
        if (!isset($_SESSION["Username"])) {
            header("Location:$host/admin/login");
        } else {
            return $param;
        }
    }
    public function index()
    {
        $this->checkLogin($this->renderView('Manager/index'));
    }
    public function Login()
    {
        include("evConfig.php");
        if (isset($_POST["password"])) {
            if ($_POST["password"] == '1') {
                $_SESSION["Username"] = "oke";
                header("Location:$host/admin");
            }
        }
        return $this->renderView('Manager/Login');
    }
    public function Logout()
    {
        include("evConfig.php");
        if (isset($_SESSION["Username"])) {
            unset($_SESSION["Username"]);
        }
        header("Location:$host/admin/login");
    }
    public function Register()
    {
        return $this->renderView('Manager/Register');
    }
}

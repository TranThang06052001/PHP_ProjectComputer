<?php
require_once("MVC/services/Service.php");
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
        $services = new Services();
        $services->checkLogins($param);
    }
    public function index($title, $action)
    {
        $data = [];
        $this->checkLogin($this->renderView('Manager/index', $data, $title, $action));
    }
    public function Login($title, $action)
    {
        include("evConfig.php");
        $data = [];

        if (isset($_SESSION['message']) && isset($_POST["cancel"])) {
            unset($_SESSION['message']);
        }
        if (isset($_POST["password"]) && isset($_POST["username"])) {
            $username = trim($_POST["username"]);
            $password = trim($_POST["password"]);
            setcookie("username", $username, time() + 365 * 24 * 60 * 60, "/");
            $User = $this->connectModel()->CheckUser($username, $password);
            if (!empty($User)) {
                $_SESSION["User"] = $User;
                if (isset($_POST["Remember"])) {
                    $infoLogin = [$username, $password];
                    setcookie("user", json_encode($infoLogin), time() + 365 * 24 * 60 * 60, "/");
                }
                header("Location:$host/admin");
            } else {
                $message = "The account or password is not correct !";
                $_SESSION['message'] = $message;
                header("Location:$host/admin/login");
            }
        }
        return $this->renderView('Manager/Login', $data, $title, $action);
    }
    public function Logout()
    {
        include("evConfig.php");
        if (isset($_COOKIE["user"])) {
            setcookie("user", json_encode($infoLogin), time() - 60, "/");
        }
        session_destroy();
        return   $this->checkLogin(header("Location:$host/admin/login"));
    }
    public function Register($title, $action)
    {
        $data = [];
        return   $this->checkLogin($this->renderView('Manager/Register', $data, $title, $action));
    }
    public function ChangeUserPassword($title, $action)
    {
        $data = [];
        include("evConfig.php");
        if (isset($_POST["Password"]) && isset($_POST["NewPassword"]) && isset($_POST["ConfirmPassword"])) {
            $Password = trim($_POST["Password"]);
            $NewPassword = trim($_POST["NewPassword"]);

            $User = $this->connectModel()->ChangeUserPassword(
                $_SESSION["User"][0]->username,
                $Password,
                $NewPassword,
                $_SESSION["User"][0]->id_user
            );
            if (!empty($User)) {
                $_SESSION["User"] = $User;
                if (isset($_SESSION['message'])) {
                    unset($_SESSION['message']);
                }
                if (isset($_COOKIE["user"])) {
                    $infoLogin = [$User[0]->username, $NewPassword];
                    setcookie("user", json_encode($infoLogin), time() + 365 * 24 * 60 * 60, "/");
                }
                header("Location:$host/admin/login");
            } else {
                $message = "Password is not correct!";
                $_SESSION['message'] = $message;
                header("Location:$host/admin/ChangePassword");
            }
        }
        return   $this->checkLogin($this->renderView('Manager/ChangePassword', $data, $title, $action));
    }
    public function ForgotPassword($title, $action)
    {
        $data = [];
        include("evConfig.php");
        if (isset($_POST["username"]) && isset($_POST["gamil"])) {
            $username = trim($_POST["username"]);
            $gamil = trim($_POST["gamil"]);

            $User = $this->connectModel()->ChangeUserPassword(
                $_SESSION["User"][0]->username,
                $Password,
                $NewPassword,
                $_SESSION["User"][0]->id_user
            );
            if (!empty($User)) {
                $_SESSION["User"] = $User;
                if (isset($_SESSION['message'])) {
                    unset($_SESSION['message']);
                }
                if (isset($_COOKIE["user"])) {
                    $infoLogin = [$User[0]->username, $NewPassword];
                    setcookie("user", json_encode($infoLogin), time() + 365 * 24 * 60 * 60, "/");
                }
                header("Location:$host/admin/login");
            } else {
                $message = "Password is not correct!";
                $_SESSION['message'] = $message;
                header("Location:$host/admin/ChangePassword");
            }
        }
        return   $this->checkLogin($this->renderView('Manager/ChangePassword', $data, $title, $action));
    }
}

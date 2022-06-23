<?php
require_once("MVC/services/Service.php");
require_once('MVC/Controllers/BaseController.php');
require_once('MVC/Models/Product/CategoryModel.php');
class CategoryController extends BaseController
{

    private  function connectModel()
    {
        $categoryModel = new CategoryModel();
        return  $categoryModel;
    }
    private function checkLogin($param)
    {
        $services = new Services();
        $services->checkLogins($param);
    }
    public function index($title, $action)
    {
        $data = $this->connectModel()->getListCategorys();
        $_SESSION['numCategories'] = count($data);
        if (isset($_GET["search"])) {
            $data = $this->connectModel()->SearchCategory(trim($_GET["search"]));
        }
        if (isset($_GET['page'])) {
            $_SESSION['start'] = ($_GET['page'] + 1) * 5 - 4;
            $_SESSION['end'] = ($_GET['page'] + 1) * 5;
        } else {
            $_SESSION['start'] = 1;
            $_SESSION['end'] = 5;
        }
        $this->checkLogin($this->renderView('Product/Category/index', $data, $title, $action));
    }
    public function AddCategory($title, $action)
    {
        require "evConfig.php";
        $data = [];
        // $i = 0;
        // if (isset($_POST['cancel']) && isset($_SESSION["messages"])) {
        //     unset($_SESSION['messages']);
        // }
        if (isset($_POST["NameCategory"]) && !empty(trim($_POST["NameCategory"]))) {

            if (count($this->connectModel()->getCategoryByName(trim($_POST["NameCategory"]))) <= 0) {

                $this->connectModel()->AddCategory(trim($_POST["NameCategory"]));
                header("Location:$host/admin/Category");
            }
            // else {
            //     require "evConfig.php";
            //     header("Location:$host/admin/AddCategory");
            //     $message = "This category already exists !" . $_POST["NameCategory"];
            //     $_SESSION["messages"] = $message;
            // }
        }
        return $this->checkLogin($this->renderView('Product/Category/AddCategory', $data, $title, $action));
    }
    public function UpdateCategory()
    {

        // if (isset($_SESSION["messagess"])&& isset($_POST['cancel'])) {
        //     unset($_SESSION['messagess']);
        // }
        if (isset($_POST["NameCategory"]) && !empty(trim($_POST["NameCategory"]))) {
            if (count($this->connectModel()->getCategoryByName(trim($_POST["NameCategory"]))) <= 0) {
                // if (isset($_SESSION["messagess"])) {
                //     unset($_SESSION['messagess']);
                // }
                $this->connectModel()->UpdateCategory(trim($_POST["NameCategory"]), trim($_POST["id"]));
            } else {

                // $message = "This category already exists !";
                // $_SESSION["messagess"] = $message;
                require "evConfig.php";
                header("Location:$host/admin/Category");
            }
        }
    }
    public function DeleteCategory()
    {
        if (isset($_GET["id"])) {
            $this->connectModel()->DeleteCategory($_GET["id"]);
            require "evConfig.php";
            header("Location:$host/admin/Category");
        }
    }
    public function getListCategorys()
    {
        $data = $this->connectModel()->getListCategorys();
        $_SESSION['categorys'] = $data;
        exit();
    }
}

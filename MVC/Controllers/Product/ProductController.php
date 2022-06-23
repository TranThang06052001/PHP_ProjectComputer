<?php
require_once("MVC/services/Service.php");
require_once('MVC/Controllers/BaseController.php');
require_once('MVC/Models/Product/ProductModel.php');
class ProductController extends BaseController
{

    private  function connectModel()
    {
        $prroductModel = new ProductModel();
        return  $prroductModel;
    }
    private function checkLogin($param)
    {
        $services = new Services();
        $services->checkLogins($param);
    }
    public function index($title, $action)
    {
        $data = $this->connectModel()->getListProducts();
        $this->checkLogin($this->renderView('Product/index', $data, $title, $action));
    }
    public function AddProduct($title, $action)
    {
        require "evConfig.php";
        if (isset($_POST['NameProduct']) && !empty($_POST['NameProduct'])) {
            $name_product = trim($_POST['NameProduct']);
            $price = trim($_POST['Price']);
            $quantity = trim($_POST['Quantity']);
            $sold = 2;
            $imageURL = trim($_POST['NameProduct']);
            $info_product = trim($_POST['NameProduct']);
            $id_category = trim($_POST['category']);
            $Producing_country = trim($_POST['ProducingCountry']);
            $Production_company = trim($_POST['ProductionCompany']);
            if (count($this->connectModel()->getProductByName($name_product)) <= 0) {
                $this->connectModel()->AddProduct($name_product, $price, $quantity, $sold, $imageURL, $info_product, $id_category, 1, $Producing_country, $Production_company);
            }
            header("Location:$host/admin/ProductManagement");
        }
    }
    public function DeleteProduct()
    {
        require "evConfig.php";
        if (isset($_POST["id"])) {
            $this->connectModel()->DeleteProduct($_POST["id"]);
            header("Location:$host/admin/ProductManagement");
        }
    }
}

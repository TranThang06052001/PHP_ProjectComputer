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
            if (isset($_FILES['Image_product']) && explode("/", $_FILES['Image_product']['type'])[0] == "image") {
                $url = __DIR__ . '/../../Upload/' . $_FILES['Image_product']['name'];
                $imageURL = $_FILES['Image_product']['name'];
                if (count($this->connectModel()->getNameURLimage($imageURL)) <= 0) {
                    move_uploaded_file($_FILES['Image_product']['tmp_name'], $url);
                }
            }
            $name_product = trim($_POST['NameProduct']);
            $price = trim($_POST['Price']);
            $quantity = trim($_POST['Quantity']);
            $sold = 2;

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
            $url = __DIR__ . '/../../Upload/';
            $Product = $this->connectModel()->getProductByID($_POST["id"]);
            if (count($this->connectModel()->getNameURLimage($Product[0]->imageURL)) <= 1) {
                unlink($url . $Product[0]->imageURL);
            }
            $this->connectModel()->DeleteProduct($_POST["id"]);
            header("Location:$host/admin/ProductManagement");
        }
    }
    public function form($title, $action)
    {
        $data = [];
        if (isset($_GET['id'])) {
            $data = $this->connectModel()->getProductByID($_GET['id']);
        }
        $this->checkLogin($this->renderView('Product/FormProduct', $data, $title, $action));
    }
}

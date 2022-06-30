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
        if (isset($_GET["search"])) {
            $data = $this->connectModel()->SearchProduct(trim($_GET["search"]));
        }
        if(isset($_GET["category"]) && !empty($_GET["category"])){
            $data = $this->connectModel()->getListProductsByCategory(trim($_GET["category"]));
        }
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
            $sale = trim($_POST['sale']);
            $quantity = trim($_POST['Quantity']);
            $description = $_POST['description'];
            $id_category = trim($_POST['category']);
            $Production_company = trim($_POST['ProductionCompany']);
            if (count($this->connectModel()->getProductByName($name_product)) <= 0) {
                $this->connectModel()->AddProduct(
                    $name_product,
                    $price,
                    $quantity,
                    $sale,
                    $imageURL,
                    $description,
                    $id_category,
                    $Production_company
                );
            }
            header("Location:$host/admin/ProductManagement");
        }
    }
    public function UpdateProduct(   $id)
    {
        require "evConfig.php";
        if (isset($_POST['NameProduct'])) {
           
            $imageURL = $this->connectModel()->getProductByID($id)[0]->imageURL;
          
            if (isset($_FILES['Image_product']) && explode("/", $_FILES['Image_product']['type'])[0] == "image") {
                // if (count($this->connectModel()->getNameURLimage($imageURL)) ) {
                //     $urls = __DIR__ . '/../../Upload/';
                //     if (file_exists($urls . $imageURL)) {
                //         unlink($urls . $imageURL);
                //     }
                // }
                $imageURL = $_FILES['Image_product']['name'];
                $url = __DIR__ . '/../../Upload/' . $imageURL;
                if (count($this->connectModel()->getNameURLimage($imageURL)) <= 0) {
                    move_uploaded_file($_FILES['Image_product']['tmp_name'], $url);
                }
            }
              // echo $imageURL;
            // die();
            $name_product = trim($_POST['NameProduct']);
            $price = trim($_POST['Price']);
            $sale = trim($_POST['sale']);
            $quantity = trim($_POST['Quantity']);
            $description = $_POST['description'];
            $id_category = trim($_POST['category']);
            $Production_company = trim($_POST['ProductionCompany']);
            if (count($this->connectModel()->getProductByName($name_product)) <= 1) {
                $this->connectModel()->UpdateProduct(
                    $id,
                    $name_product,
                    $price,
                    $quantity,
                    $sale,
                    $imageURL,
                    $description,
                    $id_category,
                    $Production_company
                );
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

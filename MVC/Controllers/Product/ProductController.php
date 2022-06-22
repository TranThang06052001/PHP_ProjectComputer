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
        $name_product = $_POST['NameProduct'];
        $price = $_POST['Price'];
        $quantity = $_POST['Quantity'];
        $sold = 2;
        $imageURL = $_POST['NameProduct'];
        $info_product = $_POST['NameProduct'];
        $id_category = $_POST['category'];
        $Producing_country = $_POST['ProducingCountry'];
        $Production_company = $_POST['ProductionCompany'];
        $data = $this->connectModel()->AddProduct($name_product, $price, $quantity, $sold, $imageURL, $info_product, $id_category, 1, $Producing_country, $Production_company);
        $this->checkLogin($this->renderView('Product/index', $data, $title, $action));
    }
}

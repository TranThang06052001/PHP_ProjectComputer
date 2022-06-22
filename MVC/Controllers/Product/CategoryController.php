<?php
require_once("MVC/services/Service.php");
require_once('MVC/Controllers/BaseController.php');
require_once('MVC/Models/Product/CategoryModel.php');
class CategoryController extends BaseController
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
        $data=[];
        // $data = $this->connectModel()->getListProducts();
        $this->checkLogin($this->renderView('Product/Category/index', $data, $title, $action));
    }
}

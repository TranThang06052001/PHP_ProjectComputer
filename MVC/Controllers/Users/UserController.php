<?php
require_once("MVC/services/Service.php");
require_once(__DIR__ . '/../BaseController.php');

class UserController extends BaseController
{
    private function checkLogin($param)
    {
        $services = new Services();
        $services->checkLogins($param);
    }
    public function index($title, $action)
    {
        $data = [];

        return $this->renderView('Users/index', $data, $title, $action);
    }
    public function formADD($title, $action)
    {
        $data = ['Edit product',' Add product','Delete product','Update User','Overview',"Update category"];

        return $this->renderView('Users/formUser', $data, $title, $action);
    }
}

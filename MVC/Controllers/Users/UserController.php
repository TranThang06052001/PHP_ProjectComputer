<?php

require_once (__DIR__.'/../BaseController.php');

class UserController extends BaseController {
    
    public function index()
    {
        
        return $this->renderView('Users/index');
    }

}
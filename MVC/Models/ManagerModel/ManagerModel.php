<?php
require_once("MVC/Models/DbConfig.php");

class ManagerModel
{
    /*kết nối với databse*/
    private function conn()
    {
        $db = new DbConnection();
        return  $db->conn();
    }
    public function getListUsers()
    {
        if ($this->conn() != null) {
            $sql = "SELECT * FROM tbl_user";
            $listUsers = $this->conn()->query($sql);
            return $listUsers;
        }
        return false;
    }
    public function getListProducts()
    {
        if ($this->conn() != null) {
            $sql = "SELECT * FROM tbl_product";
            $ListProducts = $this->conn()->query($sql);
            return $ListProducts;
        }
        return false;
    }
    public function getUserByID($id)
    {
        if ($this->conn() != null) {
            $sql = "SELECT * FROM tbl_user Where id= $id";
            $User = $this->conn()->query($sql);
            return $User;
        }
        return false;
    }
    public function getProductByID($id)
    {
        if ($this->conn() != null) {
            $sql = "SELECT * FROM tbl_user WHERE id= $id";
            $Product = $this->conn()->query($sql);
            return $Product;
        }
        return false;
    }
    public function CheckUser($username, $password)
    {
        $password = md5($password);
        if ($this->conn() != null) {
            $sql = "SELECT * FROM tbl_user WHERE username='$username' and password='$password'";
            $User = $this->conn()->query($sql);
            $User =  $User->fetchAll(PDO::FETCH_OBJ);
            return   $User;
        }
        return false;
    }
    public function ChangeUserPassword($username, $passwordOld, $passwordNew,$id)
    {
        /*cần check lại xem xét để làm xem khi nào nó đã update thành công*/
        $passwordNew = md5($passwordNew);
        $Count = $this->CheckUser($username, $passwordOld);
        if ($Count != null && $Count > 0) {
            $sql = "UPDATE tbl_user SET password = $passwordNew WHERE id = $id";
            $response = $this->conn()->query($sql);
            return  $response;
        }
        return false;
    }
    
}

<?php
require_once(__DIR__ . "/DbConfig.php");

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
            $sql = "SELECT * FROM user";
            $listUsers = $this->conn()->query($sql);
            return $listUsers;
        }
        return null;
    }
    public function getListProducts()
    {
        if ($this->conn() != null) {
            $sql = "SELECT * FROM product";
            $ListProducts = $this->conn()->query($sql);
            return $ListProducts;
        }
        return null;
    }
    public function getUserByID($id)
    {
        if ($this->conn() != null) {
            $sql = "SELECT * FROM user Where id= $id";
            $User = $this->conn()->query($sql);
            return $User;
        }
        return null;
    }
    public function getProductByID($id)
    {
        if ($this->conn() != null) {
            $sql = "SELECT * FROM user WHERE id= $id";
            $Product = $this->conn()->query($sql);
            return $Product;
        }
        return null;
    }
    public function CheckUser($username, $password)
    {
        $password = md5($password);
        if ($this->conn() != null) {
            $sql = "SELECT COUNT(*) FROM t_hanghoa WHERE username=$username and password=$password";
            $Count = $this->conn()->query($sql);
            return $Count;
        }
        return null;
    }
    public function ChangeUserPassword($username, $passwordOld, $passwordNew,$id)
    {
        /*cần check lại xem xét để làm xem khi nào nó đã update thành công*/
        $passwordNew = md5($passwordNew);
        $Count = $this->CheckUser($username, $passwordOld);
        if ($Count != null && $Count > 0) {
            $sql = "UPDATE user SET password = $passwordNew WHERE id = $id";
            $response = $this->conn()->query($sql);
            return  $response;
        }
        return null;
    }
    
}

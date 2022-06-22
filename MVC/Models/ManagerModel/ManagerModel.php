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
        return null;
    }
    public function getListProducts()
    {
        if ($this->conn() != null) {
            $sql = "SELECT * FROM tbl_product";
            $ListProducts = $this->conn()->query($sql);
            return $ListProducts;
        }
        return null;
    }
    public function getUserByID($id)
    {
        if ($this->conn() != null) {
            $sql = "SELECT * FROM tbl_user Where id_user= $id";
            $User = $this->conn()->query($sql);
            $User =  $User->fetchAll(PDO::FETCH_OBJ);
            return $User;
        }
        return null;
    }
    public function getProductByID($id)
    {
        if ($this->conn() != null) {
            $sql = "SELECT * FROM tbl_user WHERE id= $id";
            $Product = $this->conn()->query($sql);
            return $Product;
        }
        return null;
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
        return null;
    }
    public function ChangeUserPassword($username, $passwordOld, $passwordNew, $id)
    {
        /*cần check lại xem xét để làm xem khi nào nó đã update thành công*/
        $passwordNew = md5($passwordNew);
        $passwordOld = md5($passwordOld);
        if ($this->conn() != null) {
            $sql = "UPDATE tbl_user SET password = '$passwordNew' WHERE
             id_user  = '$id' and password='$passwordOld'";
            $response = $this->conn()->query($sql);

            if (!empty($response)) {
                return  $this->getUserByID($id);
            } else return null;
        }
        return null;
    }
    public function ForgotPassword($username, $gamil)
    {
        if ($this->conn() != null) {
            $sql = "SELECT * FROM tbl_user WHERE username='$username' and gmail='$gamil'";
            $User = $this->conn()->query($sql);
            $User =  $User->fetchAll(PDO::FETCH_OBJ);
            // if (isset($User)) {
            //     $sql = "UPDATE tbl_user SET password = '$passwordNew' WHERE
            //      id_user  = '$id' and password='$passwordOld'";
            //     $response = $this->conn()->query($sql);

            //     if (!empty($response)) {
            //         return  $this->getUserByID($id);
            //     } else return null;
            // }
        }
        return null;
    }
}

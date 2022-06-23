<?php
require_once("MVC/Models/DbConfig.php");

class CategoryModel
{
    /*kết nối với databse*/
    private function conn()
    {
        $db = new DbConnection();
        return  $db->conn();
    }
    public function getCategoryByID($id)
    {
        if ($this->conn() != null) {
            $sql = "SELECT * FROM tbl_Category WHERE id_Category = $id";
            $Category = $this->conn()->query($sql);
            $Category = $Category->fetchAll(PDO::FETCH_OBJ);
            return $Category;
        }
        return null;
    }
    public function getCategoryByName($name)
    {
        if ($this->conn() != null) {
            $sql = "SELECT * FROM tbl_Category WHERE name_Category = '$name'";
            $Category = $this->conn()->query($sql);
            $Category = $Category->fetchAll(PDO::FETCH_OBJ);
            return $Category;
        }
        return null;
    }
    public function getListCategorys()
    {
        if ($this->conn() != null) {
            $sql = "SELECT * FROM tbl_Category";
            $listCategorys = $this->conn()->query($sql);
            $listCategorys = $listCategorys->fetchAll(PDO::FETCH_OBJ);
            return $listCategorys;
        }
        return null;
    }
    public function SearchCategory($search)
    {
        if ($this->conn() != null) {
            // echo "Searching";
            // die();
            $sql = "SELECT * FROM tbl_Category WHERE  name_category like '%$search%' or id_Category like '%$search%'";
            $listCategorys = $this->conn()->query($sql);
            $listCategorys = $listCategorys->fetchAll(PDO::FETCH_OBJ);
            return $listCategorys;
        }
        return null;
    }
    public function AddCategory($name_Category)
    {
        if ($this->conn() != null) {
            $sql = "INSERT INTO tbl_Category (name_category,status_category)
             VALUES ('$name_Category','1')";
            $response = $this->conn()->query($sql);
            return  $response;
        }
        return null;
    }
    public function UpdateCategory($name_Category, $id)
    {
        if ($this->conn() != null) {
            $sql = "UPDATE tbl_Category SET name_Category = '$name_Category' WHERE id_Category = '$id'";
            $response = $this->conn()->query($sql);
            return  $response;
        }
        return null;
    }
    public function DeleteCategory($id)
    {
        if ($this->conn() != null) {
            $sql = "DELETE FROM tbl_Category WHERE id_category='$id'";
            $response = $this->conn()->query($sql);
            return  $response;
        }
        return null;
    }
}

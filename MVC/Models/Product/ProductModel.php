<?php
require_once("MVC/Models/DbConfig.php");
// class ProductField
// {

//     public $id_product,;
//     public $name_product,;
//     public $price;,
//     public $quantity;,
//     public $sold;,
//     public $imageURL,;
//     public $info_product,;
//     public $id_category,;
//     public $status_product,;
//     public $Producing_country,;
//     public $Production_company,;
// }

class ProductModel
{
    /*kết nối với databse*/
    private function conn()
    {
        $db = new DbConnection();
        return  $db->conn();
    }
    public function getProductByID($id)
    {
        if ($this->conn() != null) {
            $sql = "SELECT * FROM tbl_product WHERE id_product = '$id'";
            $Product = $this->conn()->query($sql);
            $Product = $Product->fetchAll(PDO::FETCH_OBJ);
            return $Product;
        }
        return null;
    }
    public function getProductByName($name)
    {
        if ($this->conn() != null) {
            $sql = "SELECT * FROM tbl_product WHERE name_product = '$name'";
            $Product = $this->conn()->query($sql);
            $Product = $Product->fetchAll(PDO::FETCH_OBJ);
            return $Product;
        }
        return null;
    }
    public function getListProducts()
    {
        if ($this->conn() != null) {
            $sql = "SELECT * FROM tbl_product";
            $listProducts = $this->conn()->query($sql);
            $listProducts = $listProducts->fetchAll(PDO::FETCH_OBJ);
            return $listProducts;
        }
        return null;
    }
    public function getListProductsByCategory($category)
    {
        if ($this->conn() != null) {
            $sql = "SELECT * FROM tbl_product WHERE id_category=$category";
            $listProducts = $this->conn()->query($sql);
            $listProducts = $listProducts->fetchAll(PDO::FETCH_OBJ);
            return $listProducts;
        }
        return null;
    }

    public function AddProduct(
        $name_product,
        $price,
        $quantity,
        $sold,
        $imageURL,
        $info_product,
        $id_category,
        // $status_product,
        $Producing_country,
        $Production_company
    ) {
        if ($this->conn() != null) {
            $sql = "INSERT INTO tbl_product (name_product, price, quantity, sold, imageURL, info_product, id_category, status_product, Producing_country, Production_company)
             VALUES ('$name_product','$price','$quantity','$sold', '$imageURL', '$info_product','$id_category', '1','$Producing_country','$Production_company')";
            $response = $this->conn()->query($sql);
            return  $response;
        }
        return null;
    }
    public function DeleteProduct($id)
    {
        if ($this->conn() != null) {
            $sql = "DELETE FROM tbl_product WHERE id_product='$id'";
            $response = $this->conn()->query($sql);
            return  $response;
        }
        return null;
    }
    public function getNameURLimage($url){
        if ($this->conn() != null) {
            $sql = "SELECT * FROM tbl_product WHERE imageURL='$url'";
            $response = $this->conn()->query($sql);
            $response= $response->fetchAll(PDO::FETCH_OBJ);
            return  $response;
        }
        return null;
    }
}

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
        $sale,
        $imageURL,
        $description,
        $id_category,
        $Production_company
    ) {
        if ($this->conn() != null) {
            $sql = "INSERT INTO tbl_product (
                 name_product,
                 price,
                 quantity,
                 Sale,
                 imageURL,
                 description,
                 id_category,
                 Production_company)
             VALUES (
                '$name_product',
                '$price',
                '$quantity',
                '$sale', 
                '$imageURL',
                '$description',
                '$id_category',
                '$Production_company')";
            $response = $this->conn()->query($sql);
            return  $response;
        }
        return null;
    }
    public function UpdateProduct(
        $id,
        $name_product,
        $price,
        $quantity,
        $sale,
        $imageURL,
        $description,
        $id_category,
        $Production_company
    ) {
        //  echo "tsadasdecc";
        //     die();
        if ($this->conn() != null) {
            $sql = "UPDATE tbl_product SET
                 name_product='$name_product',
                 price='$price',
                 quantity='$quantity',
                 Sale='$sale',
                 imageURL='$imageURL',
                 description='$description',
                 id_category='$id_category',
                 Production_company='$Production_company' Where id_product='$id'";
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
    public function getNameURLimage($url)
    {
        if ($this->conn() != null) {
            $sql = "SELECT * FROM tbl_product WHERE imageURL='$url'";
            $response = $this->conn()->query($sql);
            $response = $response->fetchAll(PDO::FETCH_OBJ);
            return  $response;
        }
        return null;
    }
    public function SearchProduct($search)
    {
        if ($this->conn() != null) {
            // echo "Searching";
            // die();
            $sql = "SELECT * FROM tbl_product WHERE 
             name_product like '%$search%' or id_product like '%$search%' 
             or  Price like '%$search%'
             ";
            $listProducts = $this->conn()->query($sql);
            $listProducts = $listProducts->fetchAll(PDO::FETCH_OBJ);
            return $listProducts;
        }
        return null;
    }
}

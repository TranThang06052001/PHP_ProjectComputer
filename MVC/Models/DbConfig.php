

<?php


class DbConnection
{
    private $hostName = 'localhost';
    private $userName = 'root';
    private $password = "";
    private $dbname = "ShopComputer";
    private $connect;

    function conn()
    {
        try {
            $this->connect = new PDO("mysql:host=$this->hostName;dbname=$this->dbname", $this->userName, $this->password);
            $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->connect;
        } catch (PDOException $error) {
            return $this->connect=null;
        }
    }
}

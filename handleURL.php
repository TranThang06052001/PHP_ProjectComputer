<?php
class handleURL
{
    function __construct()
    {
        // print_r($this->getParams());
    }
    public function getURL()
    {
        if (isset($_GET['url'])) {
            $path = $_GET['url'];
            return filter_var(trim($path, "/"));
        }
        return '/';
    }
 
}

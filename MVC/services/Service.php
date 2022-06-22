<?php

class Services
{
    // function sendMail( $to , $subject,$message, $header)
    // {

    //     $to      = "abc@example.com";
    //     $subject = "Tiêu đề email";
    //     $message = "Nội dung email";
    //     $header  =  "From:myemail@exmaple.com \r\n";
    //     $header .=  "Cc:other@exmaple.com \r\n";

    //     $success = mail($to, $subject, $message, $header);

    //     if ($success == true) {
    //         echo "Đã gửi mail thành công...";
    //     } else {
    //         echo "Không gửi đi được...";
    //     }
    // }
    public function checkLogins($param)
    {
        include("evConfig.php");
        if (!isset($_SESSION["User"]) && !isset($_COOKIE["user"])) {
            header("Location:$host/admin/login");
        } else {
            return $param;
        }
    }

    
}

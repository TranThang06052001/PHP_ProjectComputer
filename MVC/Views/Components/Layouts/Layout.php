<?php
require_once('handleURL.php');
// require "";
require 'evConfig.php';
$handleurl = new handleURL();
$path = $handleurl->getURL();
function str_contains(string $haystack, string $needle): bool
{
    return '' === $needle || false !== strpos($haystack, $needle);
}
// echo explode("/", $path)[1];
// die();

// if (str_contains(explode("/", $path)[0], "admin") && !isset(explode("/", $path)[1])) {
//     require "LayoutDefault.php";
// } else {
//     if (str_contains(explode("/", $path)[1], "login")) {
//         require "hideLayout.php";
//     }else if(str_contains(explode("/", $path)[1], "logout")){
//         require "hideLayout.php";
//     };
// };
$handleurl = new handleURL();
$path = $handleurl->getURL();
switch ($action = strtolower($path)) {
    case "admin/login":
        require "hideLayout.php";
        break;
    case "admin/changepassword":
        require "hideLayout.php";
        break;
    default:
        require "LayoutDefault.php";
        break;
}

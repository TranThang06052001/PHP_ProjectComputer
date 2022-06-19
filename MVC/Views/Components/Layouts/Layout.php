<?php
require_once('handleURL.php');
$handleurl = new handleURL();
$path = $handleurl->getURL();
function str_contains(string $haystack, string $needle): bool
{
    return '' === $needle || false !== strpos($haystack, $needle);
}

if (str_contains(explode("/", $path)[0], "admin")) {
    require "LayoutDefault.php";
} else {
    require "hideLayout.php";
};

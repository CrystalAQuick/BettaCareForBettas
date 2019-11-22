<?php
    session_start();
    //$random = md5();
    //$random = rand();
    $randChars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $captcha = substr(str_shuffle($randChars), 0, 5);
    
    $_SESSION["captcha"] = $captcha; // creating the session

    $sizeOfBackground = imagecreatetruecolor(55,30); //size
    $background = imagecolorallocate($sizeOfBackground, 195, 155, 211); //https://htmlcolorcodes.com/


    imagefill($sizeOfBackground,0,0,$background);
    $font = imagecolorallocate($sizeOfBackground, 0, 0, 0); //font color
    imagestring($sizeOfBackground, 5, 5, 5, $captcha, $font);
   

    header("Content-type: image/jpeg");
    imagejpeg($sizeOfBackground);
// https://phppot.com/php/php-captcha/ reference



?>
<?php
    session_start();
    //$random = md5();
    //$random = rand();
    $randChars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $captcha = substr(str_shuffle($randChars), 0, 5);
    // creating the session
    $_SESSION["captcha"] = $captcha; 

    $sizeOfBackground = imagecreatetruecolor(55,30); 
    $background = imagecolorallocate($sizeOfBackground, 195, 155, 211); 
    //https://htmlcolorcodes.com/


    imagefill($sizeOfBackground,0,0,$background);
    $font = imagecolorallocate($sizeOfBackground, 0, 0, 0); 
    imagestring($sizeOfBackground, 5, 5, 5, $captcha, $font);
   

    header("Content-type: image/jpeg");
    imagejpeg($sizeOfBackground);
// https://phppot.com/php/php-captcha/ reference



?>
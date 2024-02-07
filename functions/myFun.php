<?php
session_start();


function redirect($url,$message)
{
    $_SESSION['message'] = $message;
    header('Location: '.$url);
    exit();
}


?>
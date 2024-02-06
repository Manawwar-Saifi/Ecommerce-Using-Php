<?php

$hostname = "localhost";
$username = "root";
$password = "";
$database = "learn_pb"; 

$con = mysqli_connect($hostname,$username,$password,$database);

if(!$con)
{
    echo "Connection Error";
}


?>
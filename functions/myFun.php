<?php
include('../config/dbcon.php');
// session_start();


function getAll($table)
{
    global $con;

    $query = "SELECT * FROM $table";
    $query_run = mysqli_query($con,$query);
    return $query_run;

}

function redirect($url,$message)
{
    $_SESSION['message'] = $message;
    header('Location: '.$url);
    exit(0);
}


?>
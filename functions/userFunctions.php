<?php

include('config/dbcon.php');
// session_start(); 


function getCartItems()
{
    global $con;
    $userId = $_SESSION['id'];
    $query = "SELECT c.id as cid, c.prod_id, c.prod_qty, p.id as pid, p.name, p.image, p.selling_price from carts c, products p WHERE c.prod_id=p.id AND c.user_id='$userId' ORDER BY c.id DESC ";
    return $query_run = mysqli_query($con, $query);
}

// function checkTrackingNoValid($tracking_no)
// {
//     global $con;
//     $userId = $_SESSION['id'];

//     $query = "SELECT * FROM orders WHERE tracking_no='$tracking_no' AND user_id='$userId' ";
//     return mysqli_query($con, $query);

// }

function getOrders()
{
    global $con;
    $userId= $_SESSION['id'];
    $query = "SELECT * FROM  orders WHERE user_id='$userId'";
    $query_run = mysqli_query($con,$query);
    return $query_run;
    
}

function getAllTrending()
{
    global $con;
    $query = "SELECT * FROM products WHERE trending='1'";
    return $query_run = mysqli_query($con,$query);
    
}



?>
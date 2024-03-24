<?php


session_start();
include('../config/dbcon.php');
include('myFun.php');


if(isset($_SESSION['loggedin']))
{
    echo $_POST['scope'];
    if(isset($_POST['scope']))
    {
        $scope = $_POST['scope'];
        switch($scope)
        {
            case "add":

                $prod_id = $_POST['prod_id'];
                $qty = $_POST['prod_qty'];
                $user_id = $_SESSION['id'];

                $chk_exist = "SELECT * FROM carts WHERE prod_id='$prod_id' AND user_id='$user_id'";
                $chk_exist_run = mysqli_query($con, $chk_exist);

                if(mysqli_num_rows($chk_exist_run) > 0)
                {
                    $Nqty = $qty++;
                    $update_qty ="UPDATE carts
                    SET prod_qty = '$Nqty'
                    WHERE prod_id='$prod_id' AND user_id='$user_id' ";
                    $update_qty_run = mysqli_query($con, $update_qty);
                    if($update_qty_run)
                    {
                        echo 202;
                    }
                    else
                    {
                        echo 500;
                    }
                }

                else
                {
                    $insert_query = "INSERT INTO carts (user_id, prod_id, prod_qty) VALUES ('$user_id','$prod_id','$qty')";
                    $insert_query_run = mysqli_query($con, $insert_query);
                        if($insert_query_run)
                        {
                            echo 200;
                        }
                        else
                        {
                            echo 500;
                        }
                }
                break;

                case "delete":
                    $cid = $_POST['cid'];
                    $user_id = $_SESSION['id'];

                    $delete_cart_product = "DELETE FROM carts WHERE id='$cid' AND user_id='$user_id'";
                    $delete_cart_product_run = mysqli_query($con, $delete_cart_product);
                        if($delete_cart_product_run)
                        {
                            echo 201;
                        }
                        else
                        {
                            echo 500;
                        }
                    break;
                default:
                echo 501;
                break;

        }
    }


}

else
{
    echo 100;
}


?>


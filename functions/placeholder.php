<?php
session_start();
include('../config/dbcon.php');
include('myFun.php');

if(isset($_SESSION['loggedin']))
{

    if(isset($_POST['placeOrderBtn']))
    {


        $name = mysqli_real_escape_string($con, $_POST['name']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $phone = mysqli_real_escape_string($con, $_POST['phone']);
        $address = mysqli_real_escape_string($con, $_POST['address']);
        $pincode = mysqli_real_escape_string($con, $_POST['pincode']);
        $payment_mode = mysqli_real_escape_string($con, $_POST['payment_mode']);
        $payment_id = mysqli_real_escape_string($con, $_POST['payment_id']);

        if($name == "" || $email == "" || $phone == "" ||  $address == "" || $pincode== "")
        {
            $_SESSION['message'] = "All Fields are required";
            header("Location: ../checkout.php");
            exit(0);
        }

        $userId = $_SESSION['id'];
        $query = "SELECT c.id as cid, c.prod_id, c.prod_qty, p.id as pid, p.name, p.image, p.selling_price from carts c, products p WHERE c.prod_id=p.id AND c.user_id='$userId' ORDER BY c.id DESC ";
        $query_run = mysqli_query($con, $query); 

        


        $totalPrice = 0;         
        foreach($query_run  as $cdata)
        {
        
            $totalPrice  +=  $cdata['selling_price']*$cdata['prod_qty']; 

        }
       
    
        // echo "&#8377;".$totalPrice;

        $tracking_no = "manawwarsaifi".rand(1111,9999).substr($phone,2);
        $user_id = $_SESSION['id'];

        $insert_query = "INSERT INTO orders (tracking_no,	user_id, name, email, phone, address, pincode, total_price, payment_mode, payment_id) VALUES ('$tracking_no','$userId','$name','$email','$phone','$address','$pincode','$totalPrice','$payment_mode','$payment_id')";
        $insert_query_run = mysqli_query($con,$insert_query);

        if($insert_query_run)
        {
            $order_id = mysqli_insert_id($con);
            foreach($query_run  as $cdata)
            {
                $prod_id = $cdata['prod_id'];
                $prod_qty = $cdata['prod_qty'];
                $prod_price = $citem['selling_price'];
                $insert_item_query = "INSERT INTO order_items (order_id, prod_id, qty,price) VALUES ('$order_id','$prod_id','$prod_qty','$prod_price')";
                $insert_item_query_run = mysqli_query($con,$insert_item_query);


                $product_query1 = "SELECT * FROM products WHERE id='$prod_id' LIMIT 1";
                $product_query_run1 = mysqli_query($con, $product_query1);

                $productData = mysqli_fetch_array($product_query_run1);
                $current_qty = $productData['qty'];
                $new_qty = $current_qty-$prod_qty;

                $update_query = "UPDATE products SET qty='$new_qty' WHERE id='$prod_id'";
                $update_query_run = mysqli_query($con,$update_query);
                
            }

            $deleteCartQuery = "DELETE FROM carts WHERE user_id='$userId'";
            $deleteCartQuery_run = mysqli_query($con, $deleteCartQuery);
            

            $_SESSION['message'] = "Order Place Successfully";
            header('Location: ../my-orders.php');
            die();

        }


    }

}
else
{
    $_SESSION['message'] ="Unauthrized user";
    header('location: ../index.php');
}

?>
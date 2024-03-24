<?php 
// session_start();
include ('includes/header.php');
include('functions/userFunctions.php');
?>

    <div class="container py-5">
        <?php
        if(isset($_SESSION['loggedin']))
        {
            ?>
            <div class="row justify-content-center" id="mycart">
            
            <?php
            $totalPrice=0;
                $result = getCartItems();

                if(mysqli_num_rows($result) > 0)
                {
            ?>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Image</th>
                        <th scope="col">Price</th>
                        <th scope="col">Qty</th>
                        <th scope="col">Remove</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                    
                            <?php

                        
                        
                        foreach($result as $cdata)
                        {
                            ?>
                            <tr>
                            <th scope="row"><?=$cdata['cid']?></th>
                            <td><?= $cdata['name'];?></td>
                            <td><img src="uploads/<?=$cdata['image']?>" alt="Prod image" width="80px"></td>
                            <td>&#8377;<?=$cdata['selling_price']?></td>
                            <td><?=$cdata['prod_qty']?></td>
                            <td>
                                <button class="btn btn-danger sm delete_cart_product"  value="<?=$cdata['cid']?>">X</button>
                            </td>
                            </tr>
                            <tr>
                            
                        </td>
                        <?php
                         $totalPrice  +=  $cdata['selling_price']*$cdata['prod_qty']; 
                        }
                        ?>
                        <th scope="colspan-3">Total</th>
                            <th scope="colspan-1"> &#8377;<?=$totalPrice?></th>
                            </tr>
                            <td>
                       <a href="checkout.php"> <button class="btn btn-warning">
                            Process To Checkout
                        </button></a>
                        <?php


                }
                else
                {
                    ?>
                    <h1 class="text-center">Cart is Empty</h1>
                    <?php
                }
                        
                        
                    }        
                   
        ?>    
                    </tbody>
                </table>



            </div>
            </div>
       
       
        
    </div>
   
<?php include('includes/footer.php');?>
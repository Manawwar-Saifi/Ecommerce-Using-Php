<?php 
// session_start();
include ('includes/header.php');
include('functions/userFunctions.php');
?>

    <div class="container my-5">
    <form class="p-2" action="functions/placeholder.php" method="POST">
        <div class="row justify-content-center">
        <h1 class="text-center p-5">Checkout</h1>
            <div class="col-md-6 shadow py-2 m-1">
            <h4 class="bg-warning p-2 text-center text-white">Shipping Address</h4>

               

                <div class="row">
                    <div class="mb-3 col-6">
                        <label for="exampleInputEmail1" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                    </div>
                    <div class="mb-3 col-6">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                    </div>
                </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Phone</label>
                        <input type="number" name="phone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                    </div>

                    <div class="row">
                        
                        <div class="mb-3 col-6">
                            <label for="exampleInputEmail1" class="form-label">Pincode</label>
                            <input type="number" name="pincode" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Addresss</label>
                            <textarea name="address" class="form-control" cols="4" rows="8" required></textarea>
                        </div>
                       
                       
                    </div>
    
                <center>
                    <input type="hidden" name="payment_mode" value="COD">
                      <button type="submit" name="placeOrderBtn" class="btn btn-warning text-white required my-3 w-100">Confirm & Place Order</button>
                </center>

            </div>
            <div class="col-md-5 shadow m-1">
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
                                <th scope="col">Name</th>
                                <th scope="col">Image</th>
                                <th scope="col">Price</th>
                                <th scope="col">Qty</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                            
                                    <?php

                                
                                
                                foreach($result as $cdata)
                                {
                                    ?>
                                    <tr>
                                    <td><?= $cdata['name'];?></td>
                                    <td><img src="uploads/<?=$cdata['image']?>" alt="Prod image" width="80px"></td>
                                    <td>&#8377;<?=$cdata['selling_price']?></td>
                                    <td><?=$cdata['prod_qty']?></td>
                                
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
            
                        <div class="card">
                    <div class="card-body">
                       
                        <input type="radio" id="html" name="fav_language" value="UPI"  disabled>
                        <label for="html">UPI</label><br>
                        <input type="radio" id="html" name="fav_language" value="COD" checked >
                        <label for="html">COD</label><br>
                      
                    </div>
                    
                        </div>
                </div>
            </div>
               
            </div>
        </div>
        
        </form>
    </div>
   
<?php include('includes/footer.php');?>
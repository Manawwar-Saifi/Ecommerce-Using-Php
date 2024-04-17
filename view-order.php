<?php 
// session_start();
include ('includes/header.php');
// include('functions/userFunctions.php');
include("config/dbcon.php");

if(isset($_GET['t']))
{
    $tracking_no = $_GET["t"];
    $userId = $_SESSION["id"];
        $query1 = "SELECT * FROM orders WHERE tracking_no='$tracking_no' AND user_id='$userId' ";
        $ordrData =  mysqli_query($con,$query1);
        
        if(mysqli_num_rows($ordrData) < 0){
            ?>
            <h4>Something went wrong</h4>
            <?php
        }  
}
else{
?>
<h4 class="text-center p-5 fs-1">Something went wrong.</h4>

<?php
die();
}

$data = mysqli_fetch_array($ordrData);
?>

    <h3 class="text-center p-5 bg-dark text-white">View Order Details</h3>

            <div class="container py-5">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header bg-primary ">
                                <span class="text-white fs-3">Order Details</span>
                                <a href="my-orders.php" class="btn btn-warning float-end "><i class="fa fa-reply me-1"></i>Back</a>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <h4>Delivery Address</h4>
                                    <div class="col-md-12 d-flex">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="" class="fw-bold">Name</label>
                                                <div class="border p-1 mb-2">
                                                    <?= $data['name'];?>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                            <label for="" class="fw-bold">Email</label>
                                                <div class="border p-1 mb-2">
                                                    <?= $data['email'];?>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                            <label for="" class="fw-bold">Phone</label>
                                                <div class="border p-1 mb-2">
                                                    <?= $data['phone'];?>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                            <label for="" class="fw-bold">Pincode</label>
                                                <div class="border p-1 mb-2">
                                                    <?= $data['pincode'];?>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                            <label for="" class="fw-bold">Address</label>
                                                <div class="border p-1 mb-2">
                                                    <?= $data['address'];?>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                            <label for="" class="fw-bold">Tracking No</label>
                                                <div class="border p-1 mb-2">
                                                    <?= $data['tracking_no'];?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 p-2 m-2">
                                            <h4>Order Details</h4>

                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Product</th>
                                                    <th>Price</th>
                                                    <th>Quantity</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                            

                                            <?php

                                                $order_query = "SELECT o.id as oid, o.tracking_no, o.user_id,oi.*, oi.qty as orderqty, p.* FROM orders o, order_items oi,products p WHERE o.user_id = '$userId' AND oi.order_id=o.id AND p.id=oi.prod_id AND o.tracking_no='$tracking_no'";
                                                $order_query_run = mysqli_query($con, $order_query);

                                                if(mysqli_num_rows($order_query_run) > 0)
                                                {
                                                    foreach($order_query_run as $item)
                                                    {
                                                        ?>
                                                        <tr>

                                                        <td class="align-middle"><img src="uploads/<?=$item['image']?>" alt="<?=$item['name']?>" width="50px"></td>
                                                        <td class="align-middle"><?=$item['selling_price']?></td>
                                                        <td class="align-middle"><?=$item['orderqty']?></td>
                                                        </tr>
                                                        <?php
                                                    }
                                                }
                                            ?>

                                            </tbody>
                                        </table>    
                                        <hr>

                                        <h5>Total Price : <span class="float-end"> &#8377;<?= $data['total_price']?> </span></h5>

                                        <hr>

                                        <div class="border p-1 mb-3">
                                            <label for="" class="fw-bold">Payment Mode:</label>
                                            <?= $data['payment_mode'] ?>
                                        </div>
                                        <div class="border p-1 mb-3">
                                            <label for="" class="fw-bold">Status : </label>
                                            <?php 
                                                if($data['status']==0)
                                                {
                                                    echo "Under Processed";
                                                }
                                                else if($data['status']==1)
                                                {
                                                    echo "Completed";
                                                }
                                                else if($data['status']==2)
                                                {
                                                    echo "Cancelled";
                                                }
                                             
                                             ?>
                                        </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
       
   
<?php include('includes/footer.php');?>
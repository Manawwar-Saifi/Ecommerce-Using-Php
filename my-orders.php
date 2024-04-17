<?php 
// session_start();
include ('includes/header.php');
include('functions/userFunctions.php');
?>

    <h3 class="text-center p-5 bg-dark text-white">My Orders</h3>

            <div class="container py-5">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Tracking</th>
                                    <th>Price</th>
                                    <th>Date</th>
                                    <th>View</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <?php
                                        $orders = getOrders();
                                        if(mysqli_num_rows($orders) > 0)
                                        {
                                            foreach($orders as $item)
                                            {
                                                ?>
                                                <tr>
                                                    <td><?= $item['id']?></td>
                                                    <td><?= $item['tracking_no']?></td>
                                                    <td><?= $item['total_price']?></td>
                                                    <td><?= $item['created_at']?></td>
                                                    <td><a href="view-order.php?t=<?= $item['tracking_no']?>" class="btn btn-primary">View Details</a></td>
                                                </tr>
                                                <?php

                                            }
                                        }
                                        else
                                        {
                                            ?>
                                                <tr >
                                                    <td colspan="5">No Orders yet.</td>
                                                </tr>
                                            <?php
                                        }
                                    ?>
                                
                            </tbody>
                        </table>
                       
                    </div>
                </div>
            </div>
       
   
<?php include('includes/footer.php');?>
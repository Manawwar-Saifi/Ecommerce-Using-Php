<?php 
include ('includes/header.php');
include ('../functions/myFun.php');
?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">

            </div>
            <div class="col-md-9 py-5 bg-dark">

                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card w-100">
                                <div class="card-header text-center py-3">
                                    <h4>Edit Product</h4>
                                </div>
                                <div class="card-body">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Qty</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Edit</th>
                                        <th scope="col">Delete</th>
                                        </tr>
                                    </thead>
                                
                                    <tbody>
                                    <?php 
                                    $result = getAll("products");
                                    if(mysqli_num_rows($result) > 0)
                                    {
                                        foreach($result as $data)
                                        {
                                            ?>
                                                <tr>
                                                <th scope="row"><?= $data['id'] ?></th>
                                                <td><img src="../uploads/<?=$data['image']?>" alt="Proudct Image" width="80px"></td>
                                                <td><?=$data['name']?></td>
                                                <td><?=$data['category_id']?></td>
                                                <td><?=$data['qty']?></td>
                                                <td><?=$data['status']==1 ? "Hidden" : "Visible"?></td>
                                                <td><?=$data['selling_price']?></td>
                                                <td><button class="btn btn-success btn-sm">Edit</button></td>
                                                <td><button class="btn btn-danger btn-sm">Delete</button></td>
                                                </tr>
                                            <?php

                                        }

                                    }
                                    else
                                    {
                                        redirect("products.php","Something went wrong");
                                    }
                                    ?>
                                        
                                        
                                        
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               
                
                
               
            </div> 
        </div>
    </div>
   
<?php include('includes/footer.php');?>
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
                                    <?php
                                            $result = getAll("products");
                                            if(mysqli_num_rows($result) > 0)
                                            {
                                    ?>
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
                                                <td><a href="edit-product.php?id=<?= $data['id']?>"><button class="btn btn-success btn-sm">Edit</button></a></td>
                                                <td>
                                                    <form action="code.php" method="POST">
                                                        <input type="hidden" name="prod_id" value="<?= $data['id']?>">
                                                         <button class="btn btn-danger btn-sm delete_product_btn" name="delete-product-btn" >Delete</button>
                                                    </form>
                                                </td>
                                                </tr>
                                            <?php

                                        }

                                    }
                                    else
                                    {
                                        ?>
                                        <h2 class="text-center">Product Table Empty Now.</h2>
                                        <?php
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
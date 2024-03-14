<?php 
// session_start();
include ('includes/header.php');
include('config/dbcon.php');
?>

    <div class="main">

        <!-- <img src="assets/img/b1.webp"  -->
        <!-- Breadcrum  -->

        <?php 
                    $cate_id = $_GET['id'];
                    $categories = "SELECT * FROM category WHERE id='$cate_id'";
                    $query_run = mysqli_query($con, $categories);
                    $data = mysqli_fetch_array($query_run);
                    $cateName = $data['name'];

        ?>            
        <div class="w-100" style="background-color: #d1d1d1;" >
            <div class="row text-dark text-center p-5 text-uppercase">
                <h4 class=""><?=$data['name'] ?></h4>
                <h6 style="background-color: #d1d1d1; font-size:.7rem; color:white;" class=""><a href="index.php">Home</a> > <a href="category_products.php?id=<?= $data['id'];?>"><?=$data['name'] ?></a></h6>

            </div>

        </div>
        
        <!-- CATEGORIES -->

        <div class="container my-5">
            <div class="row">
                    <h4 class="text-center p-4 text-danger text-uppercase fs-2">Products</h4>

                    <?php 
                    $cate_id = $_GET['id'];
                    $products = "SELECT * FROM products WHERE category_id='$cateName' AND status=0";
                    $products_run = mysqli_query($con, $products);
                    
                    if(mysqli_num_rows($products_run) > 0)
                    {
                        foreach($products_run as $data)
                        {
                            ?>
                            <div class="card mx-2 my-3" style="width: 18%;"> 

                               <a href="Single_product.php?id=<?=$data['id']?>"> <img src="uploads/<?= $data['image'];?>" class="card-img-top" alt="Products Image"></a>
                               <a href="Single_product.php?id=<?=$data['id']?>"> <div class="card-body">
                                    <h5 class="card-title"><?= $data['name'];?></h5>
                                </div></a>
                            </div>
                            <?php

                        }
                    }
                    else 
                    {
                    ?>
                    <h6 class="text-center text-warning text-uppercase">Products Table is Empty.</h6>
                    <?php
                    }
                    ?>

                    
                    
            </div>
        </div>


    </div>
   
<?php include('includes/footer.php');?>
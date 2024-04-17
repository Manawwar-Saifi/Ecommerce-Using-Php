<?php 
// session_start();
include ('includes/header.php');
include('config/dbcon.php');
?>

    <div class="main">

        <!-- <img src="assets/img/b1.webp"  -->
        <!-- Breadcrum  -->
          
        <div class="w-100" style="background-color: #d1d1d1;" >
            <div class="row text-dark text-center p-5 text-uppercase">
            <h4 class="text-center p-2 text-uppercase fs-2">Products</h4>
                <h6 style="background-color: #d1d1d1; font-size:.7rem; color:white;" class=""><a href="index.php">Home</a> > <span>Products</span></h6>

            </div>

        </div>
        
        <!-- CATEGORIES -->

        <div class="container my-5 d-flex   ">
            <div class="row w-25 pt-2">
                <div class="card mt-2">
                    <div class="card-header">
                        <h4 class="text-center">Filters</h4>
                        
                    </div>
                    <div class="card-body">
                        <div>
                        <input type="checkbox" name="" id="">
                        <label for="">Sort by Price</label>
                        </div>
                        <div>
                        <input type="checkbox" name="" id="">
                        <label for="">Sort by Brand</label>
                        </div>
                        <div>
                            <input type="checkbox" name="" id="">
                            <label for="">Sort by Category</label>
                        </div>
                        <div>
                        <input type="checkbox" name="" id="">
                        <label for="">DESC</label>
                        </div>
                        <div>
                        <input type="checkbox" name="" id="">
                        <label for="">AESC</label>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="row w-75  justify-content-center allproductsdiv">
                    

                    <?php 
                    $products = "SELECT * FROM products WHERE status=0";
                    $products_run = mysqli_query($con, $products);
                    
                    if(mysqli_num_rows($products_run) > 0)
                    {
                        foreach($products_run as $data)
                        {
                            ?>
                            <div class="card mx-2 my-3" style="width: 30%;"> 

                               <a href="Single_product.php?id=<?=$data['id']?>"> <img src="uploads/<?= $data['image'];?>" class="card-img-top" alt="Products Image"></a>
                               <a href="Single_product.php?id=<?=$data['id']?>"> <div class="card-body">
                                    <h5 class="card-title"><?= $data['name'];?></h5>
                                </div></a>

                                <button class="btn btn-warning products-addtocart btn-xs" value="<?= $data['id']?>" >Add To Cart</button>
                            </div>
                            <?php

                        }
                    }
                    else 
                    {
                    ?>
                        <h6 class="text-center text-warning text-uppercase">No Product Found.</h6>
                    <?php
                    }
                    ?>

                    
                    
            </div>
        </div>
    </div>
   
<?php include('includes/footer.php');?>
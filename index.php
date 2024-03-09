<?php 
session_start();
include ('includes/header.php');
include('config/dbcon.php');
?>

    <div class="main">

        <!-- <img src="assets/img/b1.webp"  -->
        <!-- SLIDER  -->
        <div class="w-100">
            <div class="row">
                <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active" data-bs-interval="1500">
                        <img src="assets/img/b1.webp" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item" data-bs-interval="1000">
                        <img src="assets/img/b2.webp" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                        <img src="assets/img/b3.webp" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>

        </div>
        
        <!-- CATEGORIES -->

        <div class="container my-5">
            <div class="row">
                    <h4 class="text-center p-4 text-danger text-uppercase fs-2">Categories</h4>

                    <?php 
                    $categories = "SELECT * FROM category WHERE status='0'";
                    $categories_run = mysqli_query($con, $categories);

                    if(mysqli_num_rows($categories_run) > 0)
                    {
                        foreach($categories_run as $data)
                        {
                            ?>
                            <div class="card m-2" style="width: 15%;"> 

                               <a href="category_products.php?id=<?= $data['id'];?>"> <img src="uploads/<?= $data['image'];?>" class="card-img-top" alt="Category Image"></a>
                               <a href="category_products.php?id=<?= $data['id'];?>"> <div class="card-body">
                                    <h5 class="card-title"><?= $data['name'];?></h5>
                                </div></a>
                            </div>
                            <?php

                        }
                    }
                    else 
                    {
                    ?>
                    <h6 class="text-center text-warning text-uppercase">Category Table is Empty.</h6>
                    <?php
                    }
                    ?>

                    
                    
            </div>
        </div>


    </div>
   
<?php include('includes/footer.php');?>
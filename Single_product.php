<?php 
// session_start();
include ('includes/header.php');
include('config/dbcon.php');
?>

    <div class="main">

        <!-- <img src="assets/img/b1.webp"  -->
        <!-- Breadcrum  -->

        <?php 
                    $prod_id = $_GET['id'];
                    $product = "SELECT * FROM products WHERE id='$prod_id'";
                    $prod_query_run = mysqli_query($con, $product);
                    $data = mysqli_fetch_array($prod_query_run);
                    
                    $cate_Name = $data['category_id'];

                    $categories = "SELECT * FROM category WHERE name='$cate_Name'";
                    $cate_query_run = mysqli_query($con, $categories);
                    $result = mysqli_fetch_array($cate_query_run);
                    $cate_id = $result['id'];

                    

        ?>            
        <div class="w-100" style="background-color: #d1d1d1;" >
            <div class="row text-dark text-center p-5 text-uppercase">
                <h4 class=""><?=$data['name'] ?></h4>
                <h6 style="background-color: #d1d1d1; font-size:.7rem; color:white;" class=""><a href="index.php">Home</a> > <a href="category_products.php?id=<?= $cate_id;?>"><?=$data['category_id'] ?></a> > <?=$data['name'] ?></h6>
            </div>

        </div>
        
        <!-- CATEGORIES -->

        <div class="container my-5">
            <div class="row">
                    <h4 class="text-center p-4 text-danger text-uppercase fs-2">Products</h4>

                    <div class="col-md-5 ">

                    <img src="uploads/<?=$data['image']?>" alt="Product Image" style="width:80%; height:80%; object-fit:cover;">

                    </div>

                    <div class="col-md-6">
                        <h1><?= $data['name']?></h1>
                        <h1><?= $data['category_id']?></h1>
                        <h1>&#8377;<?= $data['original_price']?></h1>
                        <h1>&#8377;<?= $data['selling_price']?></h1>
                        <h1><?= $data['small_description']?></h1>
                        <button>-</button><input type="text" value="1" style="width: 2rem; text-align:center;" disabled><button>+</button>
                        <button>Add To Cart</button>
                    </div>

                    
                    
            </div>
        </div>


    </div>
   
<?php include('includes/footer.php');?>
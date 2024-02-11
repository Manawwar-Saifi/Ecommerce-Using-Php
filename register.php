<?php 
session_start();
include ('includes/header.php');?>
<style> 
#login_on_regi{
    transition: .5s;
}
#login_on_regi:hover{
    background-color: black;
    color: #fff;
}


</style>
<div class="container-fluid py-5" style="background-color:#e8e8e8 !important; ">
    <div class="row justify-content-center d-flex align-items-center" style="height: 92vh !important;">
        <div class="col-md-5">
            
        <?php if(isset($_SESSION['message'])){
            ?>
          
        <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
        <strong>Hey!   </strong>  <?= $_SESSION['message']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
        unset($_SESSION['message']);
        } 
        ?> 

        <div class="card shadow">
            <div class="card-header text-center text-uppercase">
                <h4>Register</h4>
            </div>
            <div class="card-body p-5">
            <form action="functions/authcode.php" method="POST">
                <div class="form-group mb-3">
                    <label for="exampleInputEmail1" class="mb-2">Name</label>
                    <input type="text" class="form-control p-2" name="name" placeholder="Enter the name">
                </div>
                <div class="form-group mb-3">
                    <label for="exampleInputEmail1" class="mb-2">Email address</label>
                    <input type="email" class="form-control p-2" name="email" placeholder="Enter email">
                </div>
                <div class="form-group mb-3">
                    <label for="exampleInputPassword1" class="mb-2">Phone</label>
                    <input type="number" class="form-control p-2 mb-3"name="phone" placeholder="Enter the phone number">
                </div>
                <div class="form-group mb-3">
                    <label for="exampleInputPassword1" class="mb-2">Password</label>
                    <input type="password" class="form-control p-2 mb-3" name="password" placeholder="Enter the password">
                </div>
                <div class="form-group mb-3">
                    <label for="exampleInputPassword1" class="mb-2">Confirm Password</label>
                    <input type="password" class="form-control p-2 mb-3" name="cpassword" placeholder="Cofirm password">
                </div>
                <button type="submit" name="register_btn" class="btn btn-dark w-100 text-uppercase">Register</button>
            </form>
            <!-- <hr> -->
            <h6 style="margin:10px !important; z-index:2; font-weight:300;" class="text-center">OR</h6>
            <div class="text-center text-uppercase">
                <a href="login.php"><button id="login_on_regi" class="btn border border-dark w-100 text-uppercase">LOGIN</button></a>
            </div>
            </div>
                 </div>   

        </div>
    </div>

</div>

   
<?php include('includes/footer.php');?>
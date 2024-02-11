<?php 
session_start();
include ('includes/header.php');

?>

<style> 
#reg_on_log{
    transition: .5s;
}
#reg_on_log:hover{
    background-color: black;
    color: #fff;
}
.Register{
    background-color: #e8e8e8 !important;
}
</style>
<div class="container-fluid" style="background-color:white !important; ">
    <div class="row justify-content-center d-flex h-100 align-items-center Register" style="height: 93vh !important;">
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
                <h4>Login</h4>
            </div>
            <div class="card-body">
            <form action="functions/authcode.php" method="POST">
                <div class="form-group mb-3">
                    <label for="exampleInputEmail1" class="mb-2">Email address</label>
                    <input type="email" class="form-control p-2" name="email" placeholder="Enter email">
                </div>
                
                <div class="form-group mb-3">
                    <label for="exampleInputPassword1" class="mb-2">Password</label>
                    <input type="password" class="form-control p-2 mb-3" name="password" placeholder="Password">
                </div>
                <button type="submit" name="login_btn" class="btn btn-dark w-100 text-uppercase">LOGIN</button>
            </form>
            <!-- <hr> -->
            <h4 style="margin:10px !important; z-index:2; font-weight:300;" class="text-center">OR</h4>
            <div class="text-center text-uppercase">
                <a href="register.php"><button id="reg_on_log" class="btn border border-dark w-100 text-uppercase">Register</button></a>
            </div>
            </div>
                 </div>   

        </div>
    </div>

</div>

   
<?php include('includes/footer.php');?>
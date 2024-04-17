<?php 


session_start();

if(!isset($_SESSION['loggedin']) && !$_SESSION['loggedin'] == true) 
{
    $_SESSION['message'] = "Log In to Continue"; 
    header('Location: ../index.php'); 
}
else
{
    if($_SESSION['role']==0)
    {
        
        $_SESSION['message'] = "You are not aurized for the page"; 
        header('Location: ../index.php'); 
        
    }
}


include ('includes/header.php');



?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">

            </div>
            <div class="col-md-9 p-5 bg-light">

                <div class="row justify-content-center">
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header text-center">
                                
        
                                <h4>Index File </h4>
                                <h2> <span>Welcome Admin </span><?= $_SESSION['username'];?></h2> 
                            </div>

                            <div class="card-body text-center">
                                <a href="../index.php" class="btn btn-primary">User Home</a>
                            </div>

                        </div>
                    </div>
                </div>
                
               
            </div> 
        </div>
    </div>
   
<?php include('includes/footer.php');?>

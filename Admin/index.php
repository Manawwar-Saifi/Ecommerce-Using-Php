<?php 
// session_start();
include ('includes/header.php');
if($_SESSION['loggedin'] = true && !$_SESSION['role'] == 1)
{
    
    $_SESSION['message'] = "You are not aurized for the page";
    header('Location: ../index.php');
}
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
                                <h4>Index File</h4>
                                <?= $_SESSION['role'];?>
                            </div>
                          
                        </div>
                    </div>
                </div>
                
               
            </div> 
        </div>
    </div>
   
<?php include('includes/footer.php');?>
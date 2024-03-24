<?php 
// session_start();
include ('includes/header.php');
include('functions/userFunctions.php');
?>

    <div class="container my-5">
        <div class="row justify-content-center">
        <h1 class="text-center p-5">Checkout</h1>
            <div class="col-6 shadow py-2">
            <h4 class="bg-warning p-2 text-center text-white">Shipping Address</h4>
                <form class="p-2">

                <div class="row">
                    <div class="mb-3 col-6">
                        <label for="exampleInputEmail1" class="form-label">Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-3 col-6">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                    </div>
                </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Phone</label>
                        <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                    </div>

                    <div class="row">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Addresss</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                        </div>
                        <div class="mb-3 col-6">
                            <label for="exampleInputEmail1" class="form-label">Land Mark</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                        </div>
                        <div class="mb-3 col-6">
                            <label for="exampleInputEmail1" class="form-label">City</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                        </div>
                        <div class="mb-3 col-6">
                            <label for="exampleInputEmail1" class="form-label">State</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                        </div>
                        <div class="mb-3 col-6">
                            <label for="exampleInputEmail1" class="form-label">Pincode</label>
                            <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                        </div>
                       
                    </div>
    
                <center>
                      <button type="submit" class="btn btn-warning text-white required my-3">Confirm Order</button>
                </center>

                </form>
            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                       
                        <input type="radio" id="html" name="fav_language" value="UPI"  disabled>
                        <label for="html">UPI</label><br>
                        <input type="radio" id="html" name="fav_language" value="COD" checked >
                        <label for="html">COD</label><br>
                      
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
   
<?php include('includes/footer.php');?>
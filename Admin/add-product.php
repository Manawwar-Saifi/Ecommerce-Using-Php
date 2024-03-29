<?php 
session_start();
include ('includes/header.php');
include ('../functions/myFun.php');

?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">

            </div>
            <div class="col-md-9 p-5 bg-light">

                <div class="row justify-content-center">
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header text-center py-5">
                                <h4>Add Product</h4>
                            </div>
                            <div class="card-body">
                            <form action="code.php" method="POST" enctype="multipart/form-data" class="forms">
                                    
                                    <div class="mb-3">
                                        <label for="">Select Category</label>
                                    <select class="form-select mt-2" name="prod_category" aria-label="Default select example">

                                        <?php 
                                        
                                        $result = getAll("category");
                                        if($result) 
                                        {
                                            ?>
                                            <option>Uncategorized</option>
                                            <?php
                                            foreach($result as $data)
                                            {
                                                ?>
                                                <option value="<?= $data['name'] ?>"><?= $data['name'] ?></option>
                                                
                                                <?php

                                            }
                                        }
                                        else{
                                            echo "Something Went Wrong";
                                        }
                                        
                                        ?>
                                    </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Name</label>
                                        <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Slug</label>
                                        <input type="text" name="slug" class="form-control" id="exampleInputPassword1">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label w-100">small_description</label>
                                        <input type="text" name="small_description" class="w-100 rounded form-control"></input>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label w-100">Description</label>
                                        <textarea name="description" id="" cols="4" rows="4" class="w-100 rounded form-control"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label w-100">Original Price</label>
                                        <input type="number" name="original_price" class="w-100 rounded form-control"></input>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label w-100">Selling Price</label>
                                        <input type="number" name="selling_price" class="w-100 rounded form-control"></input>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Image</label>
                                        <input type="file" class="form-control form-control"  name="image" >
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label w-100">Qantity</label>
                                        <input type="number" name="qty" class="w-100 rounded form-control"></input>
                                    </div>
                                    <div class="mb-3 d-flex gap-5">
                                        <label for="exampleInputPassword1"  class="form-label">Status</label>
                                            <input type="checkbox" name="status" >
                                            <label for="exampleInputPassword1" class="form-label">trending</label>
                                            <input type="checkbox" name="trending" >
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Meta Title</label>
                                        <input type="text" class="form-control" name="meta_title" name="meta_title">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Meta Description</label>
                                        <textarea name="meta_description" class="w-100 rounded form-control" id="" cols="4" rows="4"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Meta Keywords</label>
                                        <textarea name="meta_keywords" id="" class="w-100 rounded form-control" cols="4" rows="4"></textarea> 
                                    </div>
                                   
                                   
                                    <button type="submit" name="add-product-btn" class="btn btn-primary">Add Product</button>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
                
               
            </div> 
        </div>
    </div>
   
<?php include('includes/footer.php');?>
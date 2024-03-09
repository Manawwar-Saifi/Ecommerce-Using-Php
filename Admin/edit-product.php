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
                           


                            <?php 
                             $pid = $_GET['id'];       
                             $result = getById("products",$pid);
                             $data = mysqli_fetch_array($result);
                             if($data)
                             {

                             ?>
                                    <div class="mb-3">
                                        <label for="" class="mb-2">Category</label>
                                        <select  class="form-control" name="prod_category">
                                           <?php 
                                           $cate = getAll("category");
                                           ?>
                                           <option name="prod_category" value="<?=$data['category_id'] ?>" selected><?=$data['category_id'] ?></option>
                                           <?php

                                            foreach($cate as $item)
                                            {
                                              ?>
                                                <option name="prod_category" value="<?= $item['name'] ?>"><?= $item['name'] ?></option>
                                              <?php  
                                            }
                                           ?>
                                           </select>
                                    </div>


                                    <div class="mb-3">
                                        <input type="hidden" name="product_id" value="<?= $data['id'] ?>">
                                        <label for="exampleInputEmail1" class="form-label">Name </label>
                                        <input type="text" name="name" class="form-control" value="<?= $data['name'] ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Slug</label>
                                        <input type="text" name="slug" class="form-control" value="<?= $data['slug'] ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label w-100">small_description</label>
                                        <input type="text" name="small_description" class="w-100 rounded form-control" value="<?= $data['small_description'] ?>"></input>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label w-100">Description</label>
                                        <textarea name="description" id="" cols="4" rows="4" class="w-100 rounded form-control"><?= $data['description'] ?></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label w-100">Original Price</label>
                                        <input type="number" name="original_price" class="w-100 rounded form-control" value="<?= $data['original_price'] ?>"></input>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label w-100">Selling Price</label>
                                        <input type="number" name="selling_price" class="w-100 rounded form-control" value="<?= $data['selling_price'] ?>" ></input>
                                    </div>
                                    <div class="mb-3">
                                        <input type="hidden" value="<?= $data['image']?>" name="old_image">

                                        
                                        <label for="exampleInputPassword1" class="form-label">Image</label>
                                        <input type="file" class="form-control form-control"  name="image" >


                                        <label for="" class="form-label">Current Image</label>
                                        <img src="../uploads/<?= $data['image']?>" width="80px" class="mt-3" alt="" >
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label w-100">Qantity</label>
                                        <input type="number" name="qty" class="w-100 rounded form-control" value="<?= $data['qty'] ?>" ></input>
                                    </div>
                                    <div class="mb-3 d-flex gap-5">
                                        <label for="exampleInputPassword1"  class="form-label">Status</label>
                                            <input type="checkbox" name="status" <?= $data['status']==1 ? "checked" : "" ?> >
                                            <label for="exampleInputPassword1" class="form-label">trending</label>
                                            <input type="checkbox" name="trending" <?= $data['trending']==1 ? "checked" : "" ?>>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Meta Title</label>
                                        <input type="text" class="form-control" name="meta_title" name="meta_title" <?= $data['meta_title']; ?> >
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Meta Description</label>
                                        <textarea name="meta_description" class="w-100 rounded form-control" id="" cols="4" rows="4"><?= $data['meta_description'] ?></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Meta Keywords</label>
                                        <textarea name="meta_keywords" id="" class="w-100 rounded form-control" cols="4" rows="4"><?= $data['meta_keywords'] ?></textarea> 
                                    </div>
                                   
                                    <button type="submit" name="update-product-btn" class="btn btn-primary" >Updated Product</button>
                                    <?php
                                        
                                    }
                                               else 
                                               {
                                                   echo "Something went wrong";
                                               }
                                               ?>    
                                </form>
                                    
                            </div>
                        </div>
                    </div>
                </div>
                
               
            </div> 
        </div>
    </div>
   
<?php include('includes/footer.php');?>
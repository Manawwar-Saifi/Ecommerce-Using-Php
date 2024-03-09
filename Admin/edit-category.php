<?php 
session_start();
include ('includes/header.php');
include ('../config/dbcon.php');

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
                                <h4>Edit Category</h4>
                            </div>
                            <div class="card-body">
                                <?php

                                if(isset($_GET['id']))
                                {

                                    $cid = $_GET['id'];
                                    
                                    
                                    $category_show = "SELECT * FROM category WHERE id='$cid' ";
                                    $item = mysqli_query($con, $category_show);
                                    if(mysqli_num_rows($item)>0)
                                    {
                                        $data = mysqli_fetch_array($item);
                                        

                                    ?>

                                <form action="code.php" method="POST" enctype="multipart/form-data">
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Name</label>
                                            <input type="hidden" name="cid" value="<?= $data['id'] ?>">
                                            <input type="text" name="name" class="form-control" value="<?= $data['name']; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Slug</label>
                                            <input type="text" name="slug" class="form-control" value="<?= $data['slug']; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label w-100">Description</label>
                                            <textarea name="description" id="" cols="4" rows="4" class="w-100 rounded"><?= $data['description']; ?></textarea>
                                        </div>
                                        <div class="mb-3 d-flex gap-5">
                                            <label for="exampleInputPassword1"  class="form-label">Status</label>
                                                <input type="checkbox"  name="status" <?= $data['status']==1 ? "Checked" : ""; ?>>
                                                <label for="exampleInputPassword1" class="form-label">Popular</label>
                                                <input type="checkbox" name="popular" <?=$data['popular']==1 ? "Checked" : ""; ?>>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Image</label>
                                            <input type="file" class="form-control mb-5"  name="image" >
                                            <label for="">Current image</label>
                                            <input type="hidden" name="old_name" value="<?= $data['image'];?>">
                                            <img class="mb-5" src="../uploads/<?= $data['image']; ?>" alt="" width="10%">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Meta Title</label>
                                            <input type="text" class="form-control" name="meta_title" value="<?= $data['meta_title']; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Meta Description</label>
                                            <textarea name="meta_description" class="w-100 rounded" id="" cols="4" rows="4"><?= $data['meta_description']; ?></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Meta Keywords</label>
                                            <textarea name="meta_keywords" id="" class="w-100 rounded" cols="4" rows="4"><?= $data['meta_keywords']; ?></textarea> 
                                        </div>
                                    
                                    
                                        <button type="submit" name="edit-category-btn" class="btn btn-primary">Update Cateogry</button>
                                </form>


                                    <?php
                                        
                                    }
                                    else
                                    {
                                        echo "No Data Found";
                                    }   
                                    
                                }
                                else
                                {
                                    echo "Id is Missing";
                                }
                                ?>
                           
                            </div>
                        </div>
                    </div>
                </div>
                
               
            </div> 
        </div>
    </div>
   
<?php include('includes/footer.php');?>
<?php 
include ('includes/header.php');?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">

            </div>
            <div class="col-md-9 p-5 bg-light">

                <div class="row justify-content-center">
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header text-center">
                                <h4>Add Category</h4>
                            </div>
                            <div class="card-body">
                            <form action="code.php" method="POST" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Name</label>
                                        <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Slug</label>
                                        <input type="text" name="slug" class="form-control" id="exampleInputPassword1">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label w-100">Description</label>
                                        <textarea name="description" id="" cols="4" rows="4" class="w-100 rounded"></textarea>
                                    </div>
                                    <div class="mb-3 d-flex gap-5">
                                        <label for="exampleInputPassword1"  class="form-label">Status</label>
                                            <input type="checkbox" name="status">
                                            <label for="exampleInputPassword1" class="form-label">Popular</label>
                                            <input type="checkbox" name="popular">
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Image</label>
                                        <input type="file" class="form-control"  name="image" >
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Meta Title</label>
                                        <input type="text" class="form-control" name="meta_title">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Meta Description</label>
                                        <textarea name="meta_description" class="w-100 rounded" id="" cols="4" rows="4"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Meta Keywords</label>
                                        <textarea name="meta_keywords" id="" class="w-100 rounded" cols="4" rows="4"></textarea> 
                                    </div>
                                   
                                   
                                    <button type="submit" name="add-category-btn" class="btn btn-primary">Submit</button>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
                
               
            </div> 
        </div>
    </div>
   
<?php include('includes/footer.php');?>
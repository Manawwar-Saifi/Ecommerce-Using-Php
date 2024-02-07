<?php 

include ('includes/header.php');
include('../config/dbcon.php');

?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">

            </div>
            <div class="col-md-9 p-5 bg-light">

                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header text-center">
                                <h4>Categories</h4>
                            </div>
                        </div>

                        <table class="table table-bordered table-striped mt-2">
                            <thead>
                                <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Image</th>
                                <th scope="col">Status</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php 
                                
                                $categories_query = "SELECT * FROM category";
                                $categories_query_run = mysqli_query($con,$categories_query);

                                if(mysqli_num_rows($categories_query_run))
                                {
                                    foreach($categories_query_run as $data)
                                    {
                                     ?>
                                        <tr>
                                            <th scope="row"><?= $data['id'];?></th>
                                            <td><?= $data['name'];?></td>
                                            <td><img src="../uploads/<?= $data['image'];?>" alt="Category Image" width="10%"></td>
                                            <td><?= $data['status']==0 ? "Visible" : "Hidden";?></td>

                                            <td>
                                                
                                                    <a href="edit-category.php?id=<?= $data['id'];?>"><button type="submit" class="btn btn-success">Edit</button></a>
                                                
                                            </td>

                                            <td><button type="button" class="btn btn-danger category_delete_btn" value="<?= $data['id']; ?>">Delete</button></td>
                                        </tr>

                                     <?php
                                    }
                                }
                                ?>
                               
                                
                                
                            </tbody>
                        </table>
                    </div>
                </div>
                
               
            </div> 
        </div>
    </div>
   
<?php include('includes/footer.php');?>
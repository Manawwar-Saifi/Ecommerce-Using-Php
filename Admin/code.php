<?php
session_start();
include('../functions/myFun.php');
include('../config/dbcon.php');


// Adding Category

if(isset($_POST['add-category-btn']))
{
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $description = $_POST['description'];
    $status = isset($_POST['status']) ? "1" : "0";
    $popular = isset($_POST['popular']) ? "1" : "0";
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keywords = $_POST['meta_keywords'];
    
    $filename = $_FILES['image']['name'];
    $filename_ext = pathinfo($filename,PATHINFO_EXTENSION);
    $path = "../uploads";
    $imagename = time().".".$filename_ext;

    $add_category_query = "INSERT INTO category (name,slug,description,status,popular,meta_title,meta_description, meta_keywords,image) VALUES ('$name','$slug','$description','$status','$popular','$meta_title','$meta_description','$meta_keywords','$imagename')";

    $add_category_query_run = mysqli_query($con,$add_category_query);

    if($add_category_query_run)
    {

        move_uploaded_file($_FILES['image']['tmp_name'],$path.'/'.$imagename);
        redirect('add-category.php',"Category Added Successfully");

    }

    else
    {
        redirect('add-category.php',"Something went wrong");
        
    }






}


// Edit Category

if(isset($_POST['edit-category-btn']))
{

    $cid = $_POST['cid'];
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $description = $_POST['description'];
    $status = isset($_POST['status']) ? "1" : "0";
    $popular = isset($_POST['popular']) ? "1" : "0";
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keywords = $_POST['meta_keywords'];
    
    $filename = $_FILES['image']['name'];
    $filename_ext = pathinfo($filename,PATHINFO_EXTENSION);
    $path = "../uploads";
    $newImageName = time().".".$filename_ext;
    
    $old_image = $_POST['old_name'];

    if($filename!="")
    {
        $update_image_name = $newImageName;
    }
    else
    {
        $update_image_name = $old_image;
    }

    $categories_update_query = "UPDATE category SET name='$name',slug='$slug',description='$description',status='$status',popular='$popular',meta_title='$meta_title',meta_description='$meta_description',meta_keywords='$meta_keywords',image='$update_image_name' WHERE id='$cid'";
    
    $categories_update_query_run = mysqli_query($con,$categories_update_query);

    if($categories_update_query_run)
    {
        if($_FILES['image']['name']!="")
        {
            move_uploaded_file($path, $path."/".$newImageName);
            if(file_exists($old_image))
            {
                unlink("../uploads/".$old_image);
            }
        }
        redirect("edit-category.php?id=$cid","Category Updated Successfully");
    }
    else
    {
        redirect("edit-category.php?id=$cid","Something went wrong.");  
    }

}

// Deleting Category with AJAX

if(isset($_POST['category_delete_btn']))
{

    $category_id = mysqli_real_escape_string($con,$_POST['category_id']);// here Category Id Coming From the AJAX

    $category_query = "SELECT * FROM category WHERE id='$category_id'";
    $category_query_run = mysqli_query($con, $category_query);

    $category_data = mysqli_fetch_array($category_query_run);
    $image = $category_data['image'];

    $c_delete_query = "DELETE FROM category WHERE id='$category_id'";
    $c_delete_query_run = mysqli_query($con,$c_delete_query);

    if($c_delete_query_run)
    {
        if(file_exists("../image_uploads/".$image))
        {
            unlink($image);
        }
        echo 200;
    }
    else
    {
        echo 500;
    }

}

else
{
    redirect("edit-category.php?id=$cid","Something Went Wrong");
}


?>
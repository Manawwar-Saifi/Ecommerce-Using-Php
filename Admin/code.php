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



?>
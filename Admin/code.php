<?php
include('../functions/myFun.php');
include('../config/dbcon.php');

session_start();

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




    $add_category_query = "INSERT INTO category (name,slug,description,status,popular,meta_title,meta_description,meta_keywords,image) VALUES ('$name','$slug','$description','$status','$popular','$meta_title','$meta_description','$meta_keywords','$imagename')";

    $add_category_query_run = mysqli_query($con,$add_category_query);
    echo "jfdlfjldkf";
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

else if(isset($_POST['edit-category-btn']))
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
        // {
            move_uploaded_file($_FILES['image']['tmp_name'], $path."/".$newImageName);
            if(file_exists($old_image))
            {
                unlink("../uploads/".$old_image);
            }
            redirect("edit-category.php?id=$cid","Category Updated Successfully");
        }
        else
    {
        redirect("edit-category.php?id=$cid","Something went wrong.");  
    }
}
    



// Deleting Category with AJAX

else if(isset($_POST['category_delete_btn']))
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
        if(file_exists("../uploads/".$image))
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

// Adding Product

else if(isset($_POST['add-product-btn']))
{
    $prod_category = $_POST['prod_category'];
    $product_name = $_POST['name'];
    $product_slug = $_POST['slug'];
    $product_small_description = $_POST['small_description'];
    $product_description = $_POST['description'];
    $product_original_price = $_POST['original_price'];
    $product_selling_price = $_POST['selling_price'];
    $product_qty = $_POST['qty'];
    $product_status = isset($_POST['status']) ? "1" : "0";
    $product_trending = isset($_POST['trending']) ? "1" : "0";
    $product_meta_title = $_POST['meta_title'];
    $product_meta_description = $_POST['meta_description'];
    $product_meta_keywords = $_POST['meta_keywords'];
    
    $image = $_FILES['image']['name'];//filed name of image and name of image
    $path = "../uploads";//path for the image saving
    $image_ext = pathinfo($image, PATHINFO_EXTENSION);//this give us image extension
    $filename = time().'.'.$image_ext;
    
    if($product_name!="" || $product_slug!="" || $product_selling_price!="")
    {

        $product_insert_query = "INSERT INTO products 
        (category_id, name, slug, small_description, description, original_price, selling_price, image, qty, status, trending, meta_title, meta_description, meta_keywords) VALUES 
        ('$prod_category','$product_name','$product_slug','$product_small_description','$product_description','$product_original_price','$product_selling_price','$filename','$product_qty','$product_status','$product_trending','$product_meta_title','$product_meta_description','$product_meta_keywords')";

        $product_insert_query_run  = mysqli_query($con, $product_insert_query);

        if($product_insert_query_run)
        {
            move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$filename);
            redirect("add-product.php","Product added Successfully");
        }
        else 
        {
            redirect("add-product.php","Something went wrong");

        }

    }

}

// ************* UPDATEING PRODUCT ****************

else if(isset($_POST['update-product-btn'])) 
{

    $product_id = $_POST['product_id'];

    $prod_category = $_POST['prod_category'];
    $product_name = $_POST['name'];
    $product_slug = $_POST['slug'];
    $product_small_description = $_POST['small_description'];
    $product_description = $_POST['description'];
    $product_original_price = $_POST['original_price'];
    $product_selling_price = $_POST['selling_price'];
    $product_qty = $_POST['qty'];
    $product_status = isset($_POST['status']) ? "1" : "0";
    $product_trending = isset($_POST['trending']) ? "1" : "0";
    $product_meta_title = $_POST['meta_title'];
    $product_meta_description = $_POST['meta_description'];
    $product_meta_keywords = $_POST['meta_keywords'];

        $path = "../uploads";//path for the image saving
        $old_image = $_POST['old_image'];
        $new_image = $_FILES['image']['name'];//filed name of image and name of image
        $update_image="";
        if($new_image!="")
        {
            $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);//this give us image extension
            $filename = time().'.'.$image_ext;
            $update_image = $filename;
        }
        else
        {
            $update_image = $old_image;  
        }

   

        $product_update_query = "UPDATE products SET category_id='$prod_category', name='$product_name', slug='$product_slug', small_description='$product_small_description', description='$product_description', original_price='$product_original_price', selling_price='$product_selling_price', image='$update_image', qty='$product_qty', status='$product_status', trending='$product_trending', meta_title='$product_meta_title', meta_description='$product_meta_description', meta_keywords='$product_meta_keywords' WHERE id='$product_id' ";

        $product_update_query_run  = mysqli_query($con, $product_update_query);

        if($product_update_query_run)
        {
            move_uploaded_file($_FILES['image']['tmp_name'],$path."/".$update_image);
            if(file_exists($old_image))
            {
                unlink("../uploads",$old_image);
            }
            $_SESSION['message'] = "Product Updated Successfullly";
            header('Location: edit-product.php?id='.$product_id);
            

        }
        else
        {
            redirect("edit-product.php?id=".$product_id,"Something went wrong");
        }

        
}



else if(isset($_POST['delete-product-btn']))
{

    $product_id = mysqli_real_escape_string($con,$_POST['prod_id']);// here Category Id Coming From the AJAX

    $product_query = "SELECT * FROM products WHERE id='$product_id'";
    $product_query_run = mysqli_query($con, $product_query);

    $product_data = mysqli_fetch_array($product_query_run);
    $image = $product_data['image'];

    $product_delete_query = "DELETE FROM products WHERE id='$product_id'";
    $product_delete_query_run = mysqli_query($con,$product_delete_query);

    if($product_delete_query_run)
    {
        if(file_exists("../uploads/".$image))
        {
            unlink($image);
        }
        redirect("products.php","Prdouct Deleted Successfully");
    }
    else
    {
        redirect("products.php","Something went wrong");
        
    }

}
else
{
    redirect("edit-category.php?id=$cid","Something Went Wrong");
}


?>
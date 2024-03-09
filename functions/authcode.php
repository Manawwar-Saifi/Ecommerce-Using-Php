<?php

session_start();

include('../config/dbcon.php');

// Register
if(isset($_POST['register_btn']))
{

$name = mysqli_real_escape_string($con,$_POST['name']);   
$email = mysqli_real_escape_string($con,$_POST['email']);   
$phone = mysqli_real_escape_string($con,$_POST['phone']);   
$password = mysqli_real_escape_string($con,$_POST['password']);
$cpassword = mysqli_real_escape_string($con,$_POST['cpassword']);
   

if($name=="" || $email=="" || $phone=="" || $password=="")
{
    $_SESSION['message'] = "Missing Field !!! All Fields Are Requied.";
    header('Location: ../register.php');
}
else if($password!=$cpassword)
{
    $_SESSION['message'] = "password not matched.";
    header('Location: ../register.php'); 
}
else
{





// Check if user or email already exists
$checkUserSql = "SELECT * FROM users WHERE phone = '$phone' OR email = '$email' LIMIT 1";
$result = mysqli_query($con, $checkUserSql);

if (mysqli_num_rows($result) > 0) 
{
    // User exists
    $_SESSION['message']= "Phone or Email is  Already Exists.";
    header('Location: ../register.php');
}
else 
{
    // Encrypt password
    $passwordHash = password_hash($password, PASSWORD_BCRYPT);

    // Insert query
    $register_sql = "INSERT INTO users (name, email, phone, password) VALUES ('$name', '$email', '$phone', '$passwordHash')";
    $register_sql_run = mysqli_query($con, $register_sql);

    // Execute query and check if it was successful
    if ($register_sql_run) {
        $_SESSION['message']= "Regisered Successfully.";
        header('Location: ../login.php');
    } else {
        $_SESSION['message']= "Something went wrong";
        header('Location: ../register.php');
    }

}

}
}

// Log IN
else if(isset($_POST['login_btn']))
{


    $email = mysqli_real_escape_string($con,$_POST['email']);   
    $password = mysqli_real_escape_string($con,$_POST['password']);

    if($email=="")
    {
        $_SESSION['message'] = "Missing Email Field !!! All Fields Are Requied.";
        header('Location: ../login.php');
    }
    else if($password=="")
    {
        $_SESSION['message'] = "Missing Password Field !!! All Fields Are Requied.";
        header('Location: ../login.php');
    }
    else 
    {

    
    // Check if user exists and password is correct
        $login_query = "SELECT * FROM users WHERE email = '$email'";
        $login_query_run = mysqli_query($con, $login_query);
        
        if($login_query_run)
        {

            if (mysqli_num_rows($login_query_run) > 0) {
                // Fetch user data
                $user = mysqli_fetch_assoc($login_query_run);


                    // Verify password
                    if (password_verify($password, $user['password'])) {
                        // Password is correct, set session variables

                        $_SESSION['loggedin'] = true;
                        $_SESSION['username'] = $user['name'];
                        $_SESSION['useremail'] = $user['email'];
                        $_SESSION['role'] = $user['role_as'];

                        // Redirect to user dashboard or home page
                        if($_SESSION['role']==0)
                        {
                            $_SESSION['message'] = "Login Successfully.";
                            header('Location: ../index.php');
                        }
                        else if($_SESSION['role']==1)
                        {
                            $_SESSION['message'] = "Welcome Admin.";
                            header('Location: ../Admin/index.php');  
                        }
                        else
                        {
                            $_SESSION['message'] = "Something went wrong.";
                                header('Location: ../index.php');
                        }
                    } 
                    else 
                    {
                        // Password is not correct
                        $_SESSION['message'] = "Incorrect Password.";
                         header('Location: ../login.php');
                    }
            } 
            
            else 
            {
                // No user found
                $_SESSION['message'] = "No account found with that Email.";
                header('Location: ../login.php');
               
            }
        
        }
         else 
        {
            $_SESSION['message'] = "Something went wrong.";
            header('Location: ../login.php');
        }
    }

}

// Logout

else if(isset($_POST['logoutbtn']))
{
    session_start();
    session_unset();
    session_destroy();
    header('Location: ../login.php');
}


?>
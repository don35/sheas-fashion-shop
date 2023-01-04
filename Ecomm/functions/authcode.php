<?php 
session_start();
include('../config/dbcon.php');
include('myfunctions.php');

if(isset($_POST['register_btn']))
{
    $name = mysqli_real_escape_string($con,$_POST['name']);
    $phone = mysqli_real_escape_string($con,$_POST['phone']);
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $password = mysqli_real_escape_string($con, md5($_POST['password']));
    $cpassword = mysqli_real_escape_string($con, md5($_POST['cpassword']));

    //Checking if email is already registered 
    $check_email_query = "SELECT email FROM users WHERE email='$email' ";
    $check_email_query_run = mysqli_query($con, $check_email_query);

    if(mysqli_num_rows($check_email_query_run) > 0)
    {
        $_SESSION['message'] = "Email already registered";
        header('Location: ../registration.php');
    }
    else{

    if($password == $cpassword)
    {
        //inserting user data 
        $insert_query = "INSERT INTO users(name, email, phone, password) VALUES ('$name', '$email', '$phone', '$password')"; 
        $insert_query_run = mysqli_query($con, $insert_query);

        if($insert_query_run)
        {
            $_SESSION['message'] = "Registered Successfully";
            header('Location: ../login.php');
        }
        else
        {
            $_SESSION['message'] = "Something Went Wrong!";
            header('Location: ../registration.php');
        }
    }
    else
    {
        $_SESSION['message'] = "Password did not match!";
        header('Location: ../registration.php');
    }
}
}

else if(isset($_POST['login_btn']))
{
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, md5($_POST['password']));

    $login_query = "SELECT * FROM users WHERE email='$email' AND password='$password' ";
    $login_query_run = mysqli_query($con, $login_query);
    
    if(mysqli_num_rows($login_query_run) > 0)
    {
        $_SESSION['auth'] = true;
        
        $userdata = mysqli_fetch_array($login_query_run);
        $custid = $userdata['cust_id'];
        $username = $userdata['name'];
        $useremail = $userdata['email'];
        $role_as = $userdata['role_as'];

        $_SESSION['auth_user'] = [
            'cust_id' => $custid,
            'name' => $username,
            'email' => $useremail
    ];

        $_SESSION['role_as'] = $role_as;    

        if($role_as == 1)
        {
        $_SESSION['message'] = "Welcome To Dashboard";
        header('Location: ../adminpanel/index.php');
        }
        else
        {
            $_SESSION['message'] = "Logged in Successfully";
            header('Location: ../index.php');
        }
    }

    else
    {
        $_SESSION['message'] = "Email or Password is Incorrect, Try Again!!";
        header('Location: ../login.php');
    }
    
}

else if(isset($_POST['adminlogin1_btn']))
{
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, md5($_POST['password']));

    $login_query = "SELECT * FROM users WHERE email='$email' AND password='$password' ";
    $login_query_run = mysqli_query($con, $login_query);
    
    if(mysqli_num_rows($login_query_run) > 0)
    {
        $_SESSION['auth'] = true;
        
        $userdata = mysqli_fetch_array($login_query_run);
        $userid = $userdata['id'];
        $username = $userdata['name'];
        $useremail = $userdata['email'];
        $role_as = $userdata['role_as'];

        $_SESSION['auth_user'] = [
            'user_id' => $userid,
            'name' => $username,
            'email' => $useremail
    ];

        $_SESSION['role_as'] = $role_as;    

        if($role_as == 1)
        {
        $_SESSION['message'] = "Welcome To Dashboard";
        header('Location: ../adminpanel/index.php');
        }
        else
        {
            $_SESSION['message'] = "Logged in Successfully";
            header('Location: ../index.php');
        }
    }

    else
    {
        $_SESSION['message'] = "Email or Password is Incorrect, Try Again!!";
        header('Location: ../adminlogin1.php');
    }
    
}


?>
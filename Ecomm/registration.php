<?php  
session_start();
include("userpanel/includes/header.php"); 
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
    .btn-outline-success:hover{
        background-color:black;
        color: white;
    }

    .btn-outline-success{
        width: 100px;
        
    }
</style>
<body background="img/signup.png">
    <div class="py-3">
    <div class="container">
        <div class = "row justify-content-center">
            <div class = "col-md-5">
                <?php 
                if(isset($_SESSION['message'])) 
                {
                ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Heyy!!</strong> <?= $_SESSION['message']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
            unset($_SESSION['message']);   
            } 
            ?>
                <div class = "card">
                    <div class="card-header">
                        <h4 style="text-align:center; font-family:Century Gothic;">Create Account</h4>
                    </div>
                    <div class="card-body">
                    <form action = "functions/authcode.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" autofocus="on" placeholder="&#xf007; Enter your name" style="font-family:Arial, FontAwesome" required = "true">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Phone Number</label>
                        <input type="number" name="phone" class="form-control" autofocus="on" placeholder="&#xf095; Enter your phone number" style="font-family:Arial, FontAwesome" required = "true">
                    </div>
                        <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email Address</label>
                        <input type="email" name="email" class="form-control" autofocus="on" placeholder="&#xf0e0; Enter valid email address" style="font-family:Arial, FontAwesome"id="exampleInputEmail1" aria-describedby="emailHelp" required = "true" title="only one email can be used for account registration, it cannot be used for another registration">
                        
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="&#xf023; Enter your password" style="font-family:Arial, FontAwesome" title="Password must be 8 characters including 1 uppercase letter, 1 lowercase letter and numeric characters"pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" id="exampleInputPassword1" required = "true">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Confirm Password</label>
                        <input type="password" name="cpassword" class="form-control" placeholder="&#xf00c; Confirm Password" style="font-family:Arial, FontAwesome" required="true">
                    </div>

            <center><button type="submit" name="register_btn" class="btn btn-outline-success">CREATE</button></center>
            </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include("userpanel/includes/footer.php"); ?>

   
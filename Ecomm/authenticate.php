<?php 
if(!isset($_SESSION['auth']))
{
    $_SESSION['message'] = "Logged in to Continue";
    header('Location: login.php');
}



?>
<?php 
session_start();
if(!isset($_SESSION['admin']))
{
    header('Location:admin_login.php');
}
else
{
    echo "Logged in as " . $_SESSION['admin'];
}
?>
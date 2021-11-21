<?php

    require_once("/home/yuvraj/Codes/php/Book_Store2.0/functions/db_functions.php");
    $conn = db_connect();
    if($_SERVER['REQUEST_METHOD'] =="POST"){
        $email = $_POST['email'];
        $name = $_POST['name'];
        $password = $_POST['password'];
        signup($conn,$email,$name,$password);
        session_start();
        $_SESSION['email'] = $email;
        header("Location:".$_SERVER['HTTP_REFERER']);
        
    }

?>
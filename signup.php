<?php

    require_once $_SERVER['DOCUMENT_ROOT']."/php/Store/functions/db_functions.php";
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
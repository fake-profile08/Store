<?php

    require_once($_SERVER['DOCUMENT_ROOT']."/php/Store/functions/db_functions.php");
    $conn = db_connect();
    if($_SERVER['REQUEST_METHOD'] =="POST"){
        $email = $_POST['email'];
        $password = $_POST['password'];
        if($email =="" || $password == ""){
            die("Bitch you think I'm stupid");

        }
        $ans = login($conn,$email,$password);
        if($ans==1){
            session_start();
        $_SESSION['email'] = $email;
        header("Location:".$_SERVER['HTTP_REFERER']);
        }
        else
        {
            header("Location:/php/Store/loginfail.php");
        }
        
        
        
    }
?>
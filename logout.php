<?php
    if($_SERVER['REQUEST_METHOD'] =="POST"){
       
        session_start();
        session_unset();
        session_destroy();
        header("Location:".$_SERVER['HTTP_REFERER']);
    }

?>
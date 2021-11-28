<?php 
    require_once $_SERVER['DOCUMENT_ROOT']."/php/Store/functions/db_functions.php";
    require_once $_SERVER['DOCUMENT_ROOT']."/php/Store/functions/cart_functions.php";
    session_start();
    if(!isset($_SESSION['email']))
    {
        die("Login to continue");
    }
    if($_SERVER['REQUEST_METHOD'] =="POST"){
        $book_isbn = $_POST['book_isbn'];
        echo $book_isbn . "<br/>";
        $conn = db_connect();
        addItem($conn,$book_isbn);
    }
    header("Location:cart.php");
?>
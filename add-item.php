<?php 
    session_start();
    if(!isset($_SESSION['email']))
    {
        die("Login to continue");
    }
    require_once "/home/yuvraj/Codes/php/Book_Store2.0/functions/db_functions.php";
    require_once "/home/yuvraj/Codes/php/Book_Store2.0/functions/cart_functions.php";
    if($_SERVER['REQUEST_METHOD'] =="POST"){
        $book_isbn = $_POST['book_isbn'];
        echo $book_isbn . "<br/>";
        $conn = db_connect();
        addItem($conn,$book_isbn);
    }
    header("Location:cart.php");
?>
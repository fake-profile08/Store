<?php

    function db_connect()
    {
        $server = "localhost";
        $username = "root";
        $password = "";
        $db = "Store";
        $conn = mysqli_connect($server,$username,$password,$db);
        if(!$conn)
        {
            die("<div class = 'db_error'>"."Error Connecting to the database: " . mysqli_connect_error()."</div>");
            exit;
        }
        return $conn;
    }
    function latestBooks($conn)
    {
        $query = "SELECT * FROM `books` ORDER BY `date` DESC;";
        $result = mysqli_query($conn,$query);
        if(!$result)
        {
            die($conn->error);
        }
        return $result;
    }

    function books($conn)
    {
        $query = "SELECT * FROM `books`;";
        $result = mysqli_query($conn,$query);
        if(!$result)
        {
            die($conn->error);
        }
        return $result;
    }
    
    function getBookByIsbn($conn,$isbn)
    {
        $query = "SELECT * FROM `books` WHERE `book_isbn` = '$isbn';";
        $result = mysqli_query($conn,$query);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }

    function signup($conn,$email,$name,$pass)
    {
        $query = "INSERT INTO `customers`(`email`,`name`) VALUES('$email', '$name');";
        $result = mysqli_query($conn,$query);
        if(!$result){
            die("Error signing up: ". $conn->error);
        }
        
        $query = "INSERT INTO `customer_login` VALUES('$email', '$pass');";
        $result = mysqli_query($conn,$query);
        if(!$result)
        {
            die("Error signing up: ". $conn->error);
        }
        
    }

    function login($conn,$email,$pass){
        $query = "SELECT `password` FROM `customer_login` WHERE email = '$email'";
        echo $email . "<br>". $pass . "<br>";
        $result = mysqli_query($conn,$query);
        $result = mysqli_fetch_assoc($result);
        if($result['password']==$pass)
        {
            return 1;
        }
        return 0;
    }

?>
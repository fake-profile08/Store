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
        return $result;
    }

    function books($conn)
    {
        $query = "SELECT * FROM `books`;";
        $result = mysqli_query($conn,$query);
        return $result;
    }
    
    function getBookByIsbn($conn,$isbn)
    {
        $query = "SELECT * FROM `books` WHERE `book_isbn` = '$isbn';";
        $result = mysqli_query($conn,$query);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }
?>
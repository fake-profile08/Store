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

?>
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
        $query = "SELECT * FROM `customer_login` WHERE `email` = '$email';";
        $result = mysqli_query($conn,$query);
        $result = mysqli_fetch_assoc($result);
        if($result['email'] ==$email)
        {
            die("Account already exits try logging in");
        }

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

        $query = "INSERT INTO `cart` VALUES(NULL, '$email',0,0);";
        $result = mysqli_query($conn,$query);

        if(!$result)
        {
            die("Error signing up: ". $conn->error);
        }
        
    }

    function login($conn,$email,$pass){
        $query = "SELECT `password` FROM `customer_login` WHERE email = '$email'";
        // echo $email . "<br>". $pass . "<br>";
        $result = mysqli_query($conn,$query);
        $result = mysqli_fetch_assoc($result);
        if($result['password']==$pass)
        {
            return 1;
        }
        return 0;
    }

    function addItem($conn,$book_isbn){
        $book = getBookByIsbn($conn, $book_isbn);
        echo var_dump($book) . "<br>";
        session_start();
        $email = $_SESSION["email"];
        echo var_dump($email) . '<br>';
        getCartData($conn,$email);
        $_SESSION['total_price']=$_SESSION['total_price']+$book['book_price'];
        $_SESSION['total_quantity'] = $_SESSION['total_quantity']+1;

        //Sql query to increase total items in cart table
        $query = "UPDATE `cart` SET `total_price` = ".$_SESSION['total_price'].", `total_quantity` = ".$_SESSION['total_quantity']." WHERE `id` = ".$_SESSION['id'].";";
        echo $query . '<br>';
        $result = mysqli_query($conn,$query);

        //Sql query to fetch book with id and isbn
        $query = "SELECT * FROM `cart-items` WHERE `id` = ".$_SESSION['id']." && `book_isbn` = '". $book_isbn."';";
        echo $query . '<br>';

        $result = mysqli_query($conn,$query);
        $result = mysqli_fetch_assoc($result);

        //If book already exists in cart-items table
        if($result['book_isbn']==$book_isbn)
        {
            echo "inside if<br>";
            $result['quantity']+=1;
            $result['price']+=$book['book_price'];
            $query = "UPDATE `cart-items` SET `quantity` = ".$result['quantity'].",`price` = ".$result['price']." WHERE `id` = ".$_SESSION['id']." && `book_isbn` = '". $book_isbn."';";
            echo $query . '<br>';

            $result = mysqli_query($conn,$query);
        }
        else
        {
            $query = "INSERT INTO `cart-items` VALUES(".$_SESSION['id'].",'".$book_isbn."',1,".$book['book_price'].");";
            echo $query . '<br>';

            $result = mysqli_query($conn,$query);
        }
        

    }

    function admin_login($conn,$username,$password){
        $query = "SELECT * FROM `admin` WHERE `username` = '$username';";
        $result = mysqli_query($conn,$query);
        $result = mysqli_fetch_array($result);
        if($password == $result['password'])
        {
            return 1;
        }
        return 0;
    }

?>
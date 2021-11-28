<?php
require_once $_SERVER['DOCUMENT_ROOT']."/php/Store/functions/db_functions.php";
if($_SERVER['REQUEST_METHOD'] =="POST")
{
    $conn = db_connect();
    $username = $_POST['username'];
    $password = $_POST['password'];
    $check = admin_login($conn,$username,$password);
    if($check ==1){
        session_start();
        $_SESSION['admin'] = $username;
        echo "Login successful";
        header("Location:admin.php");
        exit();
    }
    else{
        die("Failed to login");
    }
    
}
require_once $_SERVER['DOCUMENT_ROOT']."/php/Store/templates/header.php";


?>

<body>

    <div class="body">
        <div class="form-container">
            <form action="admin_login.php" method="post">
                <h2 class="form__title">Login</h2>
                <input type="text" name="username" id="username" placeholder="Username" class="form__input">
                <input type="password" name="password" id="password" placeholder="password" class="form__input">
                <button class="form__button">Continue</button>
            </form>
        </div>
    </div>

</body>
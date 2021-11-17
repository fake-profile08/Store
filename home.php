<?php
$title = "Cool Books";
$page = "home";
require_once "templates/header.php";
require_once "functions/db_functions.php";
$conn = db_connect();
?>
    <head>
        <link rel="stylesheet" href="CSS/home.css">
    </head>
<?php
require_once "templates/footer.php";
?>
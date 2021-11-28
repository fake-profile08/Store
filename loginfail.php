<?php
$title = "Cool Books";
$page = "home";

require_once "functions/db_functions.php";
require_once "templates/header.php";
$conn = db_connect();

?>

<head>
    <link rel="stylesheet" href="CSS/home.css">
</head>

<body>
    
    <div class="my-4 content contains login_error">
        Incorrect username or password
    </div>

</body>
<?php
require_once "templates/footer.php";
?>
<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="/php/Book_Store2.0/CSS/main.css">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Cool Books</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <li class="nav-item">
                        <a class="nav-link
                         <?php
                            if ($page == "home")
                                echo "active";
                            ?>" aria-current="page" href="/php/Book_Store2.0/index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link 
                        <?php
                        if ($page == "book")
                            echo "active";
                        ?>" href="/php/Book_Store2.0/book.php">Books</a>
                    </li>
                    <li class="nav-item">
                        <a href="/php/Book_Store2.0/cart.php" class="nav-link <?php
                                                                                if ($page == "cart")
                                                                                    echo "active";
                                                                                ?>">Cart</a>
                    </li>

                    <!-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li> -->


                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-success" type="button">Search</button>
                </form>
                &nbsp;&nbsp;
                <button <?php if (isset($_SESSION['email'])) {
                            echo "style = 'display:none;'";
                        } ?> type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
                &nbsp;&nbsp;
                <button <?php if (isset($_SESSION['email'])) {
                            echo "style = 'display:none;'";
                        } ?> type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#signupModal">SigUp</button>
                <form action="/php/Book_Store2.0/logout.php" method="post" id = "logout">
                    <button <?php if (!isset($_SESSION['email'])) {
                                echo "style = 'display:none;'";
                            } ?> type="button" class="btn btn-danger" id="btn-logout">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- LoginModal -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Login to Cool Books</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id = "login" Action = "/php/Book_Store2.0/login.php" method="post">
                        <div class="mb-3">
                            <label  for="exampleInputEmail1" class="form-label">Email address</label>
                            <input id = "login-email" name = "email" type="email" class="form-control" aria-describedby="emailHelp">
                            <div id="login_email_error" style="color:red;" class="form-text"></div>
                        </div>
                        <div class="mb-3">
                            <label  for="exampleInputPassword1" class="form-label">Password</label>
                            <input name = "password" type="password" class="form-control" id="login-password">
                            <div id="login_pass_error" style="color:red;" class="form-text"></div>
                        </div>

                        <button id="btn-login" type="button" class="btn btn-primary">Login</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- SignUp Modal -->
    <div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="signupModalLabel">Get an Cool Books Account</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="/php/Book_Store2.0/signup.php">
                        <div id="form_error" style="color:red;" class="form-text"></div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input id="email" name="email" type="email" class="form-control" aria-describedby="email_error">
                            <div id="email_error" style="color:red;" class="form-text"></div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Name</label>
                            <input id="name" name="name" type="text" class="form-control" aria-describedby="name_error">
                            <div id="name_error" style="color:red;" class="form-text"></div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input name="password" type="password" class="form-control" id="pass">
                            <div id="pass_error" style="color:red;" class="form-text"></div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="cpass">
                            <div id="cpass_error" style="color:red;" class="form-text"></div>
                        </div>

                        <button id="btn-signup" type="button" class="btn btn-primary">Create Account</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="/php/Book_Store2.0/js/main.js"></script>
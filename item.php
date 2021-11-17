<?php
require_once "functions/db_functions.php";
$conn = db_connect();
$isbn = $_GET['book_isbn'];
$book = getBookByIsbn($conn, $isbn);
$title = $book['book_title'];
require_once "templates/header.php";
$src = "../sources/images/" . $book['book_image'];
?>

<head>
    <link rel="stylesheet" href="../CSS/main.css">
</head>

<body>
    <div class="contains container my-4">
        <table>
            <tr>
                <td>
                    <div class="book_image">
                        <img src="<?php echo $src; ?>" alt="ff">
                    </div>
                </td>
                <td>
                    <div class="book_info">
                        <div class="book_title"><strong><?php echo $book['book_title']; ?></strong></div>
                        <div class="secondary_data">
                            by <?php echo $book['book_author']; ?> | <?php echo $book['date']; ?>
                        </div>
                        <div class="book_desc">
                            Book Description:
                        </div>
                        <div class = "my-4">
                            <?php echo $book['book_descr']; ?>
                        </div>
                        <a href="#">
                            <div style="font-size: 25px;" class="badge bg-primary my-4">$ <?php echo $book['book_price']; ?></div>
                        </a>
                    </div>
                </td>
            </tr>
        </table>
    </div>
</body>
<?php
$title = "Books";
$page = "book";
require_once "functions/db_functions.php";
require_once "templates/header.php";
$conn = db_connect();
?>
<html>

<head>

</head>

<body>
    <div class="content">
        <table class="table contains">
            <thead>
                <tr>
                    <th scope="col">Book</th>
                    <th scope="col">Info</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $books = books($conn);
                foreach ($books as $row) {
                    $src = "sources/images/" . $row['book_image'];
                ?>
                    <tr>
                        <td>
                            <div class="book_image">
                                <img src=<?php echo $src ?> alt="Image not found">
                            </div>
                        </td>
                        <td>
                            <dib class="book_info">
                                <div class="book_title"><strong><?php echo $row['book_title']; ?></strong></div>
                                <div class="secondary_data">
                                    by <?php echo $row['book_author']; ?> | <?php echo $row['date']; ?>
                                </div>
                                <div class="secondary_data">
                                    FREE Delivery over ₹499. Fulfilled by Amazon
                                </div>
                                <a href="#">
                                    <div style="font-size: 25px;" class="badge bg-primary my-4">$ <?php echo $row['book_price']; ?></div>
                                </a>
                            </dib>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>
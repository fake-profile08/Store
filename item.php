<?php
require_once "functions/db_functions.php";
$conn = db_connect();
$isbn = $_GET['book_isbn'];
$book = getBookByIsbn($conn, $isbn);
$title = $book['book_title'];
require_once "templates/header.php";
$src = "../sources/images/" . $book['book_image'];
?>

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
                        <div class="my-4">
                            <?php echo $book['book_descr']; ?>
                        </div>
                        <form id = "item-add-from" action="/php/Book_Store2.0/add-item.php" method="post">
                            <input type="hidden" name="book_isbn" value = "<?php echo $book['book_isbn']; ?>">
                            <button id = "btn-item-add" style="font-size: 25px;" class="btn btn-primary" type="submit">$<?php echo $book['book_price']; ?></button>

                        </form>
                    </div>
                </td>
            </tr>
        </table>
    </div>
</body>
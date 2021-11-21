<?php
require_once "/home/yuvraj/Codes/php/Book_Store2.0/functions/db_functions.php";
require_once "/home/yuvraj/Codes/php/Book_Store2.0/functions/cart_functions.php";
$title = "Cart";
$page = "cart";
require_once "templates/header.php";
$conn = db_connect();
$result = getCartData($conn,$_SESSION['email']);
?>
<head>
    <link rel="stylesheet" href="/php/Book_Store2.0/CSS/cart.css">
</head>
<body>
    <div class="content">
       <div class="contains">
       <table class="table">
            <thead>
                <tr>
                    <th scope="col">Item</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
               <tr>
                   <?php 
                   foreach($result as $row)
                   {
                        
                    
                   ?>
                   <td><?php
                   $book = getBookByIsbn($conn, $row['book_isbn']);
                   echo $book['book_title'];
                    ?></td>
                    <td><?php echo $book['book_price']; ?></td>
                    <td><form id = "<?php $row['book_isbn'] ?>" action="cart.php" method="post">
                        <input type="hidden" name="book_isbn" value="<?php echo $row['book_isbn']?>">
                        <input class="form-control quantity" type="text" name="quantity" id="quantity" value = "<?php echo $row['quantity']; ?>">
                    </form></td>
                    <td><?php echo $row['price']; ?></td>
                   
               </tr>
               <?php } ?>
            </tbody>
        </table>
        <div class="">
            <button class = " my-4 btn btn-primary" id="btn-changes">Save Changes</button>
        </div>
       </div>
    </div>
</body>
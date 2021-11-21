<?php
    function getCartData($conn,$email){
        $query = "SELECT * FROM `cart` WHERE `email` = '$email';";
        $result = $conn->query($query);
        $result = mysqli_fetch_assoc($result);
        $_SESSION['id'] = $result['id'];
        $_SESSION['total_price']=$result['total_price'];
        $_SESSION['total_quantity'] = $result['total_quantity'];

        $query = "SELECT * FROM `cart-items` WHERE `id` = ".$_SESSION['id'].";";
        $result = $conn->query($query);
        return $result;
    }
    

?>
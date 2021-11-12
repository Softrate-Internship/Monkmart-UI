<?php  
    include('config/constants.php');
    include('config/login-check.php');
    $quan = $_GET['quan'];
    $userid = $_SESSION['id'];
    $bookid = $_GET['bid'];
    $sql = "INSERT INTO cart (user_id,book_id,quantity) VALUES ('$userid','$bookid','$quan')";
    $result = $conn->query($sql);
    if($result){
        $_SESSION['cart_total']++;
    ?>
        <script>window.location.href='cart.php';</script>
    <?php
    }
?>
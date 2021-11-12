<?php  
    include('config/constants.php');
    include('config/login-check.php');
    $bookid = $_GET['bid'];
    $uid = $_SESSION['id'];
    $sql = "DELETE FROM cart WHERE user_id=$uid AND id=$bookid";
    $result = $conn->query($sql);
    $_SESSION['cart_total']--;
    if($result){
        ?>
            <script>window.location.href='cart.php';</script>
        <?php
    }
?>
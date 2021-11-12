<?php  
    include('config/constants.php');
    include('config/login-check.php');
    $bid = $_GET['id'];
    $sql = "INSERT INTO highlights (book_id) VALUES ('$bid')";
    $result = $conn->query($sql);
    if($result){
        ?>
            <script>window.location.href='highlights.php';</script>
        <?php
    }
?>
<?php  
    include('config/constants.php');
    include('config/login-check.php');
    $reason = $_POST['reason'];
    $oid = $_POST['id'];
    $sql = "UPDATE book_history SET reason=\"$reason\", status='aReturned' WHERE id=$oid";
    $result = $conn->query($sql);
    if($result){
        ?>
        <script>history.go(-1)</script>
        <?php 
    }
?>
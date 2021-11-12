<?php  
    include('config/constants.php');
    include('config/login-check.php');
    $track_id = $_POST['trackid'];
    $link = $_POST['link'];
    $oid = $_POST['id'];
    $sql = "UPDATE book_history SET track_id='$track_id', link='$link' WHERE id=$oid";
    $result = $conn->query($sql);
    if($result){
        ?>
        <script>window.location.href="admin-home.php";</script>
        <?php 
    }
?>
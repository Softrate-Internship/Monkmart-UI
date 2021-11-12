<?php  
    include('config/constants.php');
    include('config/login-check.php');
    $review = $_POST['review'];
    $rating = $_POST['rating'];
    $bid = $_POST['id'];
    $uid = $_SESSION['id'];
    date_default_timezone_set("Asia/kolkata");
    $currentDate = date("Y-m-d");
    $sql = "INSERT INTO reviews(user_id, book_id,rating, review, date) VALUES('$uid','$bid','$rating',\"$review\",'$currentDate')";
    $result = $conn->query($sql);
    if($result){
        ?>
        <script>history.go(-1)</script>
        <?php 
    }
?>
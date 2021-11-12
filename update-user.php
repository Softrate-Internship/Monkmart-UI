<?php  
    include('config/constants.php');
    $book_id = $_SESSION['id'];
    $imageName = $_FILES['image']['name'];
    $prev = $_POST['prevImg'];
    if($imageName!=NULL){
        unlink("user-images/".$prev);
        $ext=strtolower(pathinfo($imageName,PATHINFO_EXTENSION));
        $imageName = $book_id.'.'.$ext;
        $source = $_FILES['image']['tmp_name'];
        $destination = "user-images/".$imageName;
        $result = move_uploaded_file($source ,$destination);
        $sql = "UPDATE users SET image = '$imageName' WHERE id=$book_id";
        $result = $conn->query($sql);
    }
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $sql = "UPDATE users SET name='$name',phone='$phone' WHERE id=$book_id";
    $result = $conn->query($sql);
    if($result){
        ?>
        <script>
        alert("Successfully Updated");
        window.location.href='user.php'</script>
        <?php 
    }
    else{
        ?>
        <script>
        alert("Already Exists");
        window.location.href='user.php'</script>
        <?php
    }
?>
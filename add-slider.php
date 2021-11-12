<?php  
    include('config/constants.php');
    $sql = "INSERT INTO slider(image) VALUES('abc')";
    $conn->query($sql);
    $result = mysqli_query($conn, "SELECT MAX(id) FROM slider");
    $row = mysqli_fetch_array($result);
    $imageName = $_FILES['image']['name'];
    $ext=strtolower(pathinfo($imageName,PATHINFO_EXTENSION));
    $imageName = 'slide'.$row[0].'.'.$ext;
    $source = $_FILES['image']['tmp_name'];
    $destination = "slider-images/".$imageName;
    $result = move_uploaded_file($source ,$destination);
    $sql = "UPDATE slider SET image='$imageName' WHERE id=$row[0]";
    $result = $conn->query($sql);
    if($conn->query($sql)){
        ?>
        <script>window.location.href="advertising.php";</script>
        <?php 
    }
?>
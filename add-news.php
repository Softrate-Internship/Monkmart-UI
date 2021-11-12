<?php  
    include('config/constants.php');
    $heading = $_POST['heading'];
    $content = $_POST['content'];
    $sql = "INSERT INTO `news` (`id`, `heading`, `content`, `image`) VALUES (NULL, \"$heading\", \"$content\", NULL)";
    $result = $conn->query($sql);
    if($result){
        echo "h";
        $result = mysqli_query($conn, "SELECT MAX(id) FROM news");
        $row = mysqli_fetch_array($result);
        $imageName = $_FILES['image']['name'];
        $ext=strtolower(pathinfo($imageName,PATHINFO_EXTENSION));
        $imageName = $row[0].'.'.$ext;
        $source = $_FILES['image']['tmp_name'];
        $destination = "news-images/".$imageName;
        $result = move_uploaded_file($source ,$destination);
        $sql = "UPDATE news SET image='$imageName' WHERE id=$row[0]";
        $result = $conn->query($sql);
        if($result){
    ?>
        <script>
            alert("Added Successfully");
            window.location.href='news.php';
        </script>
    <?php 
        }
    }
?>
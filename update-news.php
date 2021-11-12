<?php  
    include('config/constants.php');
    $book_id = $_POST['bookid'];
    $imageName = $_FILES['image']['name'];
    $prev = $_POST['prevImg'];
    if($imageName!=''){
        unlink("news-images/".$prev);
        $ext=strtolower(pathinfo($imageName,PATHINFO_EXTENSION));
        $imageName = $book_id.'.'.$ext;
        $source = $_FILES['image']['tmp_name'];
        $destination = "news-images/".$imageName;
        $result = move_uploaded_file($source ,$destination);
        $sql = "UPDATE news SET image = '$imageName' WHERE id=$book_id";
        $result = $conn->query($sql);
    }
    $heading = $_POST['heading'];
    $content = $_POST['content'];
    $sql = "UPDATE news SET heading=\"$heading\",content=\"$content\" WHERE id=$book_id";
    $result = $conn->query($sql);
    if($result){
        ?>
        <script>
        alert("Successfully Updated");
        window.location.href='news.php'</script>
        <?php 
    }
?>
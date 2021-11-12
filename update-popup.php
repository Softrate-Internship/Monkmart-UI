<?php  
    include('config/constants.php');
    $imageName = $_FILES['image']['name'];
    $prev = $_POST['prev'];
    $pid = $_POST['pid'];
    if($imageName!=''){
        unlink("images/".$prev);
        $ext=strtolower(pathinfo($imageName,PATHINFO_EXTENSION));
        $imageName = 'popup'.$pid.'.'.$ext;
        $source = $_FILES['image']['tmp_name'];
        $destination = "images/".$imageName;
        $result = move_uploaded_file($source ,$destination);
        $sql = "UPDATE popup SET image = '$imageName' WHERE id=$pid ";
        $result = $conn->query($sql);
    }
    $content = $_POST['content'];
    $button = $_POST['button'];
    $link = $_POST['link'];
    $sql = "UPDATE popup SET content=\"$content\",button=\"$button\",link=\"$link\" WHERE id=$pid ";
    $result = $conn->query($sql);
    if($result){
        ?>
        <script>
            
    window.location.href='advertising.php';
</script>
        <?php 
    }
?>

<?php  
    include('config/constants.php');
    $book_id = $_POST['bookid'];
    $imageName = $_FILES['image']['name'];
    $prev = $_POST['prevImg'];
    if($imageName!=''){
        unlink("book-images/".$prev);
        $ext=strtolower(pathinfo($imageName,PATHINFO_EXTENSION));
        $imageName = $book_id.'.'.$ext;
        $source = $_FILES['image']['tmp_name'];
        $destination = "book-images/".$imageName;
        $result = move_uploaded_file($source ,$destination);
        $sql = "UPDATE books SET image = '$imageName' WHERE id=$book_id";
        $result = $conn->query($sql);
    }
    $name = $_POST['name'];
    $author = $_POST['author'];
    $description = $_POST['description'];
    $ndprice = $_POST['ndprice'];
    $price = $_POST['price'];
    $quantity = $_POST['pq'];
    if(isset($_POST['quantity'])){
        if($_POST['quantity']!=''){
        $quantity+=$_POST['quantity'];
        }
    }
    $sql = "UPDATE books SET name=\"$name\",author=\"$author\",ndprice='$ndprice',price='$price',description=\"$description\",quantity='$quantity' WHERE id=$book_id";
    $result = $conn->query($sql);
    if($result){
        ?>
        <script>
        alert("Successfully Updated");
        window.location.href='admin-product.php?id=<?php echo $book_id; ?>'</script>
        <?php 
    }
?>
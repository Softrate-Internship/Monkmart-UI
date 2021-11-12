<?php  
    include('config/constants.php');
    $name = $_POST['name'];
    $author = $_POST['author'];
    $description = $_POST['description'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $ndprice = $_POST['ndprice'];
    $sql = "INSERT INTO books (name,author,price,ndprice,description,quantity) VALUES (\"$name\",\"$author\",'$price','$ndprice',\"$description\",'$quantity')";
    $result = $conn->query($sql);
    if($result){
        $result = mysqli_query($conn, "SELECT MAX(id) FROM books");
        $row = mysqli_fetch_array($result);
        $imageName = $_FILES['image']['name'];
        $ext=strtolower(pathinfo($imageName,PATHINFO_EXTENSION));
        $imageName = $row[0].'.'.$ext;
        $source = $_FILES['image']['tmp_name'];
        $destination = "book-images/".$imageName;
        $result = move_uploaded_file($source ,$destination);
        $sql = "UPDATE books SET image='$imageName' WHERE id=$row[0]";
        $result = $conn->query($sql);
        if($result){
    ?>
        <script>
            alert("Added Successfully");
            window.location.href='books.php';
        </script>
    <?php 
        }
    }
?>
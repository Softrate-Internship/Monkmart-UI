<?php 
    include('config/constants.php');
    $name = $_POST['name'];
    $email = $_POST['email'];
    $ph = $_POST['phone'];
    $pswd = $_POST['pswd'];
    $pswd = md5($pswd);
    $sql = "INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `position`) VALUES (NULL, '$name', '$email', '$pswd', '$ph', 'User');";
    $result = $conn->query($sql);

    if($result){
        $result = mysqli_query($conn, "SELECT MAX(id) FROM users");
        $row = mysqli_fetch_array($result);
        if(isset($_FILES['image']['name'])){
        $imageName = $_FILES['image']['name'];
        if($imageName!=''){
        $ext=strtolower(pathinfo($imageName,PATHINFO_EXTENSION));
        $imageName = $row[0].'.'.$ext;
        $source = $_FILES['image']['tmp_name'];
        $destination = "user-images/".$imageName;
        $result = move_uploaded_file($source ,$destination);
        $sql = "UPDATE users SET image='$imageName' WHERE id=$row[0]";
        $result = $conn->query($sql);
        }
        }
        $_SESSION['name'] = $name;
        $_SESSION['id'] = $row[0];
        $_SESSION['email'] = $email;
        $_SESSION['ph'] = $ph;
        $_SESSION['cart_total'] = 0;
        ?>
        <script>
            history.go(-1);
        </script>  
        <?php        
    }
    else{
        ?>
        <script>
            alert("Already Exists. Please Sign in!!");
            window.location.href="index.php";
        </script>
        <?php 
    }
?>
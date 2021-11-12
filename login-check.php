<?php  
    include('config/constants.php');
    $email = $_GET['email'];
    $password = $_GET['pswd'];
    $password = md5($password);
    $sql = "SELECT * from users WHERE email='$email'";
    $result = $conn->query($sql);
    if($result && $result->num_rows>0){
        $row = $result->fetch_assoc();
        if($row['password']==$password){
            $_SESSION['id']=$row['id'];
            $_SESSION['name']=$row['name'];
            $_SESSION['phone']=$row['phone'];
            $_SESSION['email']=$row['email'];

            $uid = $row['id'];
            $sql1 = "SELECT * FROM cart WHERE user_id = $uid"; 
            $result1 = $conn->query($sql1);
            $count = $result1->num_rows;
            $_SESSION['cart_total'] = $count;
            if($row['position']=='Admin'){
            ?>
            <script>window.location.href='admin-home.php';</script>
            <?php
            } 
            else{
                ?>
            <script>history.go(-1)</script>
            <?php
            }
        }
        else{
            ?>
            <script>
                alert("Wrong Password");
                window.location.href="index.php";
            </script>
            <?php 
        }
    }
    else{
        ?>
            <script>
                alert("Account does not exist. Please Sign up!!");
                window.location.href="index.php";
            </script>
            <?php 
    }   
?>
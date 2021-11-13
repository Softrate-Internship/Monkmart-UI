<?php  
    include('config/constants.php');
    include('config/login-check.php');
    $uid = $_SESSION['id'];
    $sql = "SELECT * FROM cart WHERE user_id = $uid";
    $result = $conn->query($sql);
    if($result->num_rows>0){
        while($row = $result->fetch_assoc()){
            $bid = $row['book_id'];
            $sql1 = "SELECT * FROM books WHERE id=$bid";
            $result1 = $conn->query($sql1);
            $row1 = $result1->fetch_assoc();
            $bname = $row1['name'];
            $author = $row1['author'];
            $price = $row1['price'];
            $quan = $row['quantity'];
            $image = $row1['image']; 
            $order_name = $_SESSION['order_name'];
            $order_address = $_SESSION['order_address'];
            $order_phone = $_SESSION['order_phone'];
            if($row1['quantity']>0){
                $sql1 = "INSERT INTO book_history (user_id,book_name,author,image,price,quantity,user_name,address,phone) VALUES ('$uid','$bname','$author','$image','$price','$quan','$order_name','$order_address','$order_phone')";
                $result1 = $conn->query($sql1);  
                if($result1){
                    $sql2 = "UPDATE books SET quantity = quantity - $quan WHERE id=$bid ";
                    $result2 = $conn->query($sql2);
                }
            }
        }
    }
    $sql = "DELETE FROM cart WHERE user_id = $uid";
    $result = $conn->query($sql);
    $_SESSION['cart_total'] = 0;
?>
<script>
    window.location.href = 'my-orders.php';
</script>
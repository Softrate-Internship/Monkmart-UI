<?php 
session_start();
$name = $_POST['name'];
$door = $_POST['door'];
$street = $_POST['street'];
$area = $_POST['area'];
$pincode = $_POST['pincode'];
$phone = $_POST['phone'];
$address = $door.' '.$street.' '.$area.' '.$pincode;
$_SESSION['order_name'] = $name;
$_SESSION['order_address'] = $address;
$_SESSION['order_phone'] = $phone;
?>
<script>window.location.href="pay.php?checkout=manual"</script>
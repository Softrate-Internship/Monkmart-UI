<!DOCTYPE html>
<html lang="en">
<?php  
    include('config/constants.php');
    include('config/login-check.php');
    ?>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@400;700&display=swap" rel="stylesheet" />

    <link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon" />

    <!-- Carousel -->
    <link rel="stylesheet" href="node_modules/@glidejs/glide/dist/css/glide.core.min.css" />
    <link rel="stylesheet" href="node_modules/@glidejs/glide/dist/css/glide.theme.min.css" />

    <!-- Animate On Scroll -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />


    <!-- Custom StyleSheet -->
    <link rel="stylesheet" href="styles.css" />
    <link rel="stylesheet" href="cart.css" />

    <title>Monk mart</title>
    <style>
            h1 {
                font-weight:600 !important; 
            }
    </style>
</head>

<body>
    <header id="header" class="header">
        <div class="navigation">
            <div class="container">
                <nav class="nav">
                    <div class="nav__hamburger">
                        <svg>
                            <use xlink:href="./images/sprite.svg#icon-menu"></use>
                        </svg>
                    </div>

                    <div class="nav__logo">
                        <img src="images\mms.png" width="200" height="50">
                    </div>

                    <div class="nav__menu">
                        <div class="menu__top" style="background-color:white">
                                <span class="nav__category"><img src="images\mms.png" width="250" height="50"></span>
                                <a href="#" class="close__toggle">
                                    <svg>
                                    <use xlink:href="./images/sprite.svg#icon-cross"></use>
                                    </svg>
                                </a>
                            </div>
                        <ul class="nav__list">
                            <li class="nav__item">
                                <a href="index.php" class="nav__link">Home</a>
                            </li>   
                        </ul>
                    </div>
                </nav>
            </div>
        </div>

        <div class="page__title-area">
            <div class="container">
                <div class="page__title-container">
                    <ul class="page__titles">
                        <li>
                            <a href="index.php">
                                <svg>
                                    <use xlink:href="./images/sprite.svg#icon-home"></use>
                                </svg>
                            </a>
                        </li>
                        <li class="page__title">Order</li>
                    </ul>
                </div>
            </div>
        </div>
    </header>

    <div class=" box cart__totals" style="width:fit-content; min-width:50%; border-radius:8px;margin-left:auto;margin-right:auto" >
        <h1 style="text-align:center;">Shipping Details</h1>
        <br>
        <div style="display:inline"><h1 style="font-size:100%;display:inline">Name:&nbsp;&nbsp;</h1><h4 style="display:inline"><?php echo $_SESSION['order_name']; ?></h4></div>
        <br><br>
        <div style="display:inline"><h1 style="font-size:100%;display:inline">Address:&nbsp;&nbsp;</h1><h4 style="display:inline"><?php echo $_SESSION['order_address']; ?></h4></div>
        <br><br>
        <div style="display:inline"><h1 style="font-size:100%;display:inline">Phone:&nbsp;&nbsp;</h1><h4 style="display:inline"><?php echo $_SESSION['order_phone']; ?></h4></div>
        <br><br>
    </div>
    
    <br>        

    <!-- Go To -->

    <a href="#header" class="goto-top scroll-link">
        <svg>
            <use xlink:href="./images/sprite.svg#icon-arrow-up"></use>
        </svg>
    </a>

    <!-- Glide Carousel Script -->
    <script src="node_modules/@glidejs/glide/dist/glide.min.js"></script>

    <!-- Animate On Scroll -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- Custom JavaScript -->
    <script src="./js/products.js"></script>
    <script src="./js/index.js"></script>
    <script src="./js/slider.js"></script>

</body>
<br>

<div class="order_wrapper">
<?php 
$uid = $_SESSION['id'];
$uid = $_SESSION['id'];
$sql = "SELECT * FROM cart WHERE user_id=$uid";
$result = $conn->query($sql);
$total = 0;
if($result->num_rows>0){
    while($row = $result->fetch_assoc()){
        $bid = $row['book_id'];
        $sql1 = "SELECT * FROM books WHERE id = $bid";
        $result1 = $conn->query($sql1);
        $row1 = $result1->fetch_assoc();
        $total+=$row1['price']*$row['quantity'];
?>
        <div class="order_container" style="margin-bottom:20px">
            <div class="ordered_book_img">
                <img src="book-images\<?php echo $row1['image']; ?>" alt="">
            </div>
            <div class="ordered_book_info">
                <div class="order_info_cont">
                    <br>
                    <div class="book_name">
                        <h2><?php echo $row1['name']; ?></h2>
                        <p><?php echo $row1['author']; ?></p>
                    </div>
                    <br>
                    <div class="price_qty">
                        <div class="price">
                            <p>Price: <span><?php echo $row1['price']; ?> ₹</span></p>
                        </div>
                        <br>

                        <div class="qty">
                            <p>Quantity: <span><?php echo $row['quantity']; ?></span></p>
                        </div>
                    </div>
                    <br>
                    <div class="final_info">
                        <div class="total" style="display:inline">
                                <p style="display:inline">Total : <?php echo $row['quantity'] * $row1['price']; ?> ₹</p>
                        </div>   
                    </div>
                </div>
            </div>
        </div>
        <?php }
} ?>
    </div>
<br>
<div class="cart__totals" style="width:fit-content; min-width:70%; border-radius:8px;">
        <h3>Cart Totals</h3>
        <ul>
            <li>
                Subtotal
                <span class="new__price"><?php echo $total; ?> ₹</span>
            </li>
            <li>
                Shipping
                <span>Free</span>
            </li>
            <li>
                Total
                <span class="new__price"><?php echo $total; ?> ₹</span>
            </li>
        </ul>
        
    </div>
    
        

<?php
$name = $_SESSION['name'];
$phone = $_SESSION['phone'];
$email = $_SESSION['email'];

require('razorpay/config.php');
require('razorpay/razorpay-php/Razorpay.php');

// Create the Razorpay Order

use Razorpay\Api\Api;

$api = new Api($keyId, $keySecret);

//
// We create an razorpay order using orders api
// Docs: https://docs.razorpay.com/docs/orders
//
$orderData = [
    'receipt'         => 3456,
    'amount'          => ($total) * 100, // 2000 rupees in paise
    'currency'        => 'INR',
    'payment_capture' => 1 // auto capture
];

$razorpayOrder = $api->order->create($orderData);

$razorpayOrderId = $razorpayOrder['id'];

$_SESSION['razorpay_order_id'] = $razorpayOrderId;

$displayAmount = $amount = $orderData['amount'];

if ($displayCurrency !== 'INR')
{
    $url = "https://api.fixer.io/latest?symbols=$displayCurrency&base=INR";
    $exchange = json_decode(file_get_contents($url), true);

    $displayAmount = $exchange['rates'][$displayCurrency] * $amount / 100;
}

$checkout = 'automatic';

if (isset($_GET['checkout']) and in_array($_GET['checkout'], ['automatic', 'manual'], true))
{
    $checkout = $_GET['checkout'];
}

$data = [
    "key"               => $keyId,
    "amount"            => $amount,
    "name"              => "Monk mart",
    "description"       => "Happy Reading!!",
    "image"             => "images/transparent.png",
    "prefill"           => [
    "name"              => $name,
    "email"             => $email,
    "contact"           => $phone,
    ],
    "notes"             => [
    "address"           => "Hello World",
    "merchant_order_id" => "12312321",
    ],
    "theme"             => [
    "color"             => "#F37254"
    ],
    "order_id"          => $razorpayOrderId,
];

if ($displayCurrency !== 'INR')
{
    $data['display_currency']  = $displayCurrency;
    $data['display_amount']    = $displayAmount;
}

$json = json_encode($data);

require("razorpay/checkout/{$checkout}.php");

?>


<?php include('footer.php') ?>

    <!-- End Footer -->


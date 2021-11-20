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
    <link rel="stylesheet" href="home.css" />

    <title>Monk mart</title>
    <style>
        .b {
    
    outline: none;
    text-decoration: none;
    border: none;
    background: transparent;
}


/* View */

.view-btn a {
    border-radius: 4px;
    cursor: pointer;
    border: 2px solid #2b1f4d;
    padding: 7px 27px;
    background-color: #2b1f4d;
    text-decoration: none;
    font-size: 18px;
    font-weight: 600;
    color: white;
}

.view-btn :hover {
    transition: all 250ms ease-in-out;
    background-color: white;
    color: #2b1f4d;
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
                            <li class="nav__item">
                                <a href="user-books.php" class="nav__link">Books</a>
                            </li>
                            
                        </ul>
                    </div>

                    <div class="nav__icons">
                        

                        <a class="icon__item">
                            <svg class="icon__cart">
                                <use xlink:href="./images/sprite.svg#icon-shopping-basket"></use>
                            </svg>
                            <span id="cart__total"><?php echo $_SESSION['cart_total']; ?> </span>
                        </a>
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
                        <li class="page__title">Cart</li>
                    </ul>
                </div>
            </div>
        </div>
    </header>

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

</html>



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
                                <a data-bs-target="#exampleModal2" data-bs-toggle="modal" onclick="myFunction(<?php echo $row['id']; ?>)" class="remove__cart-item">
                                <i style="color:red;display:inline;padding-right:10px" class="fas fa-trash"></i>
                            </a>
                        </div>   
                    </div>
                </div>
            </div>
        </div>
        <?php }
        } ?>
        </div> <?php 
        if($result->num_rows==0) { ?>
            <p style="border:1px solid grey; padding:20px;display: block;margin-left: auto;margin-right: auto;width: fit-content; min-width:50%;text-align:center">You havent added any yet.</p>
            <?php 
            }
        ?>
    

<script>
    let bid = 0;
    function myFunction(t){
    bid = t;
    }
</script> 

<?php if($total!=0){ ?>
    <div class="cart__totals" style="width:max-content;min-width:40%;border-radius:8px">
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
        <a style="display:block;margin-left:auto;margin-right:auto;width:max-content"href="shipping.php">PROCEED TO CHECKOUT</a>
        </div>
    <?php } ?>
<br>

<main id="main">
        <!-- Facility Section -->
        <section class="facility__section section" id="facility">
                <div class="collection_content">
                    <div class="collection_cont_wrapper">
                        <div class="collection_info">
                            <div class="collection_info_img">
                                <svg>
                                    <use xlink:href="./images/sprite.svg#icon-airplane"></use>
                                </svg>
                            </div>
                            <p>FREE SHIPPING ACROSS INDIA</p>
                        </div>

                        <div class="collection_info">
                            <div class="collection_info_img">
                                <svg>
                                    <use xlink:href="./images/sprite.svg#icon-credit-card-alt"></use>
                                </svg>
                            </div>
                            <p>100% MONEY BACK GUARANTEE</p>
                        </div>

                        <div class="collection_info">
                            <div class="collection_info_img">
                                <svg>
                                    <use xlink:href="./images/sprite.svg#icon-credit-card"></use>
                                </svg>
                            </div>
                            <p>MANY PAYMENT GATWAYS</p>
                        </div>

                        <div class="collection_info">
                            <div class="collection_info_img">
                                <svg>
                                    <use xlink:href="./images/sprite.svg#icon-headphones"></use>
                                </svg>
                            </div>
                            <p>24/7 ONLINE SUPPORT</p>
                        </div>

                    </div>
                </div>
            </section>
    </main>

<?php include('footer.php') ?>

<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">

                    <h5 class="modal-title fw-bold heading" id="exampleModalLabel2" style="font-size:120%;">Confirmation</h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" >
                    <h5 style="font-size:100%; margin-top:5%;margin-bottom:5%">Do you really want to delete?</h5>
                </div>
                <div class="modal-footer">
                    <button class="b view-btn">
                        <a  onclick="window.location.href='delete-cart.php?bid=' + bid " href="#">Delete</a>
                    </button>
                </div>
            </div>
        </div>
    </div>






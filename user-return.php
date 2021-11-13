<!DOCTYPE html>
<html lang="en">
<?php  
    include('config/constants.php');
    include('config/login-check.php');
    ?>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

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

    <link rel="stylesheet" href="order.css" />

    <title>Monk mart</title>
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
                                <a href="orders.php" class="nav__link">Orders</a>
                            </li>
                            
                        </ul>
                    </div>

                    <div class="nav__icons">
                        <a href="cart.php" class="icon__item">
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
                        <li class="page__title">Orders</li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
</body>
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

</html>
    <br>
    <?php 
        $rowval = 0;
        $uid = $_SESSION['id'];
        $sql = "SELECT * FROM book_history WHERE user_id=$uid AND (status='Delivered' OR status='aReturned') ORDER BY delivery_date DESC";
        $result = $conn->query($sql);
        $total = 0;
        if($result->num_rows>0){
        while($row = $result->fetch_assoc()){
            date_default_timezone_set("Asia/kolkata");
            $currentDate = date("Y-m-d");
            $currentTime = date("H:i:s");
            $date=date_create($currentDate);
            date_sub($date,date_interval_create_from_date_string("7 days"));
            $now = date_format($date,"Y-m-d").' '.$currentTime;
            $now = new DateTime($now);
            $bookdate = $row['delivery_date'];
            $datetime1 = new DateTime($bookdate);
            if($now<=$datetime1 || $row['status']=='aReturned'){
                $rowval++;
        ?>

    <div class="order_wrapper">
        <div class="order_container">
            <div class="ordered_book_img">
                <img src="book-images\<?php echo $row['image']; ?>" onerror="this.src='book-images/notfound.png'">
            </div>
            <div class="ordered_book_info">
                <div class="order_info_cont">
                    <div class="book_name" >
                        <h2><?php echo $row['book_name']; ?></h2>
                        <p style="text-align:center">- <?php echo $row['author']; ?></p>
                    </div>
                    <br>
                    <div class="price_qty" style="margin-bottom:15px;">
                        <div class="price" style="margin-bottom:15px;">
                            <p>Price: <span><?php echo $row['price']; ?> ₹</span></p>
                        </div>
                        <div class="qty" style="margin-bottom:15px;">
                            <p>Quantity: <span><?php echo $row['quantity']; ?></span></p>
                        </div>
                    </div>
                    <div class="order_info">
                        <div class="total">
                            <button>
                                Total - <?php echo $row['quantity'] * $row['price']; ?> ₹
                            </button>
                        </div>
                        <br>
                        <div class="qty" style="margin-bottom:10px;">
                            <?php $date1=date_create(substr($row['date'],0,10)); ?>
                            <p>Date: <span><?php echo date_format($date1,"d/m/Y"); ?></span></p>
                        </div>
                        <div class="qty">
                            <p>Time <span><?php echo substr($row['date'],11); ?></span></p>
                        </div>
                    </div>
                </div>
                <div class="final_info">
                    <div class="trackId">
                        <p>TRACK ID:</p>
                    </div>
                    <div class="trackId">
                        <p><?php echo $row['track_id']; ?></p>
                    </div>
                    <br>
                   <?php if($row['status']=="aReturned"){
                        ?> 
                    <div class="status">
                        <p>Return Request</p>
                    </div>
                    <?php 
                    }
                     else {
                     ?>
                    <div class="status">
                        <a onclick="myFunction(<?php echo $row['id']; ?>)" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><p>Return Book</p></a>
                    </div>
                    <?php } ?>                     
                    <?php 
                        } 
                    ?>
                </div>
            </div>
        </div>
    </div>
            <?php
      }
     }
     ?>
     <?php 
        if($rowval==0) { ?>
            <p style="border:1px solid grey; padding:20px;display: block;margin-left: auto;margin-right: auto;width: fit-content; min-width:50%;text-align:center">You dont have any orders to return.</p>
            <?php 
            }
        ?>
   
<br>

    <script>
        function myFunction(t){
            document.getElementById("oid").value = t;
        }
    </script>
    <main id="main">
        

        <!-- Facility Section -->
        <section class="facility__section section" id="facility">
            <div class="container">
                <div class="facility__contianer">
                    <div class="facility__box">
                        <div class="facility-img__container">
                            <svg>
                                <use xlink:href="./images/sprite.svg#icon-airplane"></use>
                            </svg>
                        </div>
                        <p>FREE SHIPPING ACROSS INDIA</p>
                    </div>

                    <div class="facility__box">
                        <div class="facility-img__container">
                            <svg>
                                <use xlink:href="./images/sprite.svg#icon-credit-card-alt"></use>
                            </svg>
                        </div>
                        <p>100% MONEY BACK GUARANTEE</p>
                    </div>

                    <div class="facility__box">
                        <div class="facility-img__container">
                            <svg>
                                <use xlink:href="./images/sprite.svg#icon-credit-card"></use>
                            </svg>
                        </div>
                        <p>MANY PAYMENT GATWAYS</p>
                    </div>

                    <div class="facility__box">
                        <div class="facility-img__container">
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


<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Return</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" action="return.php">
      <div class="modal-body" style="text-align:center">
          <h4>Could you please let us know the reason to return.</h4>
          <br>
        <textarea name="reason" placeholder="Reason to Cancel" rows="5" cols="40" required></textarea>
        <input type="hidden" value="-1" name="id" id="oid">
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Return</button>
      </div>
      </form>
    </div>
  </div>
</div>







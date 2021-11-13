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


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>


    <!-- Custom StyleSheet -->
    <link rel="stylesheet" href="styles.css" />

    <link rel="stylesheet" href="order.css" />

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
.c {
    color:white;
}
.c:hover {
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
                                <a href="user-return.php" class="nav__link">Return</a>
                            </li>
                            
                        </ul>
                    </div>

                    <div class="nav__icons">
                        <a href="my-cart.php" class="icon__item">
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
        $uid = $_SESSION['id'];
        $sql = "SELECT * FROM book_history WHERE user_id=$uid ORDER BY date DESC, status DESC";
         $result = $conn->query($sql);
        $total = 0;
        $p = 1;
        if($result->num_rows>0){
        while($row = $result->fetch_assoc()){
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
                        <p>- <?php echo $row['author']; ?></p>
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
                    <?php if($row['track_id']==NULL){ ?>
                    <div class="trackId">
                        <p>-</p>
                    </div>
                    <?php } else{ ?>
                    <div class="trackId" style="display:inline">
                        <p style="display:inline" id="p<?php echo $p; ?>"><?php echo $row['track_id']; ?></p>
                        <a href="#" style="display:inline;margin-left:10px" onclick="copyToClipboard('#p<?php echo $p++; ?>')"><i class="far fa-clipboard"></i></a>
                    </div>
                    <?php } ?>
                    <br>
                    <?php if($row['status']=="Ordered"){ 
                            if($row['track_id']==NULL){ ?>
                    <div class="status">
                        <p>Order Placed</p>
                    </div>
                    <?php } else{ ?>
                    <div class="status">
                    <a href="<?php echo $row['link']; ?>" target="_blank"><p>Track Status</p></a>
                    </div>
                    <?php  }
                    } elseif($row['status']=="aReturned"){
                        ?> 
                    <div class="status">
                        <p>Return Request</p>
                    </div>
                    <?php 
                    }
                    elseif($row['status']=="aReturnedz"){
                    ?>
                    <div class="status">
                        <p>Returned</p>
                    </div>
                    <?php 
                    }
                     else {
                    date_default_timezone_set("Asia/kolkata");
                    $currentDate = date("Y-m-d");
                    $currentTime = date("H:i:s");
                    $date=date_create($currentDate);
                    date_sub($date,date_interval_create_from_date_string("7 days"));
                    $now = date_format($date,"Y-m-d").' '.$currentTime;
                    $now = new DateTime($now);
                    $bookdate = $row['delivery_date'];
                    $datetime1 = new DateTime($bookdate);
                    if($now<=$datetime1){ ?>
                    <div class="status">
                        <a onclick="myFunction(<?php echo $row['id']; ?>)" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><p>Return Book</p></a>
                    </div>
                    <?php }
                    else{ ?>
                    <div class="status">
                        <p>Expired</p>
                    </div>
                                               
                    <?php 
                        }
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
<br>

    <script>
        function myFunction(t){
            document.getElementById("oid").value = t;
        }
        function copyToClipboard(element) {
            var $temp = $("<input>");
            $("body").append($temp);
            $temp.val($(element).text()).select();
            document.execCommand("copy");
            $temp.remove();
        }
    </script>

<?php 
        if($result->num_rows==0) { ?>
            <p style="border:1px solid grey; padding:20px;display: block;margin-left: auto;margin-right: auto;width: fit-content; min-width:50%;text-align:center">You dont have any orders yet.</p>
            <?php 
            }
        ?>
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
            <button class="b view-btn" type="submit">
                <a class="c">RETURN</a>
            </button>
      </div>
      </form>
    </div>
  </div>
</div>







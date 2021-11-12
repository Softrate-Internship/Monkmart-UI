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

    <main id="main">
        <section class="section cart__area">
            <div class="container">
                <div class="responsive__cart-area">
                    <form class="cart__form">
                        <div class="cart__table table-responsive">
                            <table width="100%" class="table" style="text-align:center">
                                <thead style="text-align:center">
                                    <tr>
                                        <th style="text-align:center">PRODUCT</th>
                                        <th style="text-align:center">NAME</th>
                                        <th style="text-align:center">PRICE</th>
                                        <th style="text-align:center">QTY</th>
                                        <th style="text-align:center">TOTAL</th>
                                        <th style="text-align:center">DATE & TIME</th>
                                        <th style="text-align:center">TRACK_ID</th>
                                        <th style="text-align:center">STATUS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $uid = $_SESSION['id'];
                                $sql = "SELECT * FROM book_history WHERE user_id=$uid ORDER BY date DESC, status DESC";
                                $result = $conn->query($sql);
                                $total = 0;
                                if($result->num_rows>0){
                                    while($row = $result->fetch_assoc()){
                                        
                                ?>
                                    <tr style="text-align:center">
                                        <td class="product__thumbnail">
                                            <a >
                                                <img src="book-images\<?php echo $row['image']; ?>" onerror="this.src='book-images/notfound.png'">
                                            </a>
                                        </td>
                                        <td class="product__name">
                                            <a href="#"><?php echo $row['book_name']; ?></a>
                                            <br><br>
                                            <small><?php echo $row['author']; ?></small>
                                        </td>
                                        <td class="product__price">
                                            <div class="price">
                                                <span class="new__price"><?php echo $row['price']; ?> ₹</span>
                                            </div>
                                        </td>
                                        <td class="product__quantity">
                                            <div class="input-counter">
                                                <div>
                                                   
                                                    <input type="text" min="1" value="<?php echo $row['quantity']; ?>" max="10" class="counter-btn" disabled>
                                                    
                                                </div>
                                            </div>
                                        </td>
                                        <td class="product__subtotal">
                                            <div class="price">
                                                <span class="new__price"><?php echo $row['quantity'] * $row['price']; ?> ₹</span>
                                            </div>
                                            
                                        </td>
                                        <td>
                                            <?php echo $row['date']; ?> 
                                        </td>
                                        <?php if($row['track_id']==NULL){ ?>
                                            <td>-</td>
                                        <?php } else{ ?>
                                        <td>
                                            <?php echo $row['track_id']; ?> 
                                        </td>
                                        <?php } if($row['status']=="Ordered"){ 
                                            if($row['track_id']==NULL){ ?>
                                                <td>Order Placed</td>
                                            <?php }
                                            else{ ?>
                                                <td><a href="<?php echo $row['link']; ?>" target="_blank"><button style="width:80%;font-size:90%" type="button" class="btn btn-outline-secondary">Track</button></a></td>
                                           <?php }
                                        }
                                        elseif($row['status']=="aReturned"){
                                            ?>
                                                <td>Return Requested</td>
                                                <?php 
                                        }
                                        elseif($row['status']=="aReturnedz"){
                                            ?>
                                                <td>Returned</td>
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
                                                <td><button onclick="myFunction(<?php echo $row['id']; ?>)" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="width:80%;font-size:90%" class="btn btn-outline-danger">Return</button></td>
                                            <?php }
                                            else{
                                                ?>
                                                <td>Expired</td>
                                                <?php 
                                            }
                                        } 
                                         ?>
                                    </tr>
                                <?php
                                    }
                                }else{ ?>
                                    <tr >
                                        <td colspan="8" style="text-align:center">You dont have any orders yet!!</td>
                                    </tr>
                                <?php } 
                                ?> 
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <script>
                function myFunction(t){
                    document.getElementById("oid").value = t;
                }
        </script>

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





<!DOCTYPE html>
<html lang="en">
<?php  
    include('config/constants.php');
    $flag = 0;
if(isset($_SESSION['id'])){
    $flag = 1;
}
    ?>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


    <!-- Favicon -->
    <link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@400;700&display=swap" rel="stylesheet" />

    <!-- Carousel -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/css/glide.core.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/css/glide.theme.min.css
">
    <!-- Animate On Scroll -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <!-- Custom StyleSheet -->
    <link rel="stylesheet" href="styles.css" />
    <link rel="stylesheet" href="Login.css" />

    <title>Monk mart</title>
    <style>
        .container {
  position: relative;
}
.top-right {
  position: absolute;
  top: 3px;
  right: 8px;
  border-radius:100%;
  padding:10px;
  background-color:red;
  color:white;
}
.b {
    outline: none;
    text-decoration: none;
    border: none;
    background: transparent;
}
.c {
    color:white;
}
.c:hover {
    color: #2b1f4d;

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
                        <ul class="nav__list" >
                            <li class="nav__item">
                                <a href="index.php" class="nav__link">Home</a>
                            </li>
                            <li class="nav__item">
                                <a href="user-books.php" class="nav__link">BOOKS</a>
                            </li>
                            
                        </ul>
                    </div>
                    <?php if($flag==1){ ?>

                    <div class="nav__icons">

                        <a href="cart.php" class="icon__item">
                            <svg class="icon__cart">
                                <use xlink:href="./images/sprite.svg#icon-shopping-basket"></use>
                            </svg>
                            <?php
                            $uid = $_SESSION['id'];
                            $sql = "SELECT * FROM cart WHERE user_id = $uid"; 
                            $result = $conn->query($sql);
                            $count = $result->num_rows;
                            ?>
                            <span id="cart__total"><?php echo $count; ?> </span>
                        </a>
                    </div>
                    <?php } ?>
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
                        <li class="page__title">Books</li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <?php 
    $id = $_GET['id'];
    $sql = "SELECT * FROM books WHERE id=$id";
    $result = $conn->query($sql);
    $row=$result->fetch_assoc();
    $dis = (int)round(($row['ndprice']-$row['price'])/$row['ndprice']*100);
    $sql10 = "SELECT reviews.*, users.name,users.image FROM reviews INNER JOIN users ON users.id = reviews.user_id WHERE book_id = $id ORDER BY date DESC, reviews.rating DESC";
    $result10 = $conn->query($sql10);
    
    ?>
    <main id="main">
        <div class="container">
            <!-- Products Details -->
            <section class="section product-details__section">
                <div class="product-detail__container">
                    <div class="product-detail__left">
                        <div class="details__container--left">

                            <div class="product__picture" id="product__picture">
                                <!-- <div class="rect" id="rect"></div> -->
                                <div class="picture__container container">
                                    <img style="padding:10%" src="./book-images/<?php echo $row['image']; ?>" id="pic" />
                                    <?php if($row['ndprice']!=$row['price']){ ?>
                                    <p class="top-right" style=""><?php echo $dis; ?>%</p>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="zoom" id="zoom"></div>
                        </div>
                    </div>

                    <div class="product-detail__right">
                        <div class="product-detail__content">
                            <h3><?php echo $row['name']; ?></h3>
                            <div>
                                <i>by </i>
                                <h3 style="display: inline;margin-left: 5px;"><?php echo $row['author']; ?></h3>
                            </div>
                            <?php if($row['ndprice']==$row['price']){ ?>
                            <div class="price" style="margin-top: 10px;">
                                <span class="new__price"><?php echo $row['price']; ?> ₹</span>
                            </div>
                            <?php } else {
                                ?>
                                <div class="price" style="margin-top: 10px;">
                                <span class="new__price"><del><?php echo $row['ndprice']; ?> ₹</del>&nbsp;&nbsp;<?php echo $row['price']; ?> ₹</span>
                            </div>
                                <?php
                            } if($row['quantity']>0){ ?>
                            <h4 style="color:green;margin-top:15px;"><?php echo $row['quantity']; ?> left in stock</h4>
                            <?php } else { ?>
                                <h4 style="color:red;margin-top:15px;">Out of Stock</h4>
                                <?php } ?>
                            <div class="product__review">

                            </div>
                            <p>
                            <?php echo $row['description']; ?>
                               </p>
                               <div class="product__review">

                            </div>
                            <div class="product__info-container">
                                <ul class="product__info">

                                    <li>
                                        <?php if($flag==1) {
                                            if($row['quantity']>0){ 
                                                $userid = $_SESSION['id'];
                                                $sqla = "SELECT id FROM cart WHERE book_id = $id AND user_id = $userid";
                                                $resulta = $conn->query($sqla);
                                                if($resulta->num_rows==0){?>
                                        <div class="input-counter">
                                            <span>Quantity:&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                            <div>
                                                <a onclick="dec();"><span class="minus-btn" style="height:101%">
                          <svg>
                            <use xlink:href="./images/sprite.svg#icon-minus"></use>
                          </svg>
                        </span></a>
                                                <input type="text" min="1" value="1" max="10" class="counter-btn" style="" id="quantity" disabled>
                                                <a onclick="inc();"><span class="plus-btn" style="height:101%">
                          <svg>
                            <use xlink:href="./images/sprite.svg#icon-plus"></use>
                          </svg>
                                                </span></a>
                                            </div>
                                        </div>
                                    </li>
                                    
                                    <div class="product-details__btn">
                                        <a class="add" href="#" onclick="window.location.href='addCart.php?bid=<?php echo $id; ?>&quan='+quan.toString()">
                                            <span>
                            <svg>
                              <use xlink:href="./images/sprite.svg#icon-cart-plus"></use>
                            </svg>
                          </span> ADD TO CART</a>

                                    </div>
                                    <?php } else{ ?>

                                        <div class="product-details__btn">
                                        <a class="add">
                                            <span>
                                            </span> ADDED TO CART</a>
                                        </div>
                                    <?php 

                                    }
                                            }
                                    else{ ?>
                                        <h3 style="font-size:140%;color:red;text-align:center">The product is unfortunately out of stock now,<br> will be up for the sales soon.</h3>
                                    <?php } 
                                    $user_id = $_SESSION['id'];
                                    $sql5 = "SELECT rid FROM reviews WHERE book_id = $id AND user_id = $user_id";
                                    $result5 = $conn->query($sql5);
                                    if($result5->num_rows==0){
                                    ?>
                                    <button style="margin-top:20px;margin-bottom:20px" class="b view-btn">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop3" class="c" style="color:white" onMouseOver="this.style.color='#2b1f4d'" onMouseOut="this.style.color='white'">ADD REVIEW</a>
                                    </button>
                                     <?php  } } 
                                    elseif($row['quantity']>0){ ?> 
                                    <div class="product-details__btn">
                                        <a href="#" class="add" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                            <span>
                            <svg>
                              <use xlink:href="./images/sprite.svg#icon-cart-plus"></use>
                            </svg>
                          </span>LOG IN TO BUY.</a>
                          

                                    </div>
                                    <p>Do not have an account?<a href="#" style="color:blue" data-bs-toggle="modal" data-bs-target="#staticBackdrop1">SignUp</a></p>

                                    <?php } else{ ?>
                                        <h3 style="font-size:140%;color:red;text-align:center">The product is unfortunately out of stock now,<br> will be up for the sales soon.</h3>
                                    <?php }
                                     ?>
                                    
                                    <br>
                                    <li>
                                        <span>Product Type: Book</span>
                                    </li>
                                    <li>
                                        <span>Availability:</span>
                                        <?php if($row['quantity']==0){ ?>
                                            <a href="#" style="color:red" class="in-stock">Out of Stock</a>
                                        <?php } else{ ?>
                                        <a href="#" class="in-stock">In Stock</a>
                                        <?php } ?>
                                    </li>
                                    <li style="margin-top:25px">
                                        <a style="color:red;font-size:100%;border:1px solid grey;width:fit content;padding:10px;margin-top:30px"href="#reviews">Reviews: <?php echo $result10->num_rows; ?></a>
                                    </li>
                                    <li>
                                        <img style="margin-top:10px" src="images/features label 2.png" height=100 width=400>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
    var quan = 1;
    var m = <?php echo $row['quantity']; ?>;
    function inc() {
        if (quan < m) {
            quan += 1;
        }
        document.getElementById("quantity").value = quan.toString();
    }

    function dec() {
        if (quan > 1) {
            quan -= 1;
        }
        document.getElementById("quantity").value = quan.toString();
    }
</script>
            <section>
                    <div class="title__container">
                        <div class="section__titles">
                            <div class="section__title active">
                                <span class="dot"></span>
                                <h1 class="primary__title">Reviews</h1>
                            </div>
                        </div>
                    </div>
        </div> 
    </main>
    <section id="reviews" style="width:80%;margin:auto;">
        <div class="row">
            <?php 
                
                if($result10 && $result10->num_rows>0){
                    while($row=$result10->fetch_assoc()){
                        $date=$row['date'];
                    $date1=date_create($date);
            ?>
            <div class="col-sm col-md-3">
                <div class="card mt-4 mb-4" style="padding:10px">
                    <div class="card-body" >
                        <div style="display:inline">
                        <img src="user-images/<?php echo $row['image']; ?>" onerror="this.src='user-images/notfound.jpeg'" style="border-radius:100%;display:inline" height=30 width=30>
                        <h4 style="display:inline;margin-left:5px"><?php echo $row['name']; ?></h4>
                    </div>
                    <div class="rating" style="margin-bottom:10px">
                        <?php $star = 1;
                        while($star <= 5){ 
                            if($star<=$row['rating']){ ?>
                  <svg>
                    <use xlink:href="./images/sprite.svg#icon-star-full"></use>
                  </svg>
                  <?php } else{ ?> 
                  <svg>
                    <use xlink:href="./images/sprite.svg#icon-star-empty"></use>
                  </svg>
                  <?php }
                  $star++;
                  } ?>
                  <p style="display:inline;font-size:50%;margin-left:5px"><?php echo date_format($date1,"d/m/Y"); ?></p>
                </div>     
                <h4><?php echo $row['review']; ?></h4>
                </div>
                </div>
            </div>
            <?php
                    }
                }
                else{ ?>
                    <h4 style="text-align:center;border:2px solid grey;padding:10px;width:fit-content;margin-left:auto;margin-right:auto;min-width:50%;margin-bottom:30px">No Reviews yet. Be the first one to do!!</h4>
                <?php } 
            ?>
        </div>
    </div>
        </div>
        <br>
                </section>



    <?php include('footer.php') ?>

    <!-- Go To -->

    <a href="#header" class="goto-top scroll-link">
        <svg>
      <use xlink:href="./images/sprite.svg#icon-arrow-up"></use>
    </svg>
    </a>

    <!-- Glide Carousel Script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/glide.min.js"></script>

    <!-- Animate On Scroll -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- Custom JavaScript -->
    <script src="./js/products.js"></script>
    <script src="./js/index.js"></script>
    <script src="./js/slider.js"></script>
</body>

</html>



<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content login_modal">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="position:absolute;top:0;right:0;padding:15px"></button>
                         <div class="login_container">
                            <div class="login_img">
                                <img src="http://www.stuplate.com/assets/img/signup5.jpg" alt="">
                            </div>
                            <div class="login_box">
                                <div class="login_header">
                                    <h2>Hello !!</h2>
                                </div>
                                <div class="login_content">
                                    <form action="login-check.php" method="POST" class="form">
                                        <div class="email_inp">
                                            <label for="email">Email:</label>
                                            <input type="email" name="email" placeholder="Email" id="" required>
                                        </div>
                                        <div class="password_inp">
                                            <label for="password">Password:</label>
                                            <input type="password" name="pswd" placeholder="Password" id="" required>
                                        </div>
                                        <div class="forgot_password">
                                            <p>Forgot Password <span><a href="forgot-password.php">Click here!</a></span></p>
                                        </div>
                                        <div class="login_btn" >
                                            <button type="submit">Login</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


<div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel" style="font-size: large;">SignUp</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="add-user.php" method="POST" enctype="multipart/form-data">
                <div class="modal-body" style="text-align: center;">
                    <input class="input-field" type="text" name="name" placeholder="Name*" required>
                    <br>
                    <br>
                    <input class="input-field" type="email" name="email" placeholder="Email*" required>
                    <br>
                    <br>
                    <input class="input-field" type="text" name="phone" placeholder="Phone*" required>
                    <br>
                    <br>
                    <input class="input-field" type="text" name="address" placeholder="Address*" required>
                    <br>
                    <br>
                    <input class="input-field" type="password" name="pswd" placeholder="Password*" required>
                    <br>
                    <br>
                    <label for="image">Image: </label>
                    <input class="input-field" type="file" name="image" placeholder="Image*" required>
                    <input type="hidden" name="id" value=<?php echo $id; ?>>
                    <br>
                    <br>
                </div>
                <div class="modal-footer">
                    <button class="b view-btn" type="submit">
                        <a class="c">SUBMIT</a>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop3" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Review</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" action="add-review.php">
      <div class="modal-body" style="text-align:center">
          <input type="number" name="rating" class="input-field" placeholder="Rate out of 5" min=1 max=5 required>
          <br>
        <textarea style="margin-top:20px" name="review" placeholder="Review" rows="5" cols="40" required></textarea>
        <input type="hidden" value="<?php echo $id; ?>" name="id" id="oid">
      </div>
      <div class="modal-footer">
        <button class="b view-btn" type="submit">
            <a class="c">ADD</a>
        </button>
      </div>
      </form>
    </div>
  </div>
</div>

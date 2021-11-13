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
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    

    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@400;700&display=swap" rel="stylesheet" />

    <link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer"
    />


    <!-- Carousel -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/css/glide.core.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/css/glide.theme.min.css
">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <!-- Custom StyleSheet -->
    <link rel="stylesheet" href="styles.css" />
    <link rel="stylesheet" href="card.css" />
    <link rel="stylesheet" href="Login.css" />

    <title>Monk mart</title>
    <style>
        .roww{
            display: grid;
    grid-template-columns: 1fr 1fr 1fr ;
    gap: 3rem 2rem;
        }

@media only screen and (max-width: 999px) {
    .roww {
        grid-template-columns: 1fr 1fr 1fr;
    }
}

@media only screen and (max-width: 568px) {
    .roww {
        justify-content:center;
        grid-template-columns: 1fr;
        gap: 1rem;
    }
    .category__products .product__header {
        height: 10rem;
    }
    .category__products .product__header img {
        object-fit: contain;
    }
}
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
    </style>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>

    <!-- Header -->
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
                                <a href="#header" class="nav__link scroll-link">Home</a>
                            </li>
                            <li class="nav__item">
                                <a href="user-books.php" class="nav__link">Books</a>
                            </li>
                            <li class="nav__item">
                                <a href="#news" class="nav__link scroll-link">News</a>
                            </li>
                            <?php if($flag==0){ ?>
                            <li class="nav__item">
                                <a href="#" class="nav__link scroll-link" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                    LOGIN
                                </a>
                            </li>
                            <li class="nav__item">
                                <a href="#" type="button" class="nav__link scroll-link" data-bs-toggle="modal" data-bs-target="#staticBackdrop1">
                                    SIGNUP
                                </a>
                            </li>
                            <?php 
                            }
                            else{ ?>
                            <li class="nav__item">
                                <a href="orders.php" class="nav__link ">Orders</a>
                            </li>

                            <li class="nav__item">
                                <a  href="user-return.php" class="nav__link ">Return</a>
                            </li>
                            
                            <li class="nav__item">
                                <a href="config/logout.php" class="nav__link ">Logout</a>
                            </li>
                            <?php }
                            ?>
                        </ul>
                    </div>
                    <?php if($flag==1){ ?>
                    <div class="nav__icons">
                        <a href="user.php" class="icon__item">
                            <svg class="icon__user">
                                <use xlink:href="./images/sprite.svg#icon-user"></use>
                            </svg>
                        </a>

                        <a href="#" class="icon__item" data-bs-toggle="modal" data-bs-target="#staticBackdrop5">
                            <svg class="icon__search">
                                <use xlink:href="./images/sprite.svg#icon-search"></use>
                            </svg>
                        </a>

                        <a href="cart.php" class="icon__item">
                            <svg class="icon__cart">
                                <use xlink:href="./images/sprite.svg#icon-shopping-basket"></use>
                            </svg>
                            <?php
                            $count=$_SESSION['cart_total'];
                            ?>
                            <span id="cart__total"><?php echo $count; ?> </span>
                        </a>
                    </div>
                    <?php 
                    } else {
                        ?>
                        <div class="nav__icons">

                        <a href="#" class="icon__item" data-bs-toggle="modal" data-bs-target="#staticBackdrop5">
                            <svg class="icon__search">
                                <use xlink:href="./images/sprite.svg#icon-search"></use>
                            </svg>
                        </a>
                    </div>
                        <?php 
                    }
                    ?>
                </nav>
            </div>
        </div>
            
    </header>
        
    <!-- End Header -->

    <!-- Carousel --> 
    <?php include('slider.php'); ?>

    <?php $sqla = "SELECT * FROM popup WHERE id=2";
        $resulta = $conn->query($sqla);
        $rowa = $resulta->fetch_assoc();
        $sqlb = "SELECT * FROM popup WHERE id=3";
        $resultb = $conn->query($sqlb);
        $rowb = $resultb->fetch_assoc();
        ?>
        <section id="collection" class="section collection" style="margin-bottom:2%">
                <div class="collection__container">
                    <div class="collection__box  container11" style="border:none">
                        <div class="img__container">
                            <img class="collection_02" src="./images/<?php echo $rowa['image']; ?>" alt="">
                        </div>
                        <div class="collection__content">
                            
                            <div class="collection__data">
                                <h4 style="text-align:center;font-size:120%"><?php echo $rowa['content']; ?></h4>
                        
                                <a style="display:block;margin-left:auto;margin-right:auto;width:fit-content;min-width:50%;text-align:center" target="_blank" href="<?php echo $rowa['link']; ?>">VIEW</a>
                            </div>
                        </div>
                    </div>
                    <div class="collection__box  container11" style="border:none">
                        <div class="img__container">
                            <img class="collection_02" src="./images/<?php echo $rowb['image']; ?>" alt="">
                        </div>
                        <div class="collection__content">
                            
                            <div class="collection__data">
                                <h4 style="text-align:center;font-size:120%"><?php echo $rowb['content']; ?></h4>
                        
                                <a style="display:block;margin-left:auto;margin-right:auto;width:fit-content;min-width:50%;text-align:center" target="_blank" href="<?php echo $rowb['link']; ?>">VIEW</a>
                            </div>
                        </div>
                    </div>
            </section>

    <!-- Main -->
    <main id="main">

    <section id="buy">
        <div class="container">
            <!-- Collection -->
            <div class="title__container" style="background-color:white">
                        <div>
                            <img src="images/dtd.jpeg" height=90 width=700>
                        </div>
                    </div>
            <br>
            <div class="category__container aos-init aos animate" data-aos="fade-up" data-aos-duration="1200" style="height:max-content">
                <div class="roww">
                <?php 
                $sql = "SELECT highlights.book_id, books.* FROM highlights INNER JOIN books WHERE books.id = highlights.book_id ";
                $result = $conn->query($sql);
                if($result->num_rows>0){
                    while($row = $result->fetch_assoc()){
                ?>
                <div class="card product category__products" >
                <?php if($row['ndprice'] != $row['price']){ 
                        $dis = (int)round(($row['ndprice']-$row['price'])/$row['ndprice']*100); ?>
                    <div class="discount">
                        <p><?php echo $dis; ?>%</p>
                    </div>
                    <?php } ?>
                    <div class="card_cont">
                        <div class="book_img">
                            <img src="./book-images/<?php echo $row['image']; ?>" alt="">
                        </div>
                        <div class="book_info">
                            <div class="book_title">
                                <h2 style="margin-top:10px;"><?php echo $row['name']; ?></h2>
                                <p><?php echo $row['author']; ?></p>
                            </div>
                            <div class="desc">
                                <p><?php echo substr($row['description'],0,200); ?>...</p>
                            </div>
                            <div class="cost">
                            <?php if($row['ndprice'] != $row['price']){ ?>
                                <div class="old_cost">
                                    <p><?php echo $row['ndprice']; ?> ₹</p>
                                </div>
                                <?php } ?>
                                <div class="discount_price">
                                    <p><?php echo $row['price']; ?> ₹</p>
                                </div>
                            </div>
                            <?php if($row['quantity']==0){ ?>
                            <h4 style="color:red">Out of Stock</h4>
                        <?php } else { ?>
                            <h4 style="color:green"><?php echo $row['quantity']; ?> left in stock</h4>
                            <?php } ?>
                            <button class="view-btn">
                                <a href="product.php?id=<?php echo $row['id']; ?>">View</a>
                            </button>
                        </div>
                    </div>
                </div>
            <?php }
                } 
            ?>
            </div>
        </div>
            
        </section>
            <section class="facility__section section" id="facility" style="margin-top:20px">
                <div class="container">
                    <div class="facility__contianer" data-aos="fade-up" data-aos-duration="1200">
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
            <br>
            </div>

            <!-- Testimonial Section -->
            <section class="section testimonial" id="testimonial">
                <div class="testimonial__container">
                    <div class="glide" id="glide_4">
                        <div class="glide__track" data-glide-el="track">
                            <ul class="glide__slides">
                                <li class="glide__slide">
                                    <div class="testimonial__box">
                                        <div class="client__image">
                                            <img src="./images/profile1.jpg" alt="profile">
                                        </div>
                                        <p>I was so excited by seeing the products in monkmart. The word MONK denotes being simple likewise the process of ordering products in monkmart is very very simple . I suggest everyone to order your favourite products here .</p>
                                        <div class="client__info">
                                            <h3>Yugendar.N.M</h3>
                                            <span>Kumara Rani Meena Muthiah College</span>
                                        </div>
                                    </div>
                                </li>
                                <li class="glide__slide">
                                    <div class="testimonial__box">
                                        <div class="client__image">
                                            <img src="./images/profile2.jpg" alt="profile">
                                        </div>
                                        <p>Generally, I like personal development books so much and when I searched for such books at an affordable price I came to know this site and bought an amazing combo of 3 books from here at very low cost . Even many exciting offers are available here frequently .</p>
                                        <div class="client__info">
                                            <h3>Indra</h3>
                                            <span>Rajalakshmi Engineering College</span>
                                        </div>
                                    </div>
                                </li>
                                <li class="glide__slide">
                                    <div class="testimonial__box">
                                        <div class="client__image">
                                            <img src="./images/profile3.jpg" alt="profile">
                                        </div>
                                        <p>Very good quality and high standard books are available here and they provide the books with attractive packaging and with an attractive good looking free bookmark so that  we can have an easy track of our progress in reading!
</p>
                                        <div class="client__info">
                                            <h3>Kishore</h3>
                                            <span>SRM Institute of Technology</span>
                                        </div>
                                    </div>

                                </li>
                                <li class="glide__slide">
                                    <div class="testimonial__box">
                                        <div class="client__image">
                                            <img src="./images/profile4.jpg" alt="">
                                        </div>
                                        <p>Monkmart delivered my product at a very fast rate within very few days from the date I ordered it. So they are very good in delivery service. Super wide collection of books and bestsellers are available here and i find this site to be very helpful to buy my favorite books</p>
                                        <div class="client__info">
                                            <h3>Keerthi.U</h3>
                                            <span>Sairam Institute of Technology</span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <div class="glide__bullets" data-glide-el="controls[nav]">
                            <button class="glide__bullet" data-glide-dir="=0"></button>
                            <button class="glide__bullet" data-glide-dir="=1"></button>
                            <button class="glide__bullet" data-glide-dir="=2"></button>
                            <button class="glide__bullet" data-glide-dir="=3"></button>
                        </div>
                    </div>
                </div>
            </section>

            <!--New Section  -->
            <section class="section news" id="news">
                <div class="container">
                    <div class="title__container">
                        <div class="section__titles">
                            <div class="section__title active">
                                <span class="dot"></span>
                                <h1 class="primary__title">News</h1>
                            </div>
                        </div>
                    </div>
                    <div class="news__container">
                        <div class="glide" id="glide_5">
                            <div class="glide__track" data-glide-el="track">
                                <ul class="glide__slides">
                                    <?php
                                        $sql = "SELECT * FROM news";
                                        $result = $conn->query($sql);
                                        if($result->num_rows>0){
                                            while($row = $result->fetch_assoc()){
                                    ?>
                                    <li class="glide__slide">
                                        <div class="new__card">
                                            <div class="card__header">
                                                <img src="news-images/<?php echo $row['image']; ?>" alt="">
                                            </div>
                                            <div class="card__footer">
                                                <h3><?php echo $row['heading']; ?></h3>
                                                <span>By Admin</span>
                                                <br>
                                                <p style="margin-top:8%;"><?php echo $row['content']; ?></p>
                                            </div>
                                        </div>
                                    </li>
                                    <?php 
                                            }
                                        }
                                        ?>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </section>

            <!-- NewsLetter -->
            <section class="section newsletter" id="contact">
                <div class="container">
                    <div class="newsletter__content">
                        <div class="newsletter__data">
                            <h3>SUBSCRIBE TO OUR NEWSLETTER</h3>
                            <p>Subscribe to our newsletter to be notified about Monkmart’s upcoming offers ,<br> new launches and giveaways !
                            </p>
                        </div>
                        <?if(isset($_GET['subs'])){ ?>
                            <p>Subscribed</p>
                        <?php } else { ?>
                        <form method="POST">
                            <input type="email" name="email" placeholder="Enter your email address" class="newsletter__email" required>
                            <button class="newsletter__link" name="subscribe" style="background-color:black;font-size:100%;padding:12px;color:white">subscribe</button>
                        </form>
                        <?php } ?>
                    </div>
                </div>
            </section>

    </main>
    <?php
        if(isset($_POST['subscribe'])){
            $email = $_POST['email'];
            $sql = "INSERT INTO subscription (email) VALUES ('$email');";
            $result = $conn->query($sql);
            ?>
            <script>window.location.href="index.php?subs=1#contact"</script>
            <?php 
        } 
    ?>

    <!-- End Main -->

    <?php include('footer.php') ?>

    <!--PopUp-->
    <?php if(!isset($_SESSION['popup'])){ 
        $_SESSION['popup'] = 1;
        $sql = "SELECT * FROM popup";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        ?>
    <div class="popup hide__popup">
        <div class="popup__content">
            <div class="popup__close">
                <svg>
          <use xlink:href="./images/sprite.svg#icon-cross"></use>
        </svg>
            </div>
            <div class="popup__left">
                <div class="popup-img__container">
                    <img class="popup__img" src="./images/<?php echo $row['image']; ?>" alt="popup">
                </div>
            </div>
            <div class="popup__right">
                <div class="right__content">
                <img src="images\transparent.png" width="100" height="100" style="margin:auto">
                <br>
                    <h1 style="font-size:220%">Welcome to <span>Monk mart<span> </h1>
                    <p><?php echo $row['content']; ?>
                    </p>
                    <a href="<?php echo $row['link']; ?>" target="_blank">View</a>
                  
                </div>
            </div>
        </div>
    </div> 
    <?php } ?>

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

<!-- Modal -->
<!-- MODAL -->
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
<div class="modal fade" id="staticBackdrop5" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel" style="font-size: large;">Search Books</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <br>
            <form action="user-books.php" method="POST">
                <div class="modal-body" style="text-align: center;">
                    <input class="input-field" style="width:90%" type="search" name="search" placeholder="Enter the book name here" required>
                </div>
                <br>
                <div class="modal-footer">
                    <button class="b view-btn" type="submit">
                        <a class="c">SEARCH</a>
                    </button>
                </div>
            </form>
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
                    <input class="input-field" type="password" name="pswd" placeholder="Password*" required>
                    <br>
                    <br>
                    <label for="image">Image: </label>
                    <input class="input-field" type="file" name="image" placeholder="Image*">
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




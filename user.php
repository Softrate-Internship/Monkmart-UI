<!DOCTYPE html>
<html lang="en">
<?php  
    include('config/constants.php');
    include('config/login-check.php');
    ?>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

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
                        <ul class="nav__list" >
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
                        <li class="page__title">Account</li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <?php 
    $id = $_SESSION['id'];
    $sql = "SELECT * FROM users WHERE id=$id";
    $result = $conn->query($sql);
    $row=$result->fetch_assoc();
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
                                <div class="picture__container">
                                    <img style="padding:10%" src="./user-images/<?php echo $row['image']; ?>" id="pic" onerror="this.src='user-images/notfound.jpeg'" />
                                </div>
                            </div>
                            <div class="zoom" id="zoom"></div>
                        </div>
                    </div>

                    <div class="product-detail__right">
                        <div class="product-detail__content">
                            <br>
                            <br>
                            <br>
                            <p>Name: <?php echo $row['name']; ?></p>
                            <br>
                            <p>Email: <?php echo $row['email']; ?></p>
                            <br>
                            <p>Phone Number: <?php echo $row['phone']; ?></p>
                            <br>
                            
                            <a href="edit-user.php"><button class="btn btn-outline-success btn-lg" style="width:40%">Edit</button></a>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>



    <?php include('footer.php') ?>

    <!-- End Footer -->

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

<script>
    var quan = 1;

    function inc() {
        if (quan < 10) {
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
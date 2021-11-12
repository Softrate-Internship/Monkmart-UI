<!DOCTYPE html>
<html lang="en">
<?php  
    include('config/constants.php');
    ?>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!--Bootstrap-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
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
                </nav>
            </div>
        </div>
    </header>
    <br>
    <?php if(isset($_POST['submit'])){
            $email = $_POST['email'];
            $sql = "INSERT INTO forgotPassword (email) VALUES ('$email')";
            $conn->query($sql);
            ?>
            <h4 style="text-align:center;margin-top:10%;margin-bottom:9%">Admin has been Notified. <br><br> Your Password will be sent to your mail within 24 hours!!</h4>
            <?php 
    } else {?>
    <br>
    <div class="modal-content" style="padding:10px;min-width:40%;width:max-content;margin-left:auto;margin-top:5%;margin-bottom:5%;margin-right:auto;display:block;text-align:center">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel" style="font-size:90%">Forgot Password</h5>
      </div>
      <form method="POST">
      <div class="modal-body">
        <input type="email" name="email" class="input-field" style="margin-bottom:20px;" placeholder="Email" required >
        <br>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" type="submit" name='submit' style="font-size:90%">Send</button>
      </div>
    </div>
<?php } ?>

</body>

<br>
<br>
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
<br>

    <?php include('footer.php') ?>

    
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

    <title>Monk mart</title>
    <style>
            h1 {
                font-weight:600 !important; 
            }
            button{
                font-size: 1.5rem;
                padding: 1.2rem 3rem;
                color: var(--black);
                text-transform: uppercase;
                border: 1px solid var(--black);
                transition: all 0.4s ease-in-out;
            }
            button:hover{
                background-color: var(--black);
                color: var(--white);
                border: 1px solid var(--black);
            }
            body{
                background-color:black;
        /* 003366 */
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
    </header>
        <div class="cart__totals" style="width:max-content;min-width:50%;border-radius:8px">
            <h3 style="text-align:center;">Enter Shipping Details</h3>
            <br>
            <form method="POST" action = "get-shipping.php">
            <ul style="text-align:center">
                <li>
                    <input type="text" class="input-field" name="name" placeholder="Name" required>
                </li>
                <li>
                    <input type="text" class="input-field" name="door" placeholder="Door Number" required>
                </li>
                <li>
                    <input type="text" class="input-field" name="street" placeholder="Street Name" required>
                </li>
                <li>
                    <input type="text" class="input-field" name="area" placeholder="Area/City" required>
                </li>
                <li>
                    <input type="text" class="input-field" name="pincode" placeholder="Pincode" required>
                </li>
                <li>
                    <input type="text" class="input-field" name="phone" placeholder="Phone Number" required>
                </li>
            </ul>
            <button type="submit" href="" style="margin-left:auto;width:fit-content;margin-right:auto;display:block" name="submit">PROCEED TO CHECKOUT</button>
            </form>
        </div>
        <br>
        <br>
        <!-- Glide Carousel Script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/glide.min.js"></script>
    <!-- Animate On Scroll -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- Custom JavaScript -->
    <script src="./js/products.js"></script>
    <script src="./js/index.js"></script>
    <script src="./js/slider.js"></script>
</body>

<?php include('footer.php'); ?>
<?php 
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

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@400;700&display=swap" rel="stylesheet" />

    <link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon" />


    <!-- Carousel -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/css/glide.core.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/css/glide.theme.min.css
">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer"
    />

    <!-- Custom StyleSheet -->
    <link rel="stylesheet" href="styles.css" />

    <title>Monk mart</title>
    <style> 
    .copyrights {
    text-align: center !important;
    margin-top: 20px !important;
    width: 100% !important;
    margin-left:auto !important;
    display:block !important;
}

.copyrights p {
    color: grey !important;
    margin-top:10px;
}
.footer {
    background-color: var(--black3);
    padding: 1rem 1rem !important;
    line-height: 3rem;
}
.abc {
    color:grey;
    font-size:150%;
    float:left;
    margin-left:20px;
}
.abc:hover{
    color:var(--orange);
}
.left1{
    margin-left:10%;
}
.left2{
    margin-left:10%;
}
@media only screen and (max-width: 768px) {
    .left1 {
        margin-left:0%;
    }
    
}
@media only screen and (max-width: 998px) {
    .left2 {
        margin-left:0%;
    }
    
}

    </style>
</head>

<!-- Footer -->
<footer id="footer" class="section footer">
        <div class="container">
            <div class="footer__top" >
                <div class="footer-top__box">
                    <img src="images\transparent.png" width="100" height="100">
                    <br>
                    <a href="" disabled>Monkmart is a marketplace to purchase a wide collection of good quality products online with the best features from any part of the country.
</a>
                </div>
                <div class="footer-top__box left1" >
                    <h3 style="margin-top:20px">INFORMATION</h3>
                    <a href="index.php" style="margin-top:20px">About Us</a>
                    <a href="terms-and-conditions.php">Terms & Conditions</a>
                    <a href="privacy-policy.php">Privacy Policy</a>
                    <a href="shipping-policy.php">Shipping Policy</a>
                    <a href="return-policy.php">Return Policy</a>
                </div>
                <div class="footer-top__box left2" >
                    <h3 style="margin-top:20px">MY ACCOUNT</h3>
                    <a style="margin-top:20px" href="index.php" >Home</a>
                    <a href="user.php">My Profile</a>
                    <a href="cart.php">My Cart</a>
                    <a href="history.php">Orders</a>
                    <a href="index.php#news">News</a>
                </div>
                <div class="footer-top__box" >
                    <h3 style="margin-top:20px">CONTACT US</h3>
                    <div style="margin-top:20px">
                        <span>
              <svg>
                <use xlink:href="./images/sprite.svg#icon-location"></use>
              </svg>
            </span> 6, 23, W Mada St, Kaladipet, Tiruvottiyur, Chennai, Tamil Nadu 600019


                    </div>
                    <div>
                        <span>
              <svg>
                <use xlink:href="./images/sprite.svg#icon-envelop"></use>
              </svg>
            </span> sales@monkmart.in
                    </div>
                    <div>
                        <span>
              <svg>
                <use xlink:href="./images/sprite.svg#icon-phone"></use>
              </svg>
            </span> (+91) 70104 60878
                    </div>
                    <div>
                        <span>
              <svg>
                <use xlink:href="./images/sprite.svg#icon-paperplane"></use>
              </svg>
            </span> Chennai, India 
                    </div>
                </div>
                
            </div>
            <div class="copyrights">
                <div style="display:inline;display:block;margin-left:auto;margin-right:auto;width:fit-content">
                    <a class="abc" style="margin-left:0px" href="https://instagram.com/monkmartglobal" onMouseOver="this.style.color='rgba(201,0,129,255)'" onMouseOut="this.style.color='grey'" target="_blank"><i class="fab fa-instagram fa-1x"></i></a>
                    <a class="abc" href="https://www.facebook.com/monkmartglobal/" onMouseOver="this.style.color='rgba(25,119,243,255)'" onMouseOut="this.style.color='grey'" target="_blank"><i class="fab fa-facebook"></i></a>
                    <a class="abc" href="https://twitter.com/monkmartglobal" onMouseOver="this.style.color='rgba(32,161,242,255)'" onMouseOut="this.style.color='grey'" target="_blank"><i class="fab fa-twitter"></i></a>
                    <a class="abc" href="https://www.linkedin.com/company/monk-mart" onMouseOver="this.style.color='rgba(14,122,182,255)'" onMouseOut="this.style.color='grey'" target="_blank"><i class="fab fa-linkedin"></i></a>
                    <a class="abc" href="https://youtube.com/channel/UCX4J5g4hCSbZe2Z0LsLyq-Q" onMouseOver="this.style.color='rgba(255,3,1,255)'" onMouseOut="this.style.color='grey'" target="_blank"><i class="fab fa-youtube"></i></a>
                </div>
                <br>
                <p>© 2021 MonkMart. All Rights Reserved.   </p>
            </div>
        </div>
        
    </footer>
    <!-- End Footer -->
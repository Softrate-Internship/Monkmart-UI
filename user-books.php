<!DOCTYPE html>
<html lang="en">
<?php  
    include('config/constants.php');
    $flag = 0;
    $sql11 = "SELECT * FROM books";
    if(isset($_POST['search'])){
        $search = $_POST['search'];
        $sql11 = "SELECT * FROM books WHERE name LIKE '%$search%'";
    }
if(isset($_SESSION['id'])){
    $flag = 1;
}
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

    <link rel="stylesheet" href="card.css" />

    <title>Monk mart</title>
    <style>
        .roww{
            display: grid;
    grid-template-columns: 1fr 1fr 1fr 1fr;
    gap: 3rem 2rem;
        }

@media only screen and (max-width: 999px) {
    .roww {
        grid-template-columns: 1fr 1fr 1fr;
    }
}

@media only screen and (max-width: 568px) {
    .roww {
        grid-template-columns: 1fr ;
        gap: 1.5rem 1rem;
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
                            
                        
                        <?php if(isset($_POST['search'])){ ?>
                            <li class="nav__item">
                                <a href="user-books.php" class="nav__link">BOOKS</a>
                            </li>
                            
                        <?php } ?>
                        </ul>

                    </div>
                    <?php if($flag==1){ ?>
                    <div class="nav__icons">

                        <a href="#" class="icon__item" data-bs-toggle="modal" data-bs-target="#staticBackdrop5">
                            <svg class="icon__search">
                <use xlink:href="./images/sprite.svg#icon-search"></use>
              </svg>
                        </a>

                        <a href="cart.php" class="icon__item">
                            <svg class="icon__cart">
                                <use xlink:href="./images/sprite.svg#icon-shopping-basket"></use>
                            </svg>
                            <span id="cart__total"><?php echo $_SESSION['cart_total']; ?> </span>
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
</body> <br>
<br>
<?php if(isset($_POST['search'])){ ?>
<div >
    <p style="margin-left:5%;text-align:center;margin-right:10%;" >Search Results for: <b><?php echo $search; ?></b> </p>
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
<br>


    <div class="category__container aos-init aos animate" data-aos="fade-up" data-aos-duration="1200" style="height:max-content">
                <div class="roww">
                <?php 
                $sql = "SELECT * FROM books ";
                $result = $conn->query($sql);
                if($result->num_rows>0){
                    while($row = $result->fetch_assoc()){
                ?>
                <div class="card product category__products">
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
    <?php if($result->num_rows==0) { ?>
        <p style="border:1px solid grey; padding:10px;display: block;margin-left: auto;margin-right: auto;width: fit-content; min-width:50%;text-align:center">No Books Found.</p>
    <?php 
        } ?>
    <br><br><br><br>

    <?php include('footer.php') ?>

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
                    <button type="submit" class="btn btn-primary btn-lg">Search</button>
                </div>
            </form>
        </div>
    </div>
</div>
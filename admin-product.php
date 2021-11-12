<!DOCTYPE html>
<html lang="en">
<?php  
    include('config/constants.php');
   include('config/login-check.php');
   if(isset($_GET['del_id'])){
    $del_id = $_GET['del_id'];
    $sql = "DELETE FROM reviews WHERE rid=$del_id";
    $conn->query($sql);
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
                                    <a href="books.php" onclick="f1()" class="nav__link scroll-link" style="color: black; font-size: 90%;">BOOKS</a>
                                </li>
                            </ul>
                        </div>
                        <a href="#" class="icon__item" style="color:black">
                        <i class="fas fa-user"></i> 
                            ADMIN
                        </a>
                    </nav>
                </div>
            </div>
        </header>
        <script>
                    function f1(){
                        window.location.href='books.php';
                    }
        </script>
        <!-- End Header -->
    <?php 
    $id = $_GET['id'];
    $sql = "SELECT * FROM books WHERE id=$id";
    $result = $conn->query($sql);
    $row=$result->fetch_assoc();
    $dis = (int)round(($row['ndprice']-$row['price'])/$row['ndprice']*100);
    
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
                            } ?>
                            <?php if($row['quantity']==0){ ?>
                                <h4 style="color:red">Out of Stock</h4>
                        <?php } else { ?>
                            <h4 style="color:green"><?php echo $row['quantity']; ?> left in stock</h4>
                            <?php } ?>
                            <div class="product__review">

                            </div>
                            <h4>
                            <?php echo $row['description']; ?>
                        </h4>
                               <div class="product__review">

                            </div>
                            <?php
                            $sql10 = "SELECT * FROM highlights WHERE book_id = $id";
                            $result10 = $conn->query($sql10);
                            if($result10->num_rows==0){
                            ?>
                            <a href="addHighlights.php?id=<?php echo $row['id']; ?>" class="btn btn-outline-secondary" style="width:90%;margin-left:5%;font-size:100%;margin-top:20px"><i class="fas fa-plus-circle"></i> ADD TO HIGHLIGHTS</a>
                            <?php } else{ ?>
                                <button class="btn btn-outline-secondary" style="width:90%;margin-left:5%;font-size:100%;margin-top:20px" disabled> ADDED TO HIGHLIGHTS</button>
                                <?php 
                            } ?>
                            <a href="#reviews" class="btn btn-outline-primary" style="width:90%;margin-left:5%;font-size:100%;margin-top:20px">REVIEWS</a>
                            <a href="edit-books.php?id=<?php echo $row['id']; ?>" class="btn btn-outline-success" style="width:90%;margin-left:5%;font-size:100%;margin-top:20px"><i class="fas fa-edit"></i> Edit</a>
                            <button data-bs-target="#exampleModal2" data-bs-toggle="modal" style="width:90%;margin-left:5%;margin-top:20px;font-size:100%" class="btn btn-outline-danger" onclick="myFunction(<?php echo $row['id']; ?>,'<?php echo $row['image']; ?>')"><i class="fas fa-trash"></i> Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        
        <section id="reviews" style="width:80%;margin:auto;">
            <div class="title__container">
                        <div class="section__titles">
                            <div class="section__title active">
                                <span class="dot"></span>
                                <h1 class="primary__title">Reviews</h1>
                            </div>
                        </div>
                    </div>
            <div class="mt-4 p-4">
        <div class="row">
            <?php 
                $sql = "SELECT reviews.*, users.name,users.image FROM reviews INNER JOIN users ON users.id = reviews.user_id WHERE book_id = $id ORDER BY date DESC, reviews.rating DESC";
                $result = $conn->query($sql);
                if($result && $result->num_rows>0){
                    while($row=$result->fetch_assoc()){
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
                <button data-bs-target="#exampleModal3" data-bs-toggle="modal" type="button" class="btn btn-outline-danger" style="width:100%" onclick="myFunction1(<?php echo $row['rid']; ?>)">Delete</button>
                    </div>
                </div>
            </div>
            <?php
                    }
                }
                else{ ?>
                    <h4 style="text-align:center;border:2px solid grey;padding:10px;width:fit-content;margin-left:auto;margin-right:auto;min-width:50%;margin-bottom:30px">No Reviews yet.</h4>
                <?php } 
            ?>
        </div>
    </div>
        </div>
                </section>
    </main>
    <script>
        let k = 0;
        let l = 0;
        let t = 0;
function myFunction(x,y) {
    k = x;
    l = y;
}
function myFunction1(z) {
    t = z;
}
</script>



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

<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">

                    <h5 class="modal-title fw-bold heading" id="exampleModalLabel2" style="font-size:120%;">Confirmation</h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" >
                    <h5 style="font-size:100%; margin-top:5%;margin-bottom:5%">Do you really want to delete?</h5>
                </div>
                <div class="modal-footer">
                    <button style="font-size:100%;" type="button" class="btn btn-primary" data-bs-dismiss="modal">No</button>
                    <button style="font-size:100%;" type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="window.location.href='books.php?del_id='+ k +'&img_name='+ l">Yes</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">

                    <h5 class="modal-title fw-bold heading" id="exampleModalLabel2" style="font-size:120%;">Confirmation</h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" >
                    <h5 style="font-size:100%; margin-top:5%;margin-bottom:5%">Do you really want to delete?</h5>
                </div>
                <div class="modal-footer">
                    <button style="font-size:100%;" type="button" class="btn btn-primary" data-bs-dismiss="modal">No</button>
                    <button style="font-size:100%;" type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="window.location.href='admin-product.php?id=<?php echo $id; ?>&del_id='+ t ">Yes</button>
                </div>
            </div>
        </div>
    </div>




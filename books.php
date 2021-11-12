<?php 
include('config/constants.php'); 
include('config/login-check.php');
if(isset($_GET['del_id'])){
    $del_id = $_GET['del_id'];
    $sql = "DELETE FROM books WHERE id=$del_id";
    $conn->query($sql);
    $img_name=$_GET['img_name'];
    $path="book-images/".$img_name;
    $remove=unlink($path);
}
    $sql11 = "SELECT * FROM books";
    if(isset($_POST['search'])){
        $search = $_POST['search'];
        $sql11 = "SELECT * FROM books WHERE name LIKE '%$search%'";
    }
?>
<!DOCTYPE html>
<html lang="en">
<script>
    let id = 0;
    </script>
<?php
    $name = $_SESSION['name'];
    $id = $_SESSION['id'];
?>

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer"
    />

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

        <!-- Custom StyleSheet -->
        <link rel="stylesheet" href="styles.css" />

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
        grid-template-columns: 1fr 1fr;
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
                                    <a href="admin-home.php" class="nav__link" >HOME</a>
                                </li>

                                <?php if(isset($_POST['search'])){ ?>
                                <li class="nav__item">
                                    <a href="books.php" class="nav__link"  >
                                        BOOKS
                                    </a>
                                </li>
                                <li class="nav__item">
                                    <a href="" class="nav__link scroll-link" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                        ADD 
                                    </a>
                                </li>
                                <?php } else { ?>
                                <li class="nav__item">
                                <a href="" class="nav__link scroll-link" data-bs-toggle="modal" data-bs-target="#staticBackdrop" >
                                    ADD 
                                </a>
                                </li>
                                <li class="nav__item">
                                    <a href="reStock.php" class="nav__link">
                                        RE-STOCK
                                    </a>
                                </li>
                                <?php } ?>
                                <li class="nav__item">
                                    <a href="config/logout.php" class="nav__link" >LOGOUT</a>
                                </li>
                            </ul>
                        </div>
                        <div class="nav__icons">

                        <a href="#" class="icon__item" data-bs-toggle="modal" data-bs-target="#staticBackdrop5">
                            <svg class="icon__search">
                <use xlink:href="./images/sprite.svg#icon-search"></use>
              </svg>
                    </a>
                    </div>
                        <a class="icon__item" style="color:black">
                        <i class="fas fa-user"></i> 
                            ADMIN
                        </a>
                    </nav>
                </div>
            </div>
        </header>
        <!-- End Header -->

        <!-- Glide Carousel Script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/glide.min.js"></script>
    <!-- Animate On Scroll -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- Custom JavaScript -->
    <script src="./js/products.js"></script>
    <script src="./js/index.js"></script>
    <script src="./js/slider.js"></script>
    </body>
    <br>
    <?php if(isset($_POST['search'])){ ?>
<div >
    <p style="margin-left:5%;text-align:center;margin-right:10%" >Search Results for: <b><?php echo $search; ?></b> </p>
</div>
<?php } ?>

    <div class="category__container aos-init aos animate" data-aos="fade-up" data-aos-duration="1200">
                <div class="roww">
                <?php
                $result11 = $conn->query($sql11);
                if($result11->num_rows>0){
                    while($row = $result11->fetch_assoc()){
                ?>
                <div class="product category__products container">
                    
                    <div class="product__header">
                        <img src="./book-images/<?php echo $row['image']; ?>">
                    </div>
                    <?php if($row['ndprice'] != $row['price']){ 
                        $dis = (int)round(($row['ndprice']-$row['price'])/$row['ndprice']*100); ?>
                    <p class="top-right" style=""><?php echo $dis; ?>%</p>
                    <?php } ?>
                    <div class="product__footer">
                        <h3><?php echo $row['name']; ?></h3>
                        <h3><?php echo $row['author']; ?></h3>
                        <?php if($row['ndprice'] != $row['price']){ ?>
                        <div class="product__price">
                            <h4><del><?php echo $row['ndprice']; ?> ₹</del>&nbsp;&nbsp;<?php echo $row['price']; ?> ₹</h4>
                        </div>
                        <?php }
                        else{  ?>
                        <div class="product__price">
                            <h4><?php echo $row['price']; ?> ₹</h4>
                        </div>
                        <?php } ?>
                        <?php if($row['quantity']==0){ ?>
                            <h4 style="color:red">Out of Stock</h4>
                        <?php } else { ?>
                            <h4 style="color:green"><?php echo $row['quantity']; ?> left in stock</h4>
                            <?php } ?>
                        <a href="admin-product.php?id=<?php echo $row['id']; ?>">
                            <button type="button" style="width:100%;margin-top:10px" class="btn btn-outline-secondary btn-lg">View</button>
                        </a>
                    </div>
                </div>
                   
                <?php 
                    }
                } 
                ?>
            </div>
            <br>
    </div>
    <?php if($result11->num_rows==0) { ?>
        <p style="border:1px solid grey; padding:10px;display: block;margin-left: auto;margin-right: auto;width: fit-content; min-width:50%;text-align:center">No Books Found.</p>
    <?php 
        } ?>

    


<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel" style="font-size: large;">Add Book</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <br>
            <form action="add-books.php" method="post" enctype="multipart/form-data">
                <div class="modal-body" style="text-align: center;">
                    <input class="input-field" type="text" name="name" placeholder="Book Name" required>
                    <br>
                    <br>
                    <input class="input-field" type="text" name="author" placeholder="Author" required>
                    <br>
                    <br>
                    <textarea id="w3review" name="description" placeholder="Description" rows="5" cols="40"></textarea>
                    <br>
                    <br>
                    <input class="input-field" type="number" name="quantity" placeholder="Quantity" required>
                    <br>
                    <br>
                    <input class="input-field" type="number" name="ndprice" placeholder="Price" required>
                    <br>
                    <br>
                    <input class="input-field" type="number" name="price" placeholder="Discounted Price" required>
                    <br>
                    <br>
                    <input class="input-field" type="file" name="image" placeholder="" required>
                    <p >Size: 500x750</p>
                    <br>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-lg">ADD</button>
                </div>
            </form>
        </div>
    </div>
</div>

</head>

<div class="modal fade" id="staticBackdrop5" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel" style="font-size: large;">Search Books</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <br>
            <form action="books.php" method="POST">
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
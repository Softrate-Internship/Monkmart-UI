<?php 
include('config/constants.php'); 
include('config/login-check.php');
?>
<!DOCTYPE html>
<html lang="en">

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
                            <div class="menu__top">
                                <span class="nav__category">PHONE</span>
                                <a href="#" class="close__toggle">
                                    <svg>
                  <use xlink:href="./images/sprite.svg#icon-cross"></use>
                </svg>
                                </a>
                            </div>
                            <ul class="nav__list">
                                <li class="nav__item">
                                    <a onclick="f1()" href="books.php" class="nav__link scroll-link" style="color: black; font-size: 90%;">BOOKS</a>
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
<br>
    <div style="border:2px solid black;width:max-content;padding: 20px;margin:auto;margin-bottom:20px;">
        <h1 style="text-align: center">Edit Book</h1>
        <br>
        <?php 
            $book_id = $_GET['id'];
            $sql = "SELECT * FROM books WHERE id=$book_id";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $book_name = $row['name'];
            $author = $row['author'];
            $price = $row['price'];
            $ndprice = $row['ndprice'];
        ?>
        <form action="update-book.php" method="post" enctype="multipart/form-data" style="text-align:center">
                <input class="input-field" type="text" name="name" placeholder="Book Name" value="<?php echo $book_name; ?>" required>
                <br>
                <br>
                <input class="input-field" type="text" name="author" placeholder="Author" value="<?php echo $author; ?>" required>
                <br>
                <br>
                <textarea id="w3review" name="description" rows="5" cols="40"><?php echo $row['description']; ?></textarea>
                <br><br>
                <input class="input-field" type="number" name="quantity" placeholder="Add Quantity">
                <input type="hidden" name="pq" value=<?php echo $row['quantity']; ?> >
                <br>
                <br>
                <input class="input-field" type="number" name="ndprice" placeholder="Price" value="<?php echo $ndprice; ?>" required>
                <br>
                <br>
                <input class="input-field" type="number" name="price" placeholder="Price" value="<?php echo $price; ?>" required>
                <br>
                <br>
                <input class="input-field" type="file" name="image" placeholder="">
                <input class="input-field" type="hidden" name="bookid" value="<?php echo $book_id; ?>" placeholder="">
                <input class="input-field" type="hidden" name="prevImg" value="<?php echo $row['image']; ?>" placeholder="">
                <br>
                <br>
                <input type="submit" value="Update" name="update" style="width:90%;margin-left:5%;">
        </form>
    </div>
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
        <style>
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
                        <ul class="nav__list" >
                            <li class="nav__item">
                                <a href="index.php" onclick="f1()" class="nav__link">Home</a>
                            </li>
                            
                        </ul>
                    </div>

                    <div class="nav__icons">
                        <a href="#" class="icon__item">
                            <svg class="icon__user">
                <use xlink:href="./images/sprite.svg#icon-user"></use>
              </svg>
                        </a>

                        <a href="#" class="icon__item">
                            <svg class="icon__search">
                <use xlink:href="./images/sprite.svg#icon-search"></use>
              </svg>
                        </a>

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
                </nav>
            </div>
        </div>
        </header>
        <!-- End Header -->
        <script>
                    function f1(){
                        window.location.href='user.php';
                    }
        </script>
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
    <div style="border:2px solid black;width:max-content;padding: 40px;margin:auto">
        <h1 style="text-align: center">Edit User</h1>
        <br>
        <?php 
            $book_id = $_SESSION['id'];
            $sql = "SELECT * FROM users WHERE id=$book_id";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $name = $row['name'];
            $phone = $row['phone'];
        ?>
        <form action="update-user.php" method="post" enctype="multipart/form-data" style="text-align:center">
                    <input value="<?php echo $name; ?>" class="input-field" type="text" name="name" placeholder="Name" required>
                    <br>
                    <br>
                    <input value="<?php echo $phone; ?>" class="input-field" type="text" name="phone" placeholder="Phone" required>
                    <br>
                    <br>
                    
                    <input class="input-field" type="file" name="image" placeholder="Image">
                    <input class="input-field" type="hidden" name="prevImg" value="<?php echo $row['image']; ?>" placeholder="">
                    <br>
                    <br>
                    <button style="margin-top:10px" class="b view-btn" type="submit">
                        <a class="c">UPDATE</a>
                    </button>
        </form>
    </div>
<?php 
include('config/constants.php'); 
include('config/login-check.php');
?>
<!DOCTYPE html>
<html lang="en">
<script>
    let id = 0;
    </script>
<?php
    if(isset($_GET['del_id'])){
        $del_id = $_GET['del_id'];
        $sql = "DELETE FROM forgotPassword WHERE id=$del_id";
        $conn->query($sql);
    }
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
                                    <a href="admin-home.php" class="nav__link " >HOME</a>
                                </li>
                                
                                <li class="nav__item">
                                    <a href="config/logout.php" class="nav__link " >LOGOUT</a>
                                </li>
                            </ul>
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

    <div class="mt-4 p-4">
        <div class="row">
            <?php 
                $sql = "SELECT * FROM forgotPassword";
                $result = $conn->query($sql);
                if($result->num_rows>0){
                    while($row=$result->fetch_assoc()){
            ?>
            <div class="col-sm col-md-3">
                <div class="card mt-4 mb-4">
                    <div class="card-body">
                        <p style="text-align:center"><?php echo $row['email']; ?></p>
                        <button style="margin-top:10px;width:100%;font-size:100%" data-bs-target="#exampleModal3" data-bs-toggle="modal" onclick="myFunction(<?php echo $row['id']; ?>)" type="button" class="btn btn-outline-danger"><i class="fas fa-trash"></i> Delete</button>
                    </div>
                </div>
            </div>
            <?php
                    }
                }
                else { ?>
                    <p style="border:1px solid grey; padding:10px;display: block;margin-left: auto;margin-right: auto;width: fit-content; min-width:50%;text-align:center">No Requests.</p>
                    <?php 
                    }
                ?>
        </div>
    </div>
    <script>
  var k = 0;
function myFunction(t) {
  k = t;
}
</script>

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
                    <button style="font-size:100%;" type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="window.location.href='admin-requests.php?del_id='+ k ">Yes</button>
                </div>
            </div>
        </div>
    </div>


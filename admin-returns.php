<?php 
include('config/constants.php'); 
include('config/login-check.php');
if(isset($_GET['order_id'])){
    $oid = $_GET['order_id'];
    $sql = "UPDATE book_history SET status='aReturnedz' WHERE id=$oid";
    $conn->query($sql);
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
            h1 {
                font-weight:600 !important; 
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

    <div class="mt-4 p-4">
        <div class="row">
            <?php 
                $sql = "SELECT * FROM book_history WHERE status='aReturned' OR status='aReturnedz' ORDER BY status ASC";
                $result = $conn->query($sql);
                if($result->num_rows>0){
                    while($row=$result->fetch_assoc()){
            ?>
            <div class="col-sm col-md-3">
                <div class="card mt-4 mb-4" style="padding:10px">
                    <div class="card-body" >
                        <div style="display:inline"><h1 style="font-size:100%;display:inline">Name:&nbsp;</h1><h4 style="display:inline"><?php echo $row['user_name']; ?></h4></div>
                        <br><br>
                        <div style="display:inline"><h1 style="font-size:100%;display:inline">Address:&nbsp;</h1><h4 style="display:inline"><?php echo $row['address']; ?></h4></div>
                        <br><br>
                        <div style="display:inline"><h1 style="font-size:100%;display:inline">Phone:&nbsp;</h1><h4 style="display:inline"><?php echo $row['phone']; ?></h4></div>
                        <br><br>
                        <div style="display:inline"><h1 style="font-size:100%;display:inline">Book:&nbsp;</h1><h4 style="display:inline"><?php echo $row['book_name']; ?></h4></div>
                        <br><br>
                        <div style="display:inline"><h1 style="font-size:100%;display:inline">Author:&nbsp;</h1><h4 style="display:inline"><?php echo $row['author']; ?></h4></div>
                        <br><br>
                        <div style="display:inline"><h1 style="font-size:100%;display:inline">Reason:&nbsp;</h1><h4 style="display:inline"><?php echo $row['reason']; ?></h4></div>
                        <br><br>
                        <?php if($row['status']=='aReturned'){ ?>
                        <button type="button" style="width:100%;font-size:90%" onclick="myFunction2(<?php echo $row['id']; ?>)" class="btn btn-outline-secondary" data-bs-target="#exampleModal2" data-bs-toggle="modal">Collected</button>
                        <?php } else { ?>
                            <button type="button" style="width:100%;font-size:90%" class="btn btn-outline-secondary" disabled>Received</button>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <?php
                    }
                }
                else{ ?>
                    <h4 style="text-align:center;border:2px solid grey;padding:10px;width:fit-content;margin-left:auto;margin-right:auto;min-width:50%">No Returns yet</h4>
                <?php } 
            ?>
        </div>
    </div>

    <script>
        let k = 0;
        let l = 0;
        let t = 0;
function myFunction(x,y) {
    k = x;
    l = y;
}
function myFunction2(z) {
    t = z;
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
                    <h5 style="font-size:100%; margin-top:5%;margin-bottom:5%">Received the product??</h5>
                </div>
                <div class="modal-footer">
                    <button style="font-size:100%;" type="button" class="btn btn-primary" data-bs-dismiss="modal">No</button>
                    <button style="font-size:100%;" type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="window.location.href='admin-returns.php?order_id='+ t">Yes</button>
                </div>
            </div>
        </div>
    </div>

</head>
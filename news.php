<?php 
include('config/constants.php'); 
include('config/login-check.php');
if(isset($_GET['del_id'])){
    $del_id = $_GET['del_id'];
    $sql = "DELETE FROM news WHERE id=$del_id";
    $conn->query($sql);
    $img_name=$_GET['img_name'];
    $path="news-images/".$img_name;
    $remove=unlink($path);
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
                                <a href="" class="nav__link " data-bs-toggle="modal" data-bs-target="#staticBackdrop" >
                                    ADD NEWS
                                </a>
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
                $sql = "SELECT * FROM news";
                $result = $conn->query($sql);
                if($result->num_rows>0){
                    while($row=$result->fetch_assoc()){
            ?>
            <div class="col-sm col-md-3">
                <div class="card mt-4 mb-4">
                    <img src="news-images/<?php echo $row['image']; ?>" class="card-img-top" alt="Book-image" height=200 width=300>
                    <div class="card-body">
                        <h5 class="card-title" style="text-align:center;font-size:120%;margin-top:10px"><?php echo $row['heading']; ?></h5>
                        <p class="card-text" style="text-align:center;font-size:120%;margin-top:10px"><?php echo $row['content'];?></p>
                        <a href="edit-news.php?id=<?php echo $row['id']; ?>" class="btn btn-outline-success" style="width:90%;margin-left:5%;font-size:100%;margin-top:10px"><i class="fas fa-edit"></i> Edit</a>
                        <button data-bs-target="#exampleModal2" data-bs-toggle="modal" style="width:90%;margin-left:5%;margin-top:10px;font-size:100%" class="btn btn-outline-danger" onclick="myFunction(<?php echo $row['id']; ?>,'<?php echo $row['image']; ?>')"><i class="fas fa-trash"></i> Delete</button>
                    </div>
                </div>
            </div>
            <?php
                    }
                } 
            ?>
        </div>
    </div>

    <script>
        let k = 0;
        let l = 0;
function myFunction(x,y) {
    k = x;
    l = y;
}
</script>


<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel" style="font-size: large;">Add News</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <br>
            <form action="add-news.php" method="post" enctype="multipart/form-data">
                <div class="modal-body" style="text-align: center;">
                    <input class="input-field" type="text" name="heading" placeholder="Heading" required>
                    <br>
                    <br>
                    <textarea id="w3review" name="content" rows="5" cols="40"></textarea>
                    <br>
                    <br>
                    <input class="input-field" type="file" name="image" placeholder="" required>
                    <br>
                    <br>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-lg">ADD</button>
                </div>
            </form>
        </div>
    </div>
</div>

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
                    <button style="font-size:100%;" type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="window.location.href='news.php?del_id='+ k +'&img_name='+ l">Yes</button>
                </div>
            </div>
        </div>
    </div>

</head>
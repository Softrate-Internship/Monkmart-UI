<?php 
include('config/constants.php'); 
include('config/login-check.php');
if(isset($_GET['del_id'])){
    $del_id = $_GET['del_id'];
    $sql = "DELETE FROM slider WHERE id=$del_id";
    $conn->query($sql);
    $img_name=$_GET['img_name'];
    $path="slider-images/".$img_name;
    $remove=unlink($path);
}
?>
<!DOCTYPE html>
<html lang="en">

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
.container11 {
  position: relative;
  border:1px solid grey;
}
.top-right {
  position: absolute;
  top: 3px;
  right: 8px;
  border-radius:100%;
  padding:5px;
  padding-left:10px;
  padding-right:10px;
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
                                    <a href="admin-home.php" class="nav__link">HOME</a>
                                </li>
                                <li class="nav__item">
                                <a href="" class="nav__link" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                    ADD-SLIDER
                                </a>
                                </li>
                                <li class="nav__item">
                                    <a href="config/logout.php" onclick="f4()" class="nav__link">LOGOUT</a>
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
    <div class="container11" style="width:80%;display:block;margin-left:auto;margin-right:auto;margin-top:20px;">
    <a href="" class="top-right" data-bs-target="#exampleModalToggle1" data-bs-toggle="modal" ><i class="fas fa-pen"></i></a>
        <?php $sql = "SELECT * FROM popup WHERE id=1";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        ?>
            <div class="popup__left">
                <div class="popup-img__container">
                    <img class="popup__img" src="./images/<?php echo $row['image']; ?>" alt="popup">
                </div>
            </div>
            <div class="popup__right">
                <div class="right__content">
                <img src="images\transparent.png" width="100" height="100" style="margin:auto">
                <br>
                    <h1 style="font-size:220%">Welcome to <span>Monk mart<span> </h1>
                    <p><?php echo $row['content']; ?>
                    </p>
                    <a target="_blank" href="<?php echo $row['link']; ?>"><?php echo $row['button']; ?></a>
                </div>
            </div>
    </div>
    <?php $sqla = "SELECT * FROM popup WHERE id=2";
        $resulta = $conn->query($sqla);
        $rowa = $resulta->fetch_assoc();
        $sqlb = "SELECT * FROM popup WHERE id=3";
        $resultb = $conn->query($sqlb);
        $rowb = $resultb->fetch_assoc();
        ?>
        <section id="collection" class="section collection" style="margin-bottom:2%">
                <div class="collection__container">
                    <div class="collection__box  container11" style="border:none">
                    <a href="" class="top-right" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" ><i class="fas fa-pen"></i></a>
                        <div class="img__container">
                            <img class="collection_02" src="./images/<?php echo $rowa['image']; ?>" alt="">
                        </div>
                        <div class="collection__content">
                            
                            <div class="collection__data">
                                <h4 style="text-align:center;font-size:120%"><?php echo $rowa['content']; ?></h4>
                        
                                <a style="display:block;margin-left:auto;margin-right:auto;width:fit-content;min-width:50%;text-align:center" target="_blank" href="<?php echo $rowa['link']; ?>"><?php echo $rowa['button']; ?></a>
                            </div>
                        </div>
                    </div>
                    <div class="collection__box  container11" style="border:none">
                    <a href="" class="top-right" data-bs-target="#exampleModalToggle3" data-bs-toggle="modal" ><i class="fas fa-pen"></i></a>
                        <div class="img__container">
                            <img class="collection_02" src="./images/<?php echo $rowb['image']; ?>" alt="">
                        </div>
                        <div class="collection__content">
                            
                            <div class="collection__data">
                                <h4 style="text-align:center;font-size:120%"><?php echo $rowb['content']; ?></h4>
                        
                                <a style="display:block;margin-left:auto;margin-right:auto;width:fit-content;min-width:50%;text-align:center" target="_blank" href="<?php echo $rowb['link']; ?>"><?php echo $rowb['button']; ?></a>
                            </div>
                        </div>
                    </div>
            </section>
            <div class="title__container">
                        <div class="section__titles">
                            <div class="section__title active">
                                <span class="dot"></span>
                                <h1 class="primary__title">Slider</h1>
                            </div>
                        </div>
                    </div>
            <div class="mt-4 p-4">
        <div class="row" >
            <?php 
                $sql11 = "SELECT * FROM slider";
                $result11 = $conn->query($sql11);
                if($result11->num_rows>0){
                    while($row11=$result11->fetch_assoc()){
            ?>
            <div class="col-sm-6" style="padding-left:3%;padding-right:3%;padding-bottom:2%">
                <div class="card">
                    <div class="card-body">
                        <img src="slider-images/<?php echo $row11['image']; ?>" class="card-img-top" alt="Book-image" height=300 width=200>
                        <button style="margin-top:10px;width:100%;font-size:100%" data-bs-target="#exampleModal3" data-bs-toggle="modal" onclick="myFunction(<?php echo $row11['id']; ?>,'<?php echo $row11['image']; ?>')" type="button" class="btn btn-outline-danger"><i class="fas fa-trash"></i> Delete</button>
                        
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
    var x=0;
    var y='';
    function myFunction(a,b){
        x = a;
        y = b;
    }
</script>

<div class="modal fade" id="exampleModalToggle1" aria-hidden="true" aria-labelledby="exampleModalToggleLabel1" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel2">Edit</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" action="update-popup.php" enctype="multipart/form-data">
      <div class="modal-body" style="text-align: center;">
      <textarea id="w3review" name="content" rows="5" cols="40" placeholder="Content" required><?php echo $row['content']; ?></textarea>
        <br><br>
        <input class="input-field" type="text" name="button" placeholder="Button Name" value="<?php echo $row['button']; ?>" required>
        <br><br>
        <input class="input-field" type="text" name="link" placeholder="Link" value="<?php echo $row['link']; ?>" required>
        <br><br>
        <input class="input-field" type="file" name="image">
        <input type="hidden" name="prev" value="<?php echo $row['image']; ?>">
        <input type="hidden" name="pid" value="1">
        <br><br>
      </div>
      <div class="modal-footer">
        <button type="submit"  class="btn btn-primary">Update</button>
      </div>
    </form>
</div>
</div>
</div>      
<div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel2">Edit</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" action="update-popup.php" enctype="multipart/form-data">
      <div class="modal-body" style="text-align: center;">
      <textarea id="w3review" name="content" rows="5" cols="40" placeholder="Content" required><?php echo $rowa['content']; ?></textarea>
        <br><br>
        <input class="input-field" type="text" name="button" placeholder="Button Name" value="<?php echo $rowa['button']; ?>" required>
        <br><br>
        <input class="input-field" type="text" name="link" placeholder="Link" value="<?php echo $rowa['link']; ?>" required>
        <br><br>
        <input class="input-field" type="file" name="image">
        <input type="hidden" name="prev" value="<?php echo $rowa['image']; ?>">
        <input type="hidden" name="pid" value="2">
        <br><br>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
    </form>
</div>
</div>
</div>  
<div class="modal fade" id="exampleModalToggle3" aria-hidden="true" aria-labelledby="exampleModalToggleLabel3" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel2">Edit</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" action="update-popup.php" enctype="multipart/form-data">
      <div class="modal-body" style="text-align: center;">
      <textarea id="w3review" name="content" rows="5" cols="40" placeholder="Content" required><?php echo $rowb['content']; ?></textarea>
        <br><br>
        <input class="input-field" type="text" name="button" placeholder="Button Name" value="<?php echo $rowb['button']; ?>" required>
        <br><br>
        <input class="input-field" type="text" name="link" placeholder="Link" value="<?php echo $rowb['link']; ?>" required>
        <br><br>
        <input class="input-field" type="file" name="image">
        <input type="hidden" name="prev" value="<?php echo $rowb['image']; ?>">
        <input type="hidden" name="pid" value="3">
        <br><br>
      </div>
      <div class="modal-footer">
        <button type="submit" name="submit3" class="btn btn-primary">Update</button>
      </div>
    </form>
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
                    <button style="font-size:100%;" type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="window.location.href='advertising.php?del_id='+ x +'&img_name='+ y">Yes</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel" style="font-size: large;">Add Slider</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <br>
            <form action="add-slider.php" method="post" enctype="multipart/form-data">
                <div class="modal-body" style="text-align: center;">
                    <br>
                    <input class="input-field" type="file" name="image" required>
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

    
    
    
<?php 
include('config/constants.php'); 
include('config/login-check.php');
if(isset($_GET['sid'])){
  $sid = $_GET['sid'];
  date_default_timezone_set("Asia/kolkata");
  $currentDate = date("Y-m-d");
  $currentTime = date("H:i:s");
  $timeStamp = $currentDate.' '.$currentTime;
  $sql = "UPDATE book_history SET status='Delivered',delivery_date='$timeStamp' WHERE id='$sid'";
  $result = $conn->query($sql);
}
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
                                <a href="books.php" class="nav__link" >BOOKS</a>
                            </li>
                            <li class="nav__item">
                                <a href="highlights.php" class="nav__link " >HIGHLIGHTS</a>
                            </li>
                            <li class="nav__item">
                                <a href="news.php"  class="nav__link " >NEWS</a>
                            </li>
                            <li class="nav__item">
                                <a href="advertising.php" class="nav__link" >ADVERTISING</a>
                            </li>
                            <li class="nav__item">
                                <a href="admin-returns.php" class="nav__link " >RETURNS</a>
                            </li>
                            <li class="nav__item">
                                <a href="admin-requests.php" class="nav__link " >REQUESTS</a>
                            </li>
                            <li class="nav__item">
                                <a href="subscriptions.php" class="nav__link " >SUBSCRIPTIONS</a>
                            </li>
                            <li class="nav__item">
                                <a href="config/logout.php" class="nav__link " >LOGOUT</a>
                            </li>
                        </ul>
                    </div>
                    <div class="nav__icons">

                        <a style="display:none" href="#" class="icon__item" data-bs-toggle="modal" data-bs-target="#staticBackdrop5">
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
<br>
<h1 style="text-align:center">Purchases</h1>
<br>

<table class="table table-primary" style="width:98%;margin-left:1%">
  <thead>
    <tr>
      <th scope="col" style="text-align:center">Sr No.</th>
      <th scope="col" style="text-align:center">Buyer Name</th>
      <th scope="col" style="text-align:center">Address</th>
      <th scope="col" style="text-align:center">Phone Number</th>
      <th scope="col" style="text-align:center">Book Name</th>
      <th scope="col" style="text-align:center">Book Author</th>
      <th scope="col" style="text-align:center">Date & Time</th>
      <th scope="col" style="text-align:center">Track_ID</th>
      <th scope="col" style="text-align:center">Status</th>
    </tr>
  </thead>
  <tbody class="table table-hover">
    <?php
    $sql = "SELECT * FROM book_history ORDER BY date DESC, status DESC";
    $result = $conn->query($sql);
    if($result->num_rows>0){
      $r= 1;
      while($row=$result->fetch_assoc()){
    ?>
    <tr style="text-align:center">
      <th scope="row"><?php echo $r++; ?></th>
      <td><?php echo $row['user_name']; ?></td>
      <td><?php echo $row['address']; ?></td>
      <td><?php echo $row['phone']; ?></td>
      <td><?php echo $row['book_name']; ?></td>
      <td><?php echo $row['author']; ?></td>

      <td><?php echo $row['date']; ?></td>
      <?php if($row['track_id']!=NULL){ ?>
        <td><?php echo $row['track_id']; ?></td>
      <?php } else{ ?>
        <td><button onclick="myFunction2(<?php echo $row['id']; ?>)" data-bs-target="#exampleModal3" data-bs-toggle="modal" class="btn btn-outline-secondary" style="width:90%">ADD</button></td>
       <?php  }if($row['status']=='Ordered'){
         if($row['track_id']!=NULL){ ?>
      <td><button onclick="myFunction(<?php echo $row['id']; ?>)" data-bs-target="#exampleModal2" data-bs-toggle="modal" class="btn btn-outline-success" style="width:90%">Change</button></td>
        <?php }
          else{ ?>
            <td style="font-size:90%">Order Placed</td>          
          <?php }
       } 
        elseif($row['status']=='Delivered'){
          ?>
          <td style="font-size:90%">Delivered</td>
          <?php 
        }
        elseif($row['status']=='aReturned'){
          ?>
          <td style="font-size:90%">Return requested</td>
          <?php 
        }
        else{
          ?>
          <td style="font-size:90%">Returned</td>
          <?php 
        }
        ?>
    </tr>
    <?php 
      }
    }
    ?>
  </tbody>
</table>
<script>
  var k = 0;
function myFunction(t) {
  k = t;
}
function myFunction2(t){
  document.getElementById("oid").value = t;
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
                    <h5 style="font-size:100%; margin-top:5%;margin-bottom:5%">Are you sure to change the status to Delivered??</h5>
                </div>
                <div class="modal-footer">
                    <button style="font-size:100%;" type="button" class="btn btn-primary" data-bs-dismiss="modal">No</button>
                    <button style="font-size:100%;" type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="window.location.href='admin-home.php?sid='+ k ">Yes</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">

                    <h5 class="modal-title fw-bold heading" id="exampleModalLabel2" style="font-size:120%;">Tracking</h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="tracking.php">
                <div class="modal-body" style="text-align: center;" >
                    <input type="text" name="trackid" class="input-field" placeholder="Tracking ID" required>
                    <br>
                    <input style="margin-top:20px;" type="text" name="link" class="input-field" placeholder="Tracking Link" required>
                    <input type="hidden" value="-1" name="id" id="oid">
                </div>
                <br>
                <div class="modal-footer">
                    <button style="font-size:100%;" type="submit" class="btn btn-primary" >Update</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel">Pop Up</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <?php 
          $sql = "SELECT * FROM popup";
          $result = $conn->query($sql);
          $row = $result->fetch_assoc();
           ?>
        <p>Image:</p>
        <img src="images\<?php echo $row['image']; ?>">
        <br>
        <p style="margin-top:10px">Content:</p>
        <p><?php echo $row['content']; ?></p>
        <p>Link: <?php echo $row['link']; ?></p>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">Edit</button>
      </div>
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
      <textarea id="w3review" name="content" rows="5" cols="40" required><?php echo $row['content']; ?></textarea>
        <br><br>
        <input class="input-field" type="text" name="link" value="<?php echo $row['link']; ?>" required>
        <br><br>
        <input class="input-field" type="file" name="image" value="">
        <input type="hidden" name="prev" value="<?php echo $row['image']; ?>">
        <br><br>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
</form>
    </div>
  </div>
</div>



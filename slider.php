<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <style>
        .carousel-item {
            height: 69vh;
            min-height: 350px;
            background: no-repeat center center scroll;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }
        @media only screen and (max-width: 568px) {
          .carousel-item {
            height: 30vh;

          }
        }
    </style>
  </head>
  <body>
  <?php  
    $sql = "SELECT * FROM slider";
    $result = $conn->query($sql);
    $total = $result->num_rows;
  ?>
  <header>
  
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <?php 
          $i = 0;
          while($i<$total){
            if($i==0){ 
        ?>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <?php } else { ?>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?php echo $i; ?>" aria-label="Slide <?php echo $i+1; ?>"></button>
        <?php } $i++; } ?>
      </div>
      <div class="carousel-inner">
        <?php 
          $i=0;
          while($row = $result->fetch_assoc()){ 
            if($i==0){
        ?>
        <div class="carousel-item active" style="background-image: url('slider-images/<?php echo $row['image'] ?>')">
        </div>
        <?php } else { ?>
        <div class="carousel-item" style="background-image: url('slider-images/<?php echo $row['image'] ?>')">
        </div>
        <?php } $i++; } ?>
      </div>

      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </header>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>
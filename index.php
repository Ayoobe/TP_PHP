<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <!-- start of navbar-->
  <nav class="navbar navbar-expand-lg navbar-light bg-white py-3 fixed-top">
    <div class="container">
      <img src="assets/imgs/logo.jpg" >
      <a class="navbar-brand" href="index.html">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse nav-buttons" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="reserve.html">Reserve</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.html">Contact</a>
          </li>
  
          <li class="nav-item">
            <a class="nav-link" href="account.html">
              <i class="fas fa-user"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="cart.php">
              <i class="fas fa-shopping-cart"></i>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- end of navbar-->

  <!-- start of home section -->

  <section id="home">
    <div class="container">
       
        <h4>NEW EVENTS!</h4>
        <h1>For the <span>brightest</span> students!</h1>
        <p>You came to the right place</p>
        <button id="btn1">Reserve Now!</button>
    </div>
   
  </section>

  <!--clubs-->
<section id="clubs" class="container">
    <div class="row">
        <img class="img-fluid col-lg3 col-md-3 col-sm-12" src="assets/imgs/club1.jpg" >
        <img class="img-fluid col-lg3 col-md-3 col-sm-12" src="assets/imgs/club2.jpg"  >
        <img class="img-fluid col-lg3 col-md-3 col-sm-12" src="assets/imgs/club3.jpg" >
        <img class="img-fluid col-lg3 col-md-3 col-sm-12" src="assets/imgs/club4.png" >
    </div>
</section>

<!-- new section-->
<section id="new" class="w-100">
    <div class="row p-0 m-0" >

        <!-- 1-->
        <div class="one col-lg-4 col-md-4 col-sm-12 p-0">
            <img class="img-fluid" src="assets/imgs/club4.png">
            <div class="details">
                <h3>Discover Amazing Workshops!</h3>
                <button class="text-uppercase"> Join Now</button>

            </div>
        </div>
        <!-- 2-->
        <div class="one col-lg-4 col-md-4 col-sm-12 p-0">
            <img class="img-fluid" src="assets/imgs/club4.png">
            <div class="details">
                <h3>Compete In Hackathons!</h3>
                <button class="text-uppercase"> Join Now</button>

            </div>
        </div>
        <!-- 3-->
        <div class="one col-lg-4 col-md-4 col-sm-12 p-0">
            <img class="img-fluid" src="assets/imgs/club4.png">
            <div class="details">
                <h3>Make New Friends!</h3>
                <button class="text-uppercase"> Join Now</button>
            </div>
        </div>
    </div>
    
</section>

<!-- featured-->
<section id="featured" class="my-5 pb-5">
    <div class="container text-center mt-5 py-5">
        <h3> Our Featured Events:</h3>
        <hr>
        <p>Featured paragraph text : to complete later</p>
    </div>

    <div class="row mx-auto text-center container-fluid">

    <?php  include ('server/get_featured_events.php'); ?>

    <?php while($row = $featured_events->fetch_assoc()) { ?>
        <div class="myevent text-center col-lg-4 col-md-4 col-sm-12">
        <a href="<?php echo "single-event.php?event_id=".$row['event_id']; ?>"><img class="img-fluid mb-3" src="assets/imgs/<?php echo $row ['event_image1']; ?> "/></a>
            <h4 class="p-name"> <?php echo $row['event_name'] ?></h4>


            <?php
            $datetime = new DateTime($row['event_datetime']);
            $date = $datetime->format('Y-m-d');
            $time = $datetime->format('H:i A');
            ?>

            <h5 class="p-info"><?php echo $date ?></h5>
            <h5 class="p-info">At <?php echo $time ?></h5>
        </div>

     <?php } ?>   
    </div>
</section>


<!-- footer needs further work-->
<footer class="mt-5 py-5">
    <div class="container mx-auto">
      <div class="row">
        <div class="footer-one col-lg-3 col-md-3 col-sm-12">
          <img src="assets/img/logo.jpeg" />
          <p class="pt-3">We host the best events that are out there</p>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12">
          <h5 class="pb-2">Follow Us</h5>
          <ul class="list-unstyled d-flex social-icons">
            <li class="ms-3">
              <a href="#"><i class="fab fa-facebook-f"></i></a>
            </li>
            <li class="ms-3">
              <a href="#"><i class="fab fa-twitter"></i></a>
            </li>
            <li class="ms-3">
              <a href="#"><i class="fab fa-instagram"></i></a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
  
  



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

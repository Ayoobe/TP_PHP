<?php

include ('server/connection.php');

if(isset($_GET['event_id'])) {

    $event_id = $_GET['event_id'];
    $stmt = $conn->prepare("SELECT * FROM events WHERE event_id = ?");
    $stmt->bind_param("i", $event_id);
    $stmt->execute();
    $event = $stmt->get_result();
}
else {
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Event</title>
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
            <a class="nav-link" href="cart.html">
              <i class="fas fa-shopping-cart"></i>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
    <!-- end of navbar-->




<section class="container single-event my-5 pt-5">
    <div class="row mt-5">

    <?php while($row = $event->fetch_assoc()){?>
     

        <div class="col-lg-5 col-md-5 col-sm-12">
            <img class="img-fluid w-100 pb-1" src="assets/imgs/<?php echo $row ['event_image1']; ?>" id="mainImg">
            <div class="small-img-group">
                <div class="small-img-col">
                    <img src="assets/imgs/<?php echo $row ['event_image1']; ?>" width="100%" class="small-img" >
                </div>
                <div class="small-img-col">
                    <img src="assets/imgs/<?php echo $row ['event_image2']; ?>" width="100%" class="small-img" >
                </div>
                <div class="small-img-col">
                    <img src="assets/imgs/<?php echo $row ['event_image3']; ?>" width="100%" class="small-img" >
                </div>
                <div class="small-img-col">
                    <img src="assets/imgs/<?php echo $row ['event_image4']; ?>" width="100%" class="small-img" >
                </div>
            </div>
        </div>

     

        <div class="col-lg-6 col-md-6 col-sm-12">
            <h2> <?php echo $row['event_name'] ?></h2>
            <h3 class="py-4"> <?php echo $row['event_category'] ?></h3>
            <h3> <?php echo $row['event_price'] ?> TND </h3>

            <form method="POST" action="cart.php" >
              <input type="hidden" name="event_id" value="<?php echo $row ['event_id']; ?>">
              <input type="hidden" name="event_image1" value="<?php echo $row ['event_image1']; ?>">
              <input type="hidden" name="event_name" value="<?php echo $row ['event_name']; ?>">
              <input type="hidden" name="event_price" value="<?php echo $row ['event_price']; ?>">
              <input type="hidden" name="event_datetime" value="<?php echo $row ['event_datetime']; ?>">
              <button type="submit" name="add_to_cart">Add To Cart</button>

            </form>

            <h4 class="mt-5">Event description</h4>
            <span><?php echo $row['event_description'] ?></span>

        </div>
      
        <?php } ?>
    </div>

      
</section>





<!--footer (still needs work)-->
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



<script>
    var mainImg = document.getElementById("mainImg");
    var smallImg = document.getElementsByClassName("small-img");
for(let i = 0; i < smallImg.length; i++) {
    smallImg[i].onclick = function() {
        mainImg.src = smallImg[i].src;
    }
}
</script>

</body>
</html>
<?php
include ('server/connection.php');

if(isset($_POST['order_id']) && isset($_POST['order_details_btn'])){
    $order_status = $_POST['order_status'];
    $order_id = $_POST['order_id'];
    $stmt = $conn->prepare("SELECT * FROM order_items WHERE order_id = ?");
    $stmt->bind_param("i", $order_id);
    $stmt->execute();
    $orders= $stmt->get_result();
  }

  else{
    header('location: account.php');
    exit();
  }
  
    




?>




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
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse nav-buttons" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Reserve</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#">
            <i class="fas fa-user"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <i class="fas fa-shopping-cart"></i>
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>


<section class="cart container my-5 py-5">
    <div class="container mt-5">  
        <h2 class="font-weight-bold">Order Details</h2>  
        <hr class="mx-auto">
    </div>
    <table class="mt-5 pt-5 mx-auto">
        <tr>
            <th>Event</th>      
            <th>Event Price</th>
            <th>Date Of Order Placement</th>
        </tr>

 
      <?php while($order = $orders->fetch_assoc() ) { ?>
            <tr>
                <td>
                    <div class="event-info">
                      <img src="assets/imgs/<?php echo $order["event_image"]; ?>" >
                        <div>
                            <p> <?php echo $order['event_name']; ?> </p>
                        </div>
                    </div>
                </td>

                <td> 
                <span class="event-price"> <?php echo $order['event_price']; ?> </span>
                </td>

                <td> 
                <span class="event-price"> <?php echo $order['order_date']; ?> </span>
                </td>
              
            </tr>
              
      <?php } ?>
 
    </table>


    <?php
    if($order_status=="Unpaid"){ ?>
      <form style="float: right">
      <input type="submit" class="btn btn-pay" value="Pay Now">
    
      </form>


    <?php } ?>
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

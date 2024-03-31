<?php



?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cart</title>
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



<!-- cart-->
<section class="cart container my-5 py-5">
    <div class="container mt-5">  
        <h2 class="font-weight-bold">Your Cart</h2>  
    </div>
    <table class="mt-5 pt-5">
        <tr>
            <th>Event</th>      
            <th>Price</th>
            <th>Date</th>
        </tr>
        <tr>
            <td>
                <div class="event-info">
                    <img src="assets/imgs/featured1.jpg" alt="">
                    <div>
                        <p>first event</p>
                        <small><span>69$</span></small>
                        <a class="remove-btn"  href="#"></a>
                    </div>
                </div>
            </td>
            <td> <span>$</span>
                <span class="event-price">69</span>
            </td>
            <td>
                DDMMYYYY
            </td>
        </tr>
        <tr>
            <td>
                <div class="event-info">
                    <img src="assets/imgs/featured1.jpg" alt="">
                    <div>
                        <p>first event</p>
                        <small><span>69$</span></small>
                        <a class="remove-btn"  href="#"></a>
                    </div>
                </div>
            </td>
            <td> <span>$</span>
                <span class="event-price">69</span>
            </td>
            <td>
                DDMMYYYY
            </td>
        </tr>
        <tr>
            <td>
                <div class="event-info">
                    <img src="assets/imgs/featured1.jpg" alt="">
                    <div>
                        <p>first event</p>
                        <small><span>69$</span></small>
                        <a class="remove-btn"  href="#"></a>
                    </div>
                </div>
            </td>
            <td> <span>$</span>
                <span class="event-price">69</span>
            </td>
            <td>
                DDMMYYYY
            </td>
        </tr>

    </table>
    <div class="cart-total">
        <table>
            <tr>
                <td>Subtotal</td>
                <td>$42069</td>
            </tr>
            <tr>
                <td>
                    Total
                </td>
                <td>$42069</td>
            </tr>
        </table>
    </div>
<div class="checkout-container">
    <button class="checkout-btn"> Checkout</button>
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
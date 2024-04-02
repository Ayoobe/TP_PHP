<?php

session_start();
include ('server/connection.php');
if(!isset($_SESSION['logged_in'])){
  header('location: login.php');
  exit();
}

if(isset($_GET['logout'])){
  session_destroy();
  unset($_SESSION['user_email']);
  unset($_SESSION['user_name']);
  unset($_SESSION['logged_in']);
  header('location: login.php');
  exit();
}

if(isset($_POST['change_password'])){
  include ('server/connection.php');
  $password=$_POST['password'];
  $confirmPassword=$_POST['confirmPassword'];
  if($password!=$confirmPassword){
    header('location: account.php?error=Passwords do not match');
  }
  else if(strlen($password)<6){
    header('location: account.php?error=Password must be at least 6 characters long');
  }
  else{
    $stmt=$conn->prepare("UPDATE users SET user_password=? WHERE user_email=?");
    $stmt->bind_param("ss", md5($password), $_SESSION['user_email']);
    $stmt->execute();
    header('location: account.php?message=Password changed successfully');
  }
}


if(isset($_SESSION['logged_in'])){
  $stmt=$conn->prepare("SELECT * FROM orders WHERE user_id=?");
  $stmt->bind_param("i", $_SESSION['user_id']);
  $stmt->execute();
  $orders=$stmt->get_result();}
   

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




<!--Account-->
<section class="my-5 py-5">
  <div class="row container mx-auto">
      <div class="text-center mt-3 pt-5 col-lg-6 col-md-6 col-sm-12">
          <h3 class="font-weight-bold">Account info</h3>
          <hr class="mx-auto">
          <div class="account-info">
            <p>Name: <span><?php if(isset( $_SESSION['user_name'])){ echo $_SESSION['user_name'];}?></span></p>
            <p>Email: <span><?php if(isset( $_SESSION['user_email'])){echo $_SESSION['user_email'];}?></p>
            <p><a   href="cart.php" id="orders-btn" >Your Cart</a></p>
            <p><a  href="account.php?logout=1" id="logout-btn"  >Logout</a></p>
          </div>
        </div>

      <!-- Change password -->
      <div class="col-lg-6 col-md-6 col-sm-12">
        <form id="account-form" method="POST" action="account.php" >
          <p class="text-center" style="color:green"><?php if(isset( $_GET['message'])){ echo $_GET['message'];}?></p>
          <p class="text-center" style="color:red"><?php if(isset( $_GET['error'])){ echo $_GET['error'];}?></p>

          <h3>Change password</h3>
          <hr class="mx-auto">
          <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" id="account-password" placeholder="Password" name="password" required>
          </div>
          <div class="form-group">
            <label>Confirm Password</label>
            <input type="password" class="form-control" id="account-password-confirm" placeholder="Confirm Password" name="confirmPassword" required>
          </div>
          <div class="form-group">
            <input type="submit" value="Change Password" class="btn" id="change-pass-btn" name="change_password">
          </div>
        </form>
      </div>
</section>

<!--order history-->
<section class="cart container my-5 py-5">
    <div class="container mt-5">  
        <h2 class="font-weight-bold">Your Cart</h2>  
        <hr class="mx-auto">
    </div>
    <table class="mt-5 pt-5">
        <tr>
            <th>Order ID</th>      
            <th>Order Total</th>
            <th>Order Status</th>
            <th>Date Of Order</th>
            <th>Order Details</th>
        </tr>

        <?php while ($order = $orders->fetch_assoc()){ ?>


            <tr>
                <td>
                    <div class="event-info">
                        <div>
                            <p> <?php echo $order['order_id']; ?> </p>
                        </div>
                    </div>
                </td>

                <td> 
                <span class="event-price"> <?php echo $order['order_cost']; ?> </span>
                </td>

                <td> 
                <span class="event-price"> <?php echo $order['order_status']; ?> </span>
                </td>

                <td> 
                <span class="event-price"> <?php echo $order['order_date']; ?> </span>
                </td>

                <td>
                  <form method="POST" action="order_details.php" > 
                    <input type="hidden" value="<?php echo $order['order_status'];?>" name="order_status">
                    <input type="hidden" value="<?php echo $order['order_id'];?>" name='order_id'>
                    <input name ="order_details_btn" class="btn order-details-btn" type="submit" value="View Details">
                  </form>
                </td>
              
            </tr>
          <?php } ?>
             
 
    </table>

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

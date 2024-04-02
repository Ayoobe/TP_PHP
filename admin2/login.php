<?php 
session_start();
include ('server/connection.php');

if(isset($_SESSION['admin_logged_in'])){
  header('location: admin_dashboard.php');
  exit();
}

if(isset($_POST['login_btn'])){
  $email=$_POST['email'];
  $password=$_POST['password'];

  // Assuming you have a table named 'admins' for storing admin credentials
  $stmt=$conn->prepare("SELECT * FROM admins WHERE admin_email=? AND admin_password=?");
  $stmt->bind_param("ss", $email, md5($password)); // You should use more secure hashing methods like bcrypt instead of md5
  $stmt->execute();
  $result=$stmt->get_result();
  $row=$result->fetch_assoc();
  if($row){
    $_SESSION['admin_email']=$email;
    $_SESSION['admin_name']=$row['admin_name'];
    $_SESSION['admin_id']=$row['admin_id'];
    $_SESSION['admin_logged_in']=true;
    header('location: admin_dashboard.php');
  }
  else{
    header('location: admin_login.php?error=Incorrect email or password');
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
  <style>
    /* Add the styles from the CSS file */
    /* Example:*/
    .form-weight-bold {
      font-weight: 100;
      text-decoration-style: underline;
      text-decoration-color: #fa2e2e;
      text-decoration-thickness: 2px;
      text-underline-offset: 0.5em;
      text-decoration-line: underline;
      text-decoration-skip-ink: none;
    }

    #login-form {
      width: 50%;
      margin: 5px auto;
      padding: 20px;
      text-align: center;
      border-top: 1px solid #fa2e2e;
    }

    #login-email, #login-password {
      width: 50%;
      margin: 5px auto;
    }

    #login-btn {
      width: 50%;
      margin: 5px auto;
      background-color: #fa2e2e;
      color: #ffffff;
    }


    /* Add other styles from the CSS file */
  </style>
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

<!--login-->
<section class="my-5 py-5">
  <div class="container text-center mt-3 pt-5">
    <h2 class="form-weight-bold">Admin Login</h2>
    <hr class="mx-auto">
  </div>
  <div class="mx-auto container">
    <form id="login-form" action="login.php" method="POST">
      <p style="color: red" class="text-center"><?php if(isset($_GET['error'])){echo $_GET['error'];} ?></p>
      <div class="form-group">
        <label for="login-email">Email</label>
        <input type="text" class="form-control" id="login-email" name="email" placeholder="Email" required>
      </div>
      <div class="form-group">
        <label for="login-password">Password</label>
        <input type="password" class="form-control" id="login-password" name="password" placeholder="Password" required>
      </div>
      <div class="form-group">
        <input type="Submit" class="btn" id="login-btn" name="login_btn" value="Login">
      </div>
    </form>
  </div>
</section>

  <!-- footer that needs work-->
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

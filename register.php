<?php
include ('server/connection.php');
session_start();

if(isset($_SESSION['logged_in'])){
  header('location: index.php');
  exit();
}

if(isset($_POST['register'])){
  
    $Name=$_POST['Name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $confirmPassword=$_POST['confirmPassword'];

  if($password!=$confirmPassword){
        header('location: register.php?error=Passwords do not match');
    }
  else if(strlen($password)<6){
        header('location: register.php?error=Password must be at least 6 characters long');}

  else{
      //check if email already exists
    $stmt1=$conn->prepare("SELECT * FROM users WHERE user_email=?");
    $stmt1->bind_param("s", $email);
    $stmt1->execute();
    $result=$stmt1->get_result();
    $row=$result->fetch_assoc();
    if($row){
        header('location: register.php?error=Email already exists');
    }

    else{
        $stmt=$conn->prepare("INSERT INTO users (user_name, user_email, user_password) VALUES (?,?,?)");
        $stmt->bind_param("sss", $Name, $email, md5($password));
        $stmt->execute();
        $_SESSION['user_email']=$email;
        $_SESSION['user_name']=$Name;
        $_SESSION['logged_in']=true;
        header('location: account.php?registration=Successfully registered');
    }
  }
}


    


?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
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

<!--register-->
<section class="my-5 py-5">
  <div class="container text-center mt-3 pt-5">
    <h2 class="form-weight-bold">Register</h2>
    <hr class="mx-auto">
  </div>
  <div class="mx-auto container">
    <form id="register-form" method="POST" action="register.php">
        <p style="color: red;"><?php if(isset($_GET['error'])){echo $_GET['error'];}?></p>
        <div class="form-group">
            <label >Name</label>
            <input type="text" class="form-control" id="register-Name" name="Name" placeholder="Name" required>
          </div>
      <div class="form-group">
        <label >Email</label>
        <input type="text" class="form-control" id="register-email" name="email" placeholder="Email" required>
      </div>
      <div class="form-group">
        <label >Password</label>
        <input type="password" class="form-control" id="register-password" name="password" placeholder="Password" required>
      </div>

      <div class="form-group">
        <label >Confirm Password</label>
        <input type="password" class="form-control" id="register-confirm-password" name="confirmPassword" placeholder="Password" required>
      </div>


      <div class="form-group">
        <input type="Submit" class="btn" id="login-btn" name="register" value="Register">
      </div>
      <div class="form-group">
        <a id="register-url" class="btn" href="login.php">Already a member ? Log in Now!</a>

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

<?php 
include('../server/connection.php');
session_start();

if(isset($_SESSION['admin_logged_in'])){
  header('location: dashboard.php');
  exit();
}

if(isset($_POST['login_btn'])){
  $email=$_POST['email'];
  $password=$_POST['password'];

  $stmt=$conn->prepare("SELECT * FROM admins WHERE admin_email=? AND admin_password=?");
  $stmt->bind_param("ss", $email, md5($password)); 
  $stmt->execute();
  $result=$stmt->get_result();
  $row=$result->fetch_assoc();
  if($row){
    $_SESSION['admin_email']=$email;
    $_SESSION['admin_name']=$row['admin_name'];
    $_SESSION['admin_id']=$row['admin_id'];
    $_SESSION['admin_logged_in']=true;
    header('location: dashboard.php');
  }
  else{
    header('location: index.php?error=Incorrect email or password');
  }
}
?>
<?php include('../layouts/admin_header.php'); ?>

<body>

<!--login-->
<section class="my-5 py-5">
  <div class="container text-center mt-3 pt-5">
    <h2 class="form-weight-bold">Admin Login</h2>
    <hr class="mx-auto">
  </div>
  <div class="mx-auto container">
    <form id="login-form" action="index.php" method="POST">
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

  
  

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

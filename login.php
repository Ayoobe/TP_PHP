<?php 
session_start();
$pageTitle="Login";

include ('server/connection.php');

if(isset($_SESSION['logged_in'])){
  header('location: index.php');
  exit();
}

if(isset($_POST['login_btn'])){
  $email=$_POST['email'];
  $password=$_POST['password'];

  $stmt=$conn->prepare("SELECT * FROM users WHERE user_email=? AND user_password=?");
  $stmt->bind_param("ss", $email, md5($password));
  $stmt->execute();
  $result=$stmt->get_result();
  $row=$result->fetch_assoc();
  if($row){
    $_SESSION['user_id']=$user_id;
    $_SESSION['user_email']=$email;
    $_SESSION['user_name']=$row['user_name'];
    $_SESSION['user_id']=$row['user_id'];
    $_SESSION['logged_in']=true;
    header('location: index.php');
  }
  else{
    header('location: login.php?error=Incorrect email or password');
  }


}
    



?>





<?php include('layouts/header.php'); ?>

<!--login-->
<section class="my-5 py-5">
  <div class="container text-center mt-3 pt-5">
    <h2 class="form-weight-bold">Login</h2>
    <hr class="mx-auto">
  </div>
  <div class="mx-auto container">
    <form id="login-form" action="login.php" method="POST">
      <p style="color: red" class="text-center"><?php if(isset($_GET['error'])){echo $_GET['error'];} ?></p>
      <div class="form-group">
        <label >Email</label>
        <input type="email" class="form-control" id="login-email" name="email" placeholder="Email" required>
      </div>
      <div class="form-group">
        <label >Password</label>
        <input type="password" class="form-control" id="login-password" name="password" placeholder="Password" required>
      </div>
      <div class="form-group">
        <input type="Submit" class="btn" id="login-btn" name="login_btn" value="login">
      </div>
      <div class="form-group">
        <a id="register-url" class="btn" href="register.php">Not a member ? Sign Up Now!</a>

      </div>

    </form>
  </div>
</section>

<?php include('layouts/footer.php'); ?>
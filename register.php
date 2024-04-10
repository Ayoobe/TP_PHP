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
        $user_id= $stmt->insert_id;

        $_SESSION['user_id']=$user_id;
        $_SESSION['user_email']=$email;
        $_SESSION['user_name']=$Name;
        $_SESSION['logged_in']=true;
        header('location: account.php?registration=Successfully registered');
    }
  }
}


    


?>


<?php include('layouts/header.php'); ?>

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
        <input type="email" class="form-control" id="register-email" name="email" placeholder="Email" required>
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


<?php include('layouts/footer.php'); ?>
  <?php
  session_start();
  include ('../server/connection.php');

  if(isset($_SESSION['admin_logged_in'])){
    header('location: index.php');
    exit();
  }

  if(isset($_POST['login_btn'])){
    $email=$_POST['email'];
    $password=$_POST['password'];

    $stmt=$conn->prepare("SELECT admin_id , admin_name , admin_email, admin_password  FROM admins WHERE admin_email=? AND admin_password=?");
    $stmt->bind_param("ss", $email, md5($password));
    $stmt->execute();
    $result=$stmt->get_result();
    $row=$result->fetch_assoc();
    if($row){
      $_SESSION['admin_email']=$email;
      $_SESSION['admin_name']=$row['admin_name'];
      $_SESSION['admin_id']=$row['admin_id'];
      $_SESSION['admin_logged_in']=true;
      header('location: index.php');
    }
    else{
      header('location: login.php?error=Incorrect email or password');
    }


  }
      



  ?>





  <?php include('header.php'); ?>
  <!--login-->
  <section class="my-5 py-5">
    <div class="container text-center mt-3 pt-5">
      <h2 class="form-weight-bold">Login</h2>
      <hr class="mx-auto">
    </div>
    <div class="mx-auto container">
      <form id="login-form" action="login.php" method="POST" action = "login.php">
        <p style="color: red" class="text-center"><?php if(isset($_GET['error'])){echo $_GET['error'];} ?></p>
        <div class="form-group">
          <label >Email</label>
          <input type="text" class="form-control" id="login-email" name="email" placeholder="Email" required>
        </div>
        <div class="form-group">
          <label >Password</label>
          <input type="password" class="form-control" id="login-password" name="password" placeholder="Password" required>
        </div>
        <div class="form-group">
          <input type="Submit" class="btn" id="login-btn" name="login_btn" value="login">
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

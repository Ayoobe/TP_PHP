<?php  
include('../server/connection.php');
session_start();

// Add user
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_user'])) {
    $admin_name = $_POST['name'];
    $admin_email = $_POST['email'];
    $admin_password = md5($_POST['password']);

    $sql = "INSERT INTO admins (admin_name, admin_email, admin_password) VALUES ('$admin_name', '$admin_email', '$admin_password')";
    if ($conn->query($sql) === TRUE) {
        header('location: manage_users.php?message=Admin added successfully');
        exit(); 
    } 
    else {
        header('location: manage_users.php?error=Error occurred while adding admin: ' . $conn->error);
        exit(); 
    }
}

// Remove user
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['remove_user'])) {
    $admin_id = $_POST['id'];

    $sql = "DELETE FROM admins WHERE admin_id='$admin_id'";
    if ($conn->query($sql) === TRUE) {
        header('location: manage_users.php?message=Admin removed successfully');
        exit(); 
    } 
    else {
        header('location: manage_users.php?error=Error occurred while removing admin: ' . $conn->error);
        exit(); 
    }
}
?>








<?php include('../layouts/admin_header.php'); ?>


<section class="my-5 py-5">
  <div class="container text-center mt-3 pt-5">
  <p class="text-center" style="color:green"><?php if(isset( $_GET['message'])){ echo $_GET['message'];}?></p>
  <p class="text-center" style="color:red"><?php if(isset( $_GET['error'])){ echo $_GET['error'];}?></p>

    <h2 class="form-weight-bold">Admin Manager</h2>
    <hr class="mx-auto">
  </div>
  <div class="mx-auto container">
    <form id="login-form" action="manage_users.php" method="POST">
        <h4>Add admin</h4>
      <p style="color: red" class="text-center"><?php if(isset($_GET['error'])){echo $_GET['error'];} ?></p>
      <div class="form-group">
        <label >Admin Name</label>
        <input type="text" class="form-control" id="login-password" name="name" placeholder="Password" required>
      </div>
      <div class="form-group">
        <label >Email</label>
        <input type="text" class="form-control" id="login-email" name="email" placeholder="Email" required>
      </div>
      <div class="form-group">
        <label >Password</label>
        <input type="password" class="form-control" id="login-password" name="password" placeholder="Password" required>
      </div>
      <div class="form-group">
        <input type="Submit" class="btn" id="login-btn" name="add_user" value="Add Admin">
      </div>

    </form>
<br>
<br>
    <form id="login-form" action="manage_users.php" method="POST">
        <h4>Delete admin</h4>
      <p style="color: red" class="text-center"><?php if(isset($_GET['error'])){echo $_GET['error'];} ?></p>
      <div class="form-group">
        <label >Admin ID</label>
        <input type="text" class="form-control" id="login-password" name="id" placeholder="Password" required>
      </div>
      <div class="form-group">
        <input type="Submit" class="btn" id="login-btn"  name="remove_user" value="Remove Admin">
      </div>

    </form>


  </div>
</section>

<?php include('../layouts/footer.php'); ?>


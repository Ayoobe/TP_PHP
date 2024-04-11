<?php  
include('../server/connection.php');
session_start();



if(!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in']!=true){
    header('location: index.php');
    exit();
}

// Add user
if (isset($_POST['add_user'])) {
    $user_name = $_POST['name'];
    $user_email = $_POST['email'];
    $user_password = md5($_POST['password']);

    $sql = "INSERT INTO users (user_name, user_email, user_password) VALUES ('$user_name', '$user_email', '$user_password')";
    if ($conn->query($sql) === TRUE) {
        header('location: manage_users.php?message=User added successfully');
        exit(); 
    } 
    else {
        header('location: manage_users.php?error=Error occurred while adding admin: ' . $conn->error);
        exit(); 
    }
}

// Remove user
if (isset($_POST['delete'])) {
    $user_id = $_POST['user_id'];

    $sql = "DELETE FROM users WHERE user_id='$user_id'";
    if ($conn->query($sql) === TRUE) {
        header('location: manage_users.php?message=User removed successfully');
        exit(); 
    } 
    else {
        header('location: manage_users.php?error=Error occurred while removing admin: ' . $conn->error);
        exit(); 
    }
}
?>








<?php include('../layouts/admin_header.php'); ?>


<section class="">
  <div class="container text-center ">
  <p class="text-center" style="color:green"><?php if(isset( $_GET['message'])){ echo $_GET['message'];}?></p>
  <p class="text-center" style="color:red"><?php if(isset( $_GET['error'])){ echo $_GET['error'];}?></p>

    <h2 class="form-weight-bold">User Manager</h2>
    <hr class="mx-auto">
  </div>
  <div class="mx-auto container">
    <form id="login-form" action="manage_users.php" method="POST">
        <h4>Add User</h4>
      <p style="color: red" class="text-center"><?php if(isset($_GET['error'])){echo $_GET['error'];} ?></p>
      <div class="form-group">
        <label >User Name</label>
        <input type="text" class="form-control" id="login-password" name="name" placeholder="Password" required>
      </div>
      <div class="form-group">
        <label >Email</label>
        <input type="email" class="form-control" id="login-email" name="email" placeholder="Email" required>
      </div>
      <div class="form-group">
        <label >Password</label>
        <input type="password" class="form-control" id="login-password" name="password" placeholder="Password" required>
      </div>
      <div class="form-group">
        <input type="Submit" class="btn" id="login-btn" name="add_user" value="Add User">
      </div>

    </form>
</section>



<section class="cart container ">
    <div class="container mt-5">  
        <h2 class="font-weight-bold">Existing Users :</h2>  
        <hr class="mx-auto">
    </div>
    <table class="mt-5 pt-5">
        <tr>
            <th>user ID</th>   
            <th>User name</th>   
            <th>User email</th>
            <th>Delete</th>
        </tr>
        
        <?php $sql = "SELECT * FROM users";
            $result = $conn->query($sql);
        while ($user = $result->fetch_assoc()){ ?>


            <tr>
                <td>
                    <div class="event-info">
                        <div>
                            <p> <?php echo $user['user_id']; ?> </p>
                        </div>
                    </div>
                </td>

                <td> 
                <span class="event-price"> <?php echo $user['user_name']; ?> </span>
                </td>

                <td> 
                <span class="event-price"> <?php echo $user['user_email']; ?> </span>
                </td>

                <td>
                  <form method="POST" action="manage_users.php" > 
                    <input type="hidden" value="<?php echo $user['user_id'];?>" name='user_id'>
                    <input class="btn order-details-btn" type="submit" name="delete" value="Delete">
                  </form>
                </td>
            </tr>
    
        <?php } ?>
    </table>
</section>

<?php include('../layouts/footer.php'); ?>


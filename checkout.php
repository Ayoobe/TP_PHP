<?php  
session_start();
$pageTitle="Checkout";


if(!empty($_SESSION['cart']) && isset($_POST['checkout'])){


}
else{
    echo "<script>alert('Cart is empty. Cannot proceed to checkout')</script>";
    echo "<script>window.location='cart.php'</script>";
}



?>

<?php include('layouts/header.php'); ?>




 

<!-- checkout-->

<section class="my-5 py-5">
    <div class="container text-center mt-3 pt-5">
      <h2 class="form-weight-bold">Checkout</h2>
      <hr class="mx-auto">
    </div>
    <div class="mx-auto container">
      <form id="checkout-form" method="POST" action="server/place_order.php">
          <div class="form-group">
              <label >Name</label>
              <input type="text" class="form-control" id="checkout-Name" name="Name" placeholder="Name" required>
            </div>
        <div class="form-group">
          <label >Email</label>
          <input type="email" class="form-control" id="checkout-email" name="email" placeholder="Email" required>
        </div>
        <div class="form-group">
          <label >Phone Number</label>
          <input type="number" class="form-control" id="checkout-phone" name="phone" placeholder="Phone Number" required>
        </div>
  
        <div class="form-group">
          <label >University</label>
          <input type="text" class="form-control" id="checkout-university" name="university" placeholder="University" required>
        </div>
  
  
        <div class="form-group">
          <input type="Submit" class="btn" id="login-btn" name="place_order" value="Place Order">
        </div>  
      </form>
    </div>
  </section>
  





<?php include('layouts/footer.php'); ?>
<?php  
session_start();
$pageTitle="Payment";


if(isset($_POST['order_pay_btn'])){
    $order_status=$_POST['order_status'];
    $order_total=$_POST['order_total'];}

?>


<?php include 'layouts/header.php'; ?>


<!-- checkout-->

<section class="my-5 py-5">
    <div class="container text-center mt-3 pt-5">
      <h2 class="form-weight-bold">Checkout</h2>
      <hr class="mx-auto">
    </div>

    <div class="mx-auto container text-center">
    <?php 
    if (isset($_POST['order_status']) && $_POST['order_status'] == "Unpaid") { 
?>
        <p>Total Payment : <?php echo $_POST['order_total']; ?> TND</p>
        <input class="btn btn-primary" type="submit" value="Pay Now">
<?php 
    } elseif (isset($_SESSION['total']) && $_SESSION['total'] != 0 ){ 
?>
        <p>Total payment: <?php echo $_SESSION['total']; ?> TND</p>
        <input class="btn btn-primary" type="submit" value="Pay Now">
<?php 
    } else { 
?>
        <p>You Have No Orders</p>
<?php 
    } 
?>

</div>

    
  </section>
  






  
<?php include 'layouts/footer.php'; ?>


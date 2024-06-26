<?php
$pageTitle="Order Details";

include ('server/connection.php');

if(isset($_POST['order_id']) && isset($_POST['order_details_btn'])){
    $order_status = $_POST['order_status'];
    $order_id = $_POST['order_id'];
    $stmt = $conn->prepare("SELECT * FROM order_items WHERE order_id = ?");
    $stmt->bind_param("i", $order_id);
    $stmt->execute();
    $orders= $stmt->get_result();
    $order_total=calculate_order_total($orders);
  }

  else{
    header('location: account.php');
    exit();
  }
  
    
  function calculate_order_total($orders) {
    $total = 0;
    foreach($orders as $order ) {
        $total += $order['event_price'];
    }
    
    return $total;
}




?>



<?php include('layouts/header.php'); ?>


<section class="cart container my-5 py-5">
    <div class="container mt-5">  
        <h2 class="font-weight-bold">Order Details</h2>  
        <hr class="mx-auto">
    </div>
    <table class="mt-5 pt-5 mx-auto">
        <tr>
            <th>Event</th>      
            <th>Event Price</th>
            <th>Date Of Order Placement</th>
        </tr>

 
      <?php foreach($orders as $order ) { ?>
            <tr>
                <td>
                    <div class="event-info">
                      <img src="assets/imgs/<?php echo $order["event_image"]; ?>" >
                        <div>
                            <p> <?php echo $order['event_name']; ?> </p>
                        </div>
                    </div>
                </td>

                <td> 
                <span class="event-price"> <?php echo $order['event_price']; ?> TND </span>
                </td>

                <td> 
                <span class="event-price"> <?php echo $order['order_date']; ?> </span>
                </td>
              
            </tr>
              
      <?php } ?>
 
    </table>


    <?php
    if($order_status=="Unpaid"){ ?>
      <form style="float: right" method="POST" action="payment.php">
      <input type="hidden" name="order_total" value="<?php echo $order_total?>">
      <input type="hidden" name="order_status" value="<?php echo $order_status?>">
      <input type="submit" name="order_pay_btn" class="btn btn-pay" value="Pay Now">
    
      </form>


    <?php } ?>
 </section>










 
  
<?php include('layouts/footer.php'); ?>
<?php
session_start();
$pageTitle="My Cart";

if (isset($_POST['add_to_cart'])) {
    if (isset($_SESSION['cart'])) {
        $event_id = $_POST['event_id'];
        $events_array_ids = array_column($_SESSION['cart'], 'event_id');
        if (!in_array($_POST['event_id'], $events_array_ids)) {
            $event_array = array(
                'event_id' => $_POST['event_id'],
                'event_name' => $_POST['event_name'],
                'event_price' => $_POST['event_price'],
                'event_image1' => $_POST['event_image1'],
                'event_datetime' => $_POST['event_datetime'],
            );
            $_SESSION['cart'][$_POST['event_id']] = $event_array;
        } else {
            echo "<script>alert('Event is already added to the cart')</script>";
        }
    } else {
        $event_id = $_POST['event_id'];
        $event_name = $_POST['event_name'];
        $event_price = $_POST['event_price'];
        $event_image1 = $_POST['event_image1'];
        $event_datetime = $_POST['event_datetime'];

        $event_array = array(
            'event_id' => $event_id,
            'event_name' => $event_name,
            'event_price' => $event_price,
            'event_image1' => $event_image1,
            'event_datetime' => $event_datetime,
        );
        $_SESSION['cart'][$event_id] = $event_array;
    }
} else if (isset($_POST['remove_event'])) {
    unset($_SESSION['cart'][$_POST['event_id']]);
}

function calculate_total() {
    $total = 0;
    if(isset($_SESSION['cart'])){
    foreach (  $_SESSION['cart'] as $key => $value) {
        $total += $value['event_price'];
    }}
    return $total;
}

$_SESSION['total']=calculate_total();



?>


<?php include 'layouts/header.php'; ?>


<!-- cart-->
<section class="cart container my-5 py-5">
    <div class="container mt-5">  
        <h2 class="font-weight-bold">Your Cart</h2>  
    </div>
    <table class="mt-5 pt-5">
        <tr>
            <th>Event</th>      
            <th>Price</th>
            <th>Date</th>
        </tr>
        <tr>
          <?php if(isset($_SESSION['cart'])) {foreach($_SESSION['cart'] as $key => $value){ ?>


            <td>
                <div class="event-info">
                    <img src="assets/imgs/<?php echo $value['event_image1'];?> ">
                    <div>
                        <p><?php echo $value['event_name'];?> </p>
                        <form method="POST" action="cart.php">
                        <button type="submit" name="remove_event" class="remove-btn">
                          <i class="fas fa-trash-alt"></i>
                        </button>
                          <input type="hidden" name="event_id" value ="<?php echo $value['event_id'];?>" >
                        </form>
                    </div>
                </div>
            </td>
            <td> 
                <span class="event-price"><?php echo $value['event_price'];?> </span>
                <span>TND</span>
            </td>
            <td>
            <?php
            $datetime = new DateTime($value['event_datetime']);
            $date = $datetime->format('Y-m-d');
            $time = $datetime->format('H:i A');
             echo $date. ' At ' .$time?> 
            </td>
        </tr>
        <?php }} ?>

    </table>
    <div class="cart-total">
        <table>
            <tr>
                <td>
                    Total
                </td>
                <td><?php if(isset($_SESSION['total'])) {echo $_SESSION['total'];}?> TND</td>
            </tr>
        </table>
    </div>




<div class="checkout-container">
  <form method="POST" action="checkout.php">
    <button class="checkout-btn" value="checkout" name="checkout"> Checkout</button>
  </form>
    
</div>

</section>




<?php include 'layouts/footer.php'; ?>
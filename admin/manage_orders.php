<?php  
include('../server/connection.php');
session_start();



if(!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in']!=true){
    header('location: index.php');
    exit();
}



// update order
if (isset($_POST['update'])) {
    $order_id = $_POST['order_id'];

    $sql = "UPDATE orders SET order_status = 'Paid' WHERE order_id = '$order_id';";
    if ($conn->query($sql) === TRUE) {
        header('location: manage_orders.php');

        exit(); 
    } 
    else {
        exit(); 
    }
}
?>


<?php include('../layouts/admin_header.php'); ?>


<section class="cart container ">
    <div class="container mt-5">  
        <h2 class="font-weight-bold">Existing Orders :</h2>  
        <hr class="mx-auto">
    </div>
    <table class="mt-5 pt-5">
        <tr>
            <th>Order ID</th>   
            <th>Order cost</th>   
            <th>Order status</th>
            <th>Buyer's Name</th>
            <th>Buyer's Phone </th>
            <th>Buyer's Email</th>
            <th>Buyer's University</th>
            <th>Order Date</th>
            <th>Status</th>
        </tr>
        
        <?php $sql = "SELECT * FROM orders";
            $result = $conn->query($sql);
        while ($order = $result->fetch_assoc()){ ?>


            <tr>
                <td>
                    <div class="event-info">
                        <div>
                            <p> <?php echo $order['order_id']; ?> </p>
                        </div>
                    </div>
                </td>

                <td> 
                <span class="event-price"> <?php echo $order['order_cost']; ?> </span>
                </td>

                <td> 
                <span class="event-price"> <?php echo $order['order_status']; ?> </span>
                </td>

                <td> 
                <span class="event-price"> <?php echo $order['user_name']; ?> </span>
                </td>

                <td> 
                <span class="event-price"> <?php echo $order['user_phone']; ?> </span>
                </td>

                <td> 
                <span class="event-price"> <?php echo $order['user_email']; ?> </span>
                </td>

                <td> 
                <span class="event-price"> <?php echo $order['user_university']; ?> </span>
                </td>

                <td> 
                <span class="event-price"> <?php echo $order['order_date']; ?> </span>
                </td>
                

                <td>
                  <form method="POST" action="manage_orders.php" > 
                    <input type="hidden" value="<?php echo $order['order_id'];?>" name='order_id'>
                    <input class="btn order-details-btn" type="submit" name="update" value="Set as paid">
                  </form>
                </td>
            </tr>
    
        <?php } ?>
    </table>
</section>

<?php include('../layouts/footer.php'); ?>


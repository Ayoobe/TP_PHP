<?php
 session_start();
 include ('connection.php');

if(isset($_POST['place_order'])){
   
    //getting user information
    $Name=$_POST['Name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $university=$_POST['university'];
    $total=$_SESSION['total'];
    $order_status="on_hold";
    $order_date=date('Y-m-d H:i:s');
    $user_id=$_SESSION['user_id'];
    //inserting order into orders table
    $stmt=$conn->prepare("INSERT INTO orders (user_id, user_name, user_email, user_phone, user_university, order_cost, order_status, order_date) VALUES (?,?,?,?,?,?,?,?)");
    $stmt->bind_param("issssdss", $user_id, $Name, $email, $phone, $university, $total, $order_status, $order_date);
    $stmt->execute();
    $order_id=$stmt->insert_id;   

    //getting events from cart
    foreach($_SESSION['cart'] as $key => $value){
        $event_name=$value['event_name'];
        $event_price=$value['event_price'];
        $event_image=$value['event_image1'];
        $event_id=$value['event_id'];
    //updating order_items table
        $stmt=$conn->prepare("INSERT INTO order_items (order_id, event_id, event_name, event_price, event_image,user_id,order_date) VALUES (?,?,?,?,?,?,?)");
        $stmt->bind_param("iisdsis", $order_id, $event_id, $event_name, $event_price, $event_image, $user_id, $order_date);
        $stmt->execute();



   

        
}
    //remove event from cart
    //unset($_SESSION['cart']);
    //$_SESSION['total']=0;

    //redirect to success page
    header('location: ../payment.php?order_status=Order placed successfully');

}
?>
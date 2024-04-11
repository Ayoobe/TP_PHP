<?php
session_start();
if($_SESSION['admin_logged_in']!=true){
    header('location: index.php');
    exit();
}?>

<?php include('../layouts/admin_header.php'); ?>


    <!-- Admin Dashboard Content -->
    <div class="container mt-5">
        <h2>Welcome, Admin!</h2>
        <p>Please select an option from below to manage your business :</p>
        <div class="list-group">
            <a href="manage_users.php" class="list-group-item list-group-item-action">Manage Users</a>
            <a href="manage_admins.php" class="list-group-item list-group-item-action">Manage Admins</a>
            <a href="manage_events.php" class="list-group-item list-group-item-action">Manage Events</a>
            <a href="manage_orders.php" class="list-group-item list-group-item-action">Manage Orders</a>

        </div>
    </div>
    <br><br><br><br><br><br>
    

<?php include('../layouts/footer.php'); ?>

<?php
// Database connection
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "your_database";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Add admin
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_admin'])) {
    $admin_name = $_POST['admin_name'];
    $admin_email = $_POST['admin_email'];
    $admin_password = $_POST['admin_password'];

    $sql = "INSERT INTO admin (admin_name, admin_email, admin_password) VALUES ('$admin_name', '$admin_email', '$admin_password')";
    if ($conn->query($sql) === TRUE) {
        echo "Admin added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Remove admin
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['remove_admin'])) {
    $admin_id = $_POST['admin_id'];

    $sql = "DELETE FROM admin WHERE admin_id='$admin_id'";
    if ($conn->query($sql) === TRUE) {
        echo "Admin removed successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Admin Accounts</title>
</head>
<body>
    <h2>Add Admin</h2>
    <form method="post" action="">
        <input type="text" name="admin_name" placeholder="Admin Name" required><br>
        <input type="email" name="admin_email" placeholder="Admin Email" required><br>
        <input type="password" name="admin_password" placeholder="Admin Password" required><br>
        <input type="submit" name="add_admin" value="Add Admin">
    </form>

    <h2>Remove Admin</h2>
    <form method="post" action="">
        <input type="text" name="admin_id" placeholder="Admin ID to remove" required><br>
        <input type="submit" name="remove_admin" value="Remove Admin">
    </form>
</body>
</html>

<?php
// Close connection
$conn->close();
?>

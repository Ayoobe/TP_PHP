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

// Add user
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_user'])) {
    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO users (user_name, user_email, password) VALUES ('$user_name', '$user_email', '$password')";
    if ($conn->query($sql) === TRUE) {
        echo "User added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Remove user
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['remove_user'])) {
    $user_id = $_POST['user_id'];

    $sql = "DELETE FROM users WHERE user_id='$user_id'";
    if ($conn->query($sql) === TRUE) {
        echo "User removed successfully";
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
    <title>Manage User Accounts</title>
</head>
<body>
    <h2>Add User</h2>
    <form method="post" action="">
        <input type="text" name="user_name" placeholder="Username" required><br>
        <input type="email" name="user_email" placeholder="Email" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <input type="submit" name="add_user" value="Add User">
    </form>

    <h2>Remove User</h2>
    <form method="post" action="">
        <input type="text" name="user_id" placeholder="User ID to remove" required><br>
        <input type="submit" name="remove_user" value="Remove User">
    </form>
</body>
</html>

<?php
// Close connection
$conn->close();
?>

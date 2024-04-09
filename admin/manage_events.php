<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Events</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        h2 {
            margin-top: 30px;
        }
        form {
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .event-row:hover {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Add Event</h2>
    <form method="post" action="">
        <label for="event_price">Event Price:</label><br>
        <input type="number" id="event_price" name="event_price" required step="0.01"><br>
        <label for="event_name">Event Name:</label><br>
        <input type="text" id="event_name" name="event_name" required><br>
        <label for="event_description">Event Description:</label><br>
        <textarea id="event_description" name="event_description" required></textarea><br>
        <label for="event_category">Event Category:</label><br>
        <input type="text" id="event_category" name="event_category" required><br>
        <label for="event_datetime">Event Date and Time:</label><br>
        <input type="datetime-local" id="event_datetime" name="event_datetime" required><br>
        <label for="event_image1">Event Image 1 URL:</label><br>
        <input type="text" id="event_image1" name="event_image1" required><br>
        <label for="event_image2">Event Image 2 URL:</label><br>
        <input type="text" id="event_image2" name="event_image2" required><br>
        <label for="event_image3">Event Image 3 URL:</label><br>
        <input type="text" id="event_image3" name="event_image3"><br>
        <label for="event_image4">Event Image 4 URL:</label><br>
        <input type="text" id="event_image4" name="event_image4"><br>
        <input type="submit" name="add_event" value="Add Event">
    </form>

    <h2>Existing Events</h2>
    <table>
        <thead>
            <tr>
                <th>Event ID</th>
                <th>Event Name</th>
                <th>Event Description</th>
                <th>Event Category</th>
                <th>Event Date and Time</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Fetch existing events from the database and display them in the table
            $conn = new mysqli("localhost", "username", "password", "your_database");
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $sql = "SELECT * FROM events";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr class='event-row'>";
                    echo "<td>" . $row["event_id"] . "</td>";
                    echo "<td>" . $row["event_name"] . "</td>";
                    echo "<td>" . $row["event_description"] . "</td>";
                    echo "<td>" . $row["event_category"] . "</td>";
                    echo "<td>" . $row["event_datetime"] . "</td>";
                    echo "<td>";
                    echo "<a href='edit_event.php?event_id=" . $row["event_id"] . "'>Edit</a> | ";
                    echo "<a href='delete_event.php?event_id=" . $row["event_id"] . "' onclick='return confirm(\"Are you sure you want to delete this event?\")'>Delete</a>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No events found</td></tr>";
            }
            $conn->close();
            ?>
        </tbody>
    </table>
</body>
</html>

<?php
// Handle form submission to add event
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_event'])) {
    $conn = new mysqli("localhost", "username", "password", "your_database");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $event_price = $_POST['event_price'];
    $event_name = $_POST['event_name'];
    $event_description = $_POST['event_description'];
    $event_category = $_POST['event_category'];
    $event_datetime = $_POST['event_datetime'];
    $event_image1 = $_POST['event_image1'];
    $event_image2 = $_POST['event_image2'];
    $event_image3 = $_POST['event_image3'];
    $event_image4 = $_POST['event_image4'];

    $sql = "INSERT INTO events (event_price, event_name, event_description, event_category, event_datetime, event_image1, event_image2, event_image3, event_image4) 
            VALUES ('$event_price', '$event_name', '$event_description', '$event_category', '$event_datetime', '$event_image1', '$event_image2', '$event_image3', '$event_image4')";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Event added successfully');</script>";
    } else {
        echo "<script>alert('Error adding event: " . $conn->error . "');</script>";
    }
    $conn->close();
}
?>

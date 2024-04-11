<?php 
include('../layouts/admin_header.php'); 
include('../server/connection.php');
session_start();


if(!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in']!=true){
    header('location: index.php');
    exit();
}


if(isset($_POST['event_id']) && isset($_POST['delete_btn'])){
    $event_id = $_POST['event_id'];
    $stmt = $conn->prepare("DELETE FROM events WHERE event_id = ?");
    $stmt->bind_param("i", $event_id);
    $stmt->execute();
}

if(isset($_POST["add_event"]) ){
    $event_name = $_POST["name"];
    $event_description = $_POST["description"];
    $event_summary = $_POST["summary"];
    $event_category = $_POST["category"];
    $event_price = $_POST["price"];
    $event_datetime = $_POST["datetime"];
    
    // File upload handling
    $targetDir = "../assets/imgs/";

    $event_image1 = basename($_FILES["image1"]["name"]);
    $event_image2 = basename($_FILES["image2"]["name"]);
    $event_image3 = basename($_FILES["image3"]["name"]);
    $event_image4 = basename($_FILES["image4"]["name"]);

   

    // Upload files to server
    if(move_uploaded_file($_FILES["image1"]["tmp_name"], $targetDir . $event_image1) &&
       move_uploaded_file($_FILES["image2"]["tmp_name"], $targetDir . $event_image2) &&
       move_uploaded_file($_FILES["image3"]["tmp_name"], $targetDir . $event_image3) &&
       move_uploaded_file($_FILES["image4"]["tmp_name"], $targetDir . $event_image4)) {

        $stmt = $conn->prepare("INSERT INTO events (event_name, event_description, event_sum, event_category, event_price, event_datetime, event_image1, event_image2, event_image3, event_image4) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssdsssss", $event_name, $event_description, $event_summary, $event_category, $event_price, $event_datetime, $event_image1, $event_image2, $event_image3, $event_image4);
        $stmt->execute();
        $stmt->close();
        echo "<script>alert('Event added successfully');</script>";
        header("Location: manage_events.php");
        exit();
    } else {
        echo "<script>alert('Error uploading one or more images.');</script>";
    }
}
?>

<div class="mx-auto container">
    <h2 class="mt-5">Add Event</h2>
    <form id="add-event-form" action="manage_events.php" method="POST" enctype="multipart/form-data">
        
        <!-- Form fields for event details -->
        
        <div class="form-group add-small-element">
            <label>Event Name</label>
            <input type="text" class="form-control" name="name" placeholder="Event Name" required>
        </div>
        <div class="form-group add-small-element">
            <label>Event Description</label>
            <input type="text" class="form-control" name="description" placeholder="Event Description" required>
        </div>
        <div class="form-group add-small-element">
            <label>Event Summary</label>
            <input type="text" class="form-control" name="summary" placeholder="Event Summary" required>
        </div>
        <div class="form-group add-small-element">
            <label>Event Category</label>
            <select class="form-control" name="category" required>
                <option value="">Select Category</option>
                <option value="hackathon">Hackathon</option>
                <option value="congress">Congress</option>
                <option value="contest">Contest</option>
                <option value="workshop">Workshop</option>
            </select>
        </div>
        <div class="form-group add-small-element">
            <label>Event Price</label>
            <input type="number" class="form-control" name="price" placeholder="Event Price" step="0.01" required>
        </div>
        <div class="form-group add-small-element">
            <label>Event Datetime</label>
            <input type="datetime-local" class="form-control" name="datetime" placeholder="Event Datetime" required>
        </div>
        <div class="form-group add-xs-element">
            <label>1st Image</label>
            <input type="file" class="form-control" name="image1" required>
        </div>
        <div class="form-group add-xs-element">
            <label>2nd Image</label>
            <input type="file" class="form-control" name="image2" required>
        </div>
        <div class="form-group add-xs-element">
            <label>3rd Image</label>
            <input type="file" class="form-control" name="image3" required>
        </div>
        <div class="form-group add-xs-element">
            <label>4th Image</label>
            <input type="file" class="form-control" name="image4" required>
        </div>
        <div class="form-group">
            <input type="submit" class="btn" id="login-btn" name="add_event" value="Add Event">
        </div>
    </form>
</div>

<section class="cart container my-5 py-5">
    <div class="container mt-5">  
        <h2 class="font-weight-bold">Existing events :</h2>  
        <hr class="mx-auto">
    </div>
    <table class="mt-5 pt-5">
        <tr>
            <th>Event ID</th>   
            <th>Event image</th>   
            <th>Event name</th>
            <th>Event description</th>
            <th>Event category</th>
            <th>Event Datetime</th>
            <th>Event Price</th>
            <th>Edit Details</th>
        </tr>
        
        <?php $sql = "SELECT * FROM events";
            $result = $conn->query($sql);
        while ($event = $result->fetch_assoc()){ ?>


            <tr>
                <td>
                    <div class="event-info">
                        <div>
                            <p> <?php echo $event['event_id']; ?> </p>
                        </div>
                    </div>
                </td>

                <td> 
                <span class="event-price"> <img src="../assets/imgs/<?php echo $event['event_image1']; ?>" alt=""> </span>
                </td>

                <td> 
                <span class="event-price"> <?php echo $event['event_name']; ?> </span>
                </td>

                <td> 
                <span class="event-price"> <?php echo $event['event_description']; ?> </span>
                </td>

                <td> 
                <span class="event-price"> <?php echo $event['event_category']; ?> </span>
                </td>
                <td> 
                <span class="event-price"> <?php echo $event['event_datetime']; ?> </span>
                </td>
                <td> 
                <span class="event-price"> <?php echo $event['event_price']; ?> </span>
                </td>

                <td>
                  <form method="POST" action="manage_events.php" > 
                    <input type="hidden" value="<?php echo $event['event_id'];?>" name='event_id'>
                    <input name ="delete_btn" class="btn order-details-btn" type="submit" value="Delete">
                  </form>
                </td>
            </tr>
    
        <?php } ?>
    </table>
</section>

<?php include('../layouts/footer.php'); ?>

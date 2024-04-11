<?php

include ('server/connection.php');

if(isset($_GET['event_id'])) {

    $event_id = $_GET['event_id'];
    $stmt = $conn->prepare("SELECT * FROM events WHERE event_id = ?");
    $stmt->bind_param("i", $event_id);
    $stmt->execute();
    $event = $stmt->get_result();
}
else {
    header('Location: index.php');
}
$pageTitle="Reserve Now";

?>

<?php include('layouts/header.php'); ?>


<section class="container single-event my-5 pt-5">
    <div class="row mt-5">

    <?php while($row = $event->fetch_assoc()){?>
     

        <div class="col-lg-5 col-md-5 col-sm-12">
            <img class="img-fluid w-100 pb-1" src="assets/imgs/<?php echo $row ['event_image1']; ?>" id="mainImg">
            <div class="small-img-group">
                <div class="small-img-col">
                    <img src="assets/imgs/<?php echo $row ['event_image1']; ?>" width="100%" class="small-img" >
                </div>
                <div class="small-img-col">
                    <img src="assets/imgs/<?php echo $row ['event_image2']; ?>" width="100%" class="small-img" >
                </div>
                <div class="small-img-col">
                    <img src="assets/imgs/<?php echo $row ['event_image3']; ?>" width="100%" class="small-img" >
                </div>
                <div class="small-img-col">
                    <img src="assets/imgs/<?php echo $row ['event_image4']; ?>" width="100%" class="small-img" >
                </div>
            </div>
        </div>

     

        <div class="col-lg-6 col-md-6 col-sm-12">
            <h2> <?php echo $row['event_name'] ?></h2>
            <h3 class="py-4"> <?php echo $row['event_category'] ?></h3>
            <h3> <?php echo $row['event_price'] ?> TND </h3>

            <form method="POST" action="cart.php" >
              <input type="hidden" name="event_id" value="<?php echo $row ['event_id']; ?>">
              <input type="hidden" name="event_image1" value="<?php echo $row ['event_image1']; ?>">
              <input type="hidden" name="event_name" value="<?php echo $row ['event_name']; ?>">
              <input type="hidden" name="event_price" value="<?php echo $row ['event_price']; ?>">
              <input type="hidden" name="event_datetime" value="<?php echo $row ['event_datetime']; ?>">
              <button type="submit" name="add_to_cart">Add To Cart</button>

            </form>

            <h4 class="mt-5">Event description</h4>
            <span><?php echo $row['event_description'] ?></span>

        </div>
      
        <?php } ?>
    </div>

      
</section>



<script>
    var mainImg = document.getElementById("mainImg");
    var smallImg = document.getElementsByClassName("small-img");
for(let i = 0; i < smallImg.length; i++) {
    smallImg[i].onclick = function() {
        mainImg.src = smallImg[i].src;
    }
}
</script>
<?php include('layouts/footer.php'); ?>
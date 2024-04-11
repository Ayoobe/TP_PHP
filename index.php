<?php include('layouts/header.php'); 

 include ('server/get_featured_events.php');

//setting up the database  for first time server setup
$sql = "SHOW DATABASES LIKE 'tp_php'";
$result = $conn->query($sql);

if ($result->num_rows === 0) {
    $sqlScript = file_get_contents('server/table.sql');

    if ($conn->multi_query($sqlScript)) {
        echo "Script executed successfully.";
    } else {
        echo "Error executing script: " . $conn->error;
    }
} 

?>

  <!-- start of home section -->

  <section id="home">
    <div class="container">
       <div class="mycontainer">
        <h4>NEW EVENTS!</h4>
        <h1>For the <span>BRIGHTEST</span> students!</h1>
        <p>You came to the right place</p>
        <a href="reserve.php"><button id="btn1">Reserve Now!</button></a>
        </div>
    </div>
   
  </section>

  <!--clubs-->
<section id="clubs" class="container">
    <div class="row">
        <img class="img-fluid col-lg3 col-md-3 col-sm-12" src="assets/imgs/club1.jpg" >
        <img class="img-fluid col-lg3 col-md-3 col-sm-12" src="assets/imgs/club2.jpg"  >
        <img class="img-fluid col-lg3 col-md-3 col-sm-12" src="assets/imgs/club3.jpg" >
        <img class="img-fluid col-lg3 col-md-3 col-sm-12" src="assets/imgs/club4.png" >
    </div>
</section>

<!-- new section-->
<section id="new" class="w-100">
    <div class="row p-0 m-0" >

        <!-- 1-->
        <div class="one col-lg-4 col-md-4 col-sm-12 p-0">
            <img class="img-fluid" src="assets/imgs/workshop.png">
            <div class="details">
                <h3>Discover Amazing Workshops!</h3>
                <a href="reserve.php?category=workshop&min_price=0&max_price=500&search=Search"><button class="text-uppercase">Join Now</button></a>

            </div>
        </div>
        <!-- 2-->
        <div class="one col-lg-4 col-md-4 col-sm-12 p-0">
            <img class="img-fluid" src="assets/imgs/hackathons.png">
            <div class="details">
                <h3>Compete In Hackathons!</h3>
                <a href="reserve.php?category=hackathon&min_price=0&max_price=500&search=Search"><button class="text-uppercase">Join Now</button></a>

            </div>
        </div>
        <!-- 3-->
        <div class="one col-lg-4 col-md-4 col-sm-12 p-0">
            <img class="img-fluid" src="assets/imgs/friends.jpg">

            <div class="details">
                <h3>Make New Friends!</h3>
                <a href="reserve.php"><button class="text-uppercase">Join Now</button></a>
            </div>
        </div>
    </div>
    
</section>

<!-- featured-->
<section id="featured" class="my-5 pb-5">
    <div class="container text-center mt-5 py-5">
        <h3> Our Featured Events</h3>
        <hr>
        <p>A vast array of enticing activities, hectic contests, and amazing networking opportunities is awaiting you!  </p>
        <p>So check out our featured events below now!  </p>
    </div>

    <div class="row mx-auto text-center container-fluid">


    <?php while($row = $featured_events->fetch_assoc()) { ?>
        <div class="myevent text-center col-lg-4 col-md-4 col-sm-12">
        <a href="<?php echo "single-event.php?event_id=".$row['event_id']; ?>"><img class="img-fluid mb-3" src="assets/imgs/<?php echo $row ['event_image1']; ?> "/></a>
            <h4 class="p-name"> <?php echo $row['event_name'] ?></h4>


            <?php
            $datetime = new DateTime($row['event_datetime']);
            $date = $datetime->format('Y-m-d');
            $time = $datetime->format('H:i A');
            ?>

            <h5 class="p-info"><?php echo $date ?></h5>
            <h5 class="p-info">At <?php echo $time ?></h5>
        </div>

     <?php } ?>   
    </div>
</section>

<?php include('layouts/footer.php'); ?>
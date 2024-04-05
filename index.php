<?php include('layouts/header.php'); ?>

  <!-- start of home section -->

  <section id="home">
    <div class="container">
       
        <h4>NEW EVENTS!</h4>
        <h1>For the <span>brightest</span> students!</h1>
        <p>You came to the right place</p>
        <button id="btn1">Reserve Now!</button>
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
            <img class="img-fluid" src="assets/imgs/club4.png">
            <div class="details">
                <h3>Discover Amazing Workshops!</h3>
                <button class="text-uppercase"> Join Now</button>

            </div>
        </div>
        <!-- 2-->
        <div class="one col-lg-4 col-md-4 col-sm-12 p-0">
            <img class="img-fluid" src="assets/imgs/club4.png">
            <div class="details">
                <h3>Compete In Hackathons!</h3>
                <button class="text-uppercase"> Join Now</button>

            </div>
        </div>
        <!-- 3-->
        <div class="one col-lg-4 col-md-4 col-sm-12 p-0">
            <img class="img-fluid" src="assets/imgs/club4.png">
            <div class="details">
                <h3>Make New Friends!</h3>
                <button class="text-uppercase"> Join Now</button>
            </div>
        </div>
    </div>
    
</section>

<!-- featured-->
<section id="featured" class="my-5 pb-5">
    <div class="container text-center mt-5 py-5">
        <h3> Our Featured Events:</h3>
        <hr>
        <p>Featured paragraph text : to complete later</p>
    </div>

    <div class="row mx-auto text-center container-fluid">

    <?php  include ('server/get_featured_events.php'); ?>

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
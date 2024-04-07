<?php
include ('server/connection.php');

if(isset($_GET['search'])) {
  $category = $_GET['category'];
  $min_price = isset($_GET['min_price']) ? $_GET['min_price'] : 0;
  $max_price = isset($_GET['max_price']) ? $_GET['max_price'] : 500;

  if ($category === 'all') {
    $stmt = $conn->prepare("SELECT * FROM events WHERE event_price BETWEEN ? AND ?");
    $stmt->bind_param("ii", $min_price, $max_price);
    $stmt->execute();
    $events = $stmt->get_result();
  } else {
    $stmt = $conn->prepare("SELECT * FROM events WHERE event_category = ? AND event_price BETWEEN ? AND ?");
    $stmt->bind_param("sii", $category, $min_price, $max_price);
    $stmt->execute();
    $events = $stmt->get_result();
  }
} else {
  $stmt = $conn->prepare("SELECT * FROM events");
  $stmt->execute();
  $events = $stmt->get_result(); 
}
?>

<?php include('layouts/header.php'); ?>

  <div class="container-fluid">
    <div class="row">
    
      <!-- Filters section -->
      <div class="col-lg-3">
        <section class="my-5 py-5 ms-2">
          <div class="mt-5 py-5">
            <p>Search Products</p>
            <hr>
          </div>
          <form action="reserve.php" method="GET" >
            <div class="row mx-auto container">
              <div class="col-lg-12 col-md-12">
                <p>Category</p>
                <div class="form-check">
                  <input class="form-check-input" value="all" type="radio" name="category" id="category_all"   <?php if(!isset($_GET['category']) || (isset($_GET['category']) && $_GET['category'] == 'all')) echo 'checked'; ?>>
                  <label class="form-check-label" for="category_all">All</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" value="hackathon" type="radio" name="category" id="category_one"   <?php if(isset($_GET['category']) && $_GET['category'] == 'hackathon') echo 'checked'; ?>>
                  <label class="form-check-label" for="category_one">Hackathon</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" value="workshop" type="radio" name="category" id="category_two"  <?php if(isset($_GET['category']) && $_GET['category'] == 'workshop') echo 'checked'; ?>>
                  <label class="form-check-label" for="category_two">Workshop</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" value="congress" type="radio" name="category" id="category_three"  <?php if(isset($_GET['category']) && $_GET['category'] == 'congress') echo 'checked'; ?>>
                  <label class="form-check-label" for="category_three">Congress</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" value="contest" type="radio" name="category" id="category_four"  <?php if(isset($_GET['category']) && $_GET['category'] == 'contest') echo 'checked'; ?>>
                  <label class="form-check-label" for="category_four">Contest</label>
                </div>
              </div>
            </div>
            <div class="row mx-auto container mt-5">
              <div class="col-lg-12 col-md-12 col-sm-12">
                <p>Price</p>
                <div id="price-slider"></div>
                <div class="w-50 ">
                  <span style="float: left;" id="min-price"></span>
                  <span style="float: right;" id="max-price"></span>
                  <input type="hidden" name="min_price" id="min-price-input" value="<?php echo isset($_GET['min_price']) ? $_GET['min_price'] : 0; ?>">
                  <input type="hidden" name="max_price" id="max-price-input" value="<?php echo isset($_GET['max_price']) ? $_GET['max_price'] : 500; ?>">
                </div>
              </div>
            </div>
            <div class="form-group my-3 mx-3">
              <input type="submit" name="search" value="Search" id="search-btn">
            </div>
          </form>
        </section>
      </div>

      <!-- Events -->
      <div class="col-lg-9">
        <section id="featured" class="my-5 pb-5">
          <div class="container text-center mt-5 py-5">
            <h3> Our Featured Events:</h3>
            <hr>
            <p>A vast array of workshops, hackathons, congresses and contests for the bright students of INSAT.</p>
          </div>
          <div class="row mx-auto text-center container-fluid">
            <?php while ($event = $events->fetch_assoc()) { ?>
            <div class="myevent text-center col-lg-4 col-md-4 col-sm-12">
              <img class="img-fluid mb-3" src="assets/imgs/<?php echo $event['event_image1'] ?>" style="height: 200px;">
              <div class="event-infos">
                <h4 class="p-name"><?php echo $event['event_name'] ?></h4>
                <h5 class="p-info"><?php echo $event['event_sum'] ?></h5>
                <h5 class="p-price"><?php echo $event['event_price'] ?> TND</h5>
                <a class="res-button" href="single-event.php?event_id=<?php echo $event['event_id'] ?>">Register Now</a>
              </div>
            </div>
            <?php } ?>
          </div>
        </section>
      </div>

    </div>
  </div>

  <script>
  $(function() {
    $("#price-slider").slider({
      range: true,
      min: 0,
      max: 500,
      values: [<?php echo isset($_GET['min_price']) ? $_GET['min_price'] : 0; ?>, <?php echo isset($_GET['max_price']) ? $_GET['max_price'] : 500; ?>],
      slide: function(event, ui) {
        $("#min-price").text(ui.values[0]);
        $("#max-price").text(ui.values[1]);
        $("#min-price-input").val(ui.values[0]);
        $("#max-price-input").val(ui.values[1]);
      }
    });
    $("#min-price").text($("#price-slider").slider("values", 0));
    $("#max-price").text($("#price-slider").slider("values", 1));
  });
  </script>

 <?php include('layouts/footer.php'); ?>
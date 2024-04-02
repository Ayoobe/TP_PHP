<?php
include ('server/connection.php');

if(isset($_GET['search'])) {
  $category = $_GET['category'];
  $min_price = isset($_GET['min_price']) ? $_GET['min_price'] : 0;
  $max_price = isset($_GET['max_price']) ? $_GET['max_price'] : 500;

  $stmt = $conn->prepare("SELECT * FROM events WHERE event_category = ? AND event_price BETWEEN ? AND ?");
  $stmt->bind_param("sii", $category, $min_price, $max_price);
  $stmt->execute();
  $events = $stmt->get_result();
} else {
  $stmt = $conn->prepare("SELECT * FROM events");
  $stmt->execute();
  $events = $stmt->get_result(); 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Events</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
</head>
<body>
  <!-- start of navbar-->
  <nav class="navbar navbar-expand-lg navbar-light bg-white py-3 fixed-top">
    <div class="container">
      <img src="assets/imgs/logo.jpg" >
      <a class="navbar-brand" href="index.html">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse nav-buttons" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="reserve.html">Reserve</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.html">Contact</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="account.html">
              <i class="fas fa-user"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="cart.html">
              <i class="fas fa-shopping-cart"></i>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- end of navbar-->

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
                <div class="w-50">
                  <span style="float: left;" id="min-price"></span>
                  <span style="float: right;" id="max-price"></span>
                  <input type="hidden" name="min_price" id="min-price-input" value="<?php echo isset($_GET['min_price']) ? $_GET['min_price'] : 0; ?>">
                  <input type="hidden" name="max_price" id="max-price-input" value="<?php echo isset($_GET['max_price']) ? $_GET['max_price'] : 500; ?>">
                </div>
              </div>
            </div>
            <div class="form-group my-3 mx-3">
              <input type="submit" name="search" value="Search" class="btn btn-primary">
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
            <p>Featured paragraph text : to complete later</p>
          </div>
          <div class="row mx-auto text-center container-fluid">
            <?php while ($event = $events->fetch_assoc()) { ?>
            <div class="myevent text-center col-lg-4 col-md-4 col-sm-12">
              <img class="img-fluid mb-3" src="assets/imgs/<?php echo $event['event_image1'] ?>" style="height: 200px;">
              <div class="event-infos">
                <h4 class="p-name"><?php echo $event['event_name'] ?></h4>
                <h5 class="p-info">Mini details to add to db later</h5>
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

  <!--footer (still needs work)-->
  <footer class="mt-5 py-5">
    <div class="container mx-auto">
      <div class="row">
        <div class="footer-one col-lg-3 col-md-3 col-sm-12">
          <img src="assets/img/logo.jpeg" />
          <p class="pt-3">We host the best events that are out there</p>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12">
          <h5 class="pb-2">Follow Us</h5>
          <ul class="list-unstyled d-flex social-icons">
            <li class="ms-3">
              <a href="#"><i class="fab fa-facebook-f"></i></a>
            </li>
            <li class="ms-3">
              <a href="#"><i class="fab fa-twitter"></i></a>
            </li>
            <li class="ms-3">
              <a href="#"><i class="fab fa-instagram"></i></a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>

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
    // Display initial values
    $("#min-price").text($("#price-slider").slider("values", 0));
    $("#max-price").text($("#price-slider").slider("values", 1));
  });
  </script>
</body>
</html>

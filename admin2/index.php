<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-white py-3 fixed-top">
    <div class="container">
      <img src="assets/imgs/logo.jpg">
      <a class="navbar-brand" href="admin_dashboard.php">Admin Dashboard</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse nav-buttons" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <!-- Add navbar items if needed -->
        </ul>
      </div>
    </div>
  </nav>

  <!-- Main content area -->
  <section id="admin-dashboard" style="padding-top: 100px;">
    <div class="container mt-5">
      <div class="row">
        <div class="col-lg-3">
          <!-- Sidebar -->
          <div class="sidebar">
            <ul class="list-unstyled">
              <li><a href="#">Dashboard</a></li>
              <li><a href="manage_events.php">Manage Events</a></li>
              <li><a href="manage_accounts.php">Manage Accounts</a></li>
              <li><a href="add_admin.php">Add Admin Accounts</a></li>
              <!-- Add more sidebar items as needed -->
            </ul>
          </div>
        </div>
        <div class="col-lg-9">
          <!-- Main content -->
          <h1>Welcome to Admin Dashboard</h1>
          <!-- Add your admin dashboard content here -->
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="mt-5 py-5">
    <div class="container mx-auto">
      <!-- Footer content -->
    </div>
  </footer>

  <!-- Bootstrap JavaScript Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

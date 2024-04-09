

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        /* Custom CSS for subtle red accents */
        .navbar-light .navbar-nav .nav-link {
            color: #000;
        }

        .navbar-light .navbar-nav .nav-link:hover,
        .navbar i:hover,
        .navbar-light .navbar-nav .nav-link.active,
        .navbar i:hover {
            color: #fa2e2e;
        }

        .list-group-item {
            background-color: #f8f9fa;
            border-color: #fa2e2e;
            color: #000;
        }

        .list-group-item:hover {
            background-color: #fa2e2e;
            color: #fff;
        }

        footer {
            background-color: #f8f9fa;
            color: #000;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <!-- Admin Dashboard Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <img src="assets/imgs/logo.jpg" alt="Logo" class="navbar-brand">
            <a class="navbar-brand" href="#">Admin Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="manage_users.php">Manage Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="manage_admins.php">Manage Admins</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="analytics.php">Analytics Page</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="manage_events.php">Manage events</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-user"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-shopping-cart"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Admin Dashboard Content -->
    <div class="container mt-5">
        <h2>Welcome, Admin!</h2>
        <p>Please select an option from below to manage your business:</p>
        <div class="list-group">
            <a href="manage_users.php" class="list-group-item list-group-item-action">Manage Users</a>
            <a href="manage_admins.php" class="list-group-item list-group-item-action">Manage Admins</a>
            <a href="manage_events.php" class="list-group-item list-group-item-action">Manage Events</a>
            <a href="analytics.php" class="list-group-item list-group-item-action">Analytics</a>
        </div>
    </div>

    <footer class="mt-5 py-5 bg-dark text-light">
    <div class="container mx-auto">
        <div class="row">
            <div class="footer-one col-lg-3 col-md-3 col-sm-12">
                <img src="assets/img/logo.jpeg" alt="Logo">
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



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

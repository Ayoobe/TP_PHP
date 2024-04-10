
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Include Font Awesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet">
    <!-- Include custom CSS files -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/contact-style.css"> <!-- Separate CSS file for contact page -->
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white py-3 fixed-top">
        <!-- Navbar content -->
    </nav>

    <!-- Contact Section -->
    <section id="contact" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <h2 class="text-center mb-4">Contact Us</h2>
                    <!-- Display success message if submitted -->
                    <?php if(isset($_GET['success']) && $_GET['success'] == 'true'): ?>
                        <div class="alert alert-success" role="alert">
                            Thank you for contacting us! We'll get back to you shortly.
                        </div>
                    <?php endif; ?>
                    <!-- Contact Form -->
                    <form class="contact-form" action="send-email.php" method="post" >
                        <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['csrf_token'] ?? ''); ?>">
                        <div class="mb-3">
                            <label for="name">Your Name:</label>
                            <input type="text" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email">Your Email:</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="subject">Subject:</label>
                            <input type="text" id="subject" name="subject" required>
                        </div>
                        <div class="mb-3">
                            <label for="message">Message:</label>
                            <textarea id="message" name="message" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
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

    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
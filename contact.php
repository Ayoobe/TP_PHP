
<?php include('layouts/header.php'); ?>


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
<?php include('layouts/footer.php'); ?>

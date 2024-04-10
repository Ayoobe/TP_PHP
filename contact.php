
<?php include('layouts/header.php'); ?>

<!-- Contact form -->
<section id="contact" class="py-5 bg-light text-dark">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="text-center mb-5">
            <h2>Contact Us</h2>
            <?php if (isset($_GET['success']) && $_GET['success'] == 'true'): ?>
              <div class="alert alert-success" role="alert">
                Thank you for contacting us! We'll get back to you shortly.
              </div>
            <?php endif; ?>
          </div>
          <form class="contact-form border rounded p-4 shadow-sm" action="send-email.php" method="post">
            <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['csrf_token'] ?? ''); ?>">
            <div class="mb-3">
              <label for="name" class="form-label">Your Name:</label>
              <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Your Email:</label>
              <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
              <label for="subject" class="form-label">Subject:</label>
              <input type="text" class="form-control" id="subject" name="subject" required>
            </div>
            <div class="mb-3">
              <label for="message" class="form-label">Message:</label>
              <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary" id="login-btn">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>


    <!-- Footer -->
<?php include('layouts/footer.php'); ?>

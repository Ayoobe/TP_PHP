<?php include('layouts/header.php'); ?>

<!-- Contact form -->
<section id="contact" class="py-5 bg-light text-dark">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="text-center mb-5">
          <h2>Contact Us</h2>
          <div id="contact-message">
            <!-- PHP code to display success or error message will be inserted here -->
          </div>
        </div>
        <form class="contact-form border rounded p-4 shadow-sm" id="contact-form" method="post">
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
            <span id="sent-text" style="display: none;">Sent!</span>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

<?php include('layouts/footer.php'); ?>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const contactForm = document.getElementById('contact-form');
  const contactMessage = document.getElementById('contact-message');
  const sentText = document.getElementById('sent-text');

  contactForm.addEventListener('submit', function(event) {
    event.preventDefault();
    
    const formData = new FormData(this);

    fetch('send-email.php', {
      method: 'POST',
      body: formData
    })
    .then(response => response.json())
    .then(data => {
      if (data.emailSent) {
        contactMessage.innerHTML = '<div class="alert alert-success" role="alert">Your message has been sent successfully!</div>';
        sentText.style.display = 'inline'; // Show "Sent!" text
      } else {
        contactMessage.innerHTML = '<div class="alert alert-danger" role="alert">' + data.error + '</div>';
      }
    })
    .catch(error => {
      console.error('Error:', error);
      contactMessage.innerHTML = '<div class="alert alert-danger" role="alert">An unexpected error occurred. Please try again later.</div>';
    });
  });
});
</script>

<footer class="footer">
  <style>
    /* Footer */
.footer {
  position: relative;
  width: 100%;
  background: #2b2b2b;  
  height: 250px;
  padding: 20px 50px;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
}

/* Social Icons */
.social-icon,
.menu {
  position: relative;
  display: flex;
  justify-content: center;
  align-items: center;
  margin: 10px 0;
  flex-wrap: wrap;
}

.social-icon__item,
.menu__item {
  list-style: none;
}

.social-icon__link {
  font-size: 2rem;
  color: #fff;
  margin: 0 10px;
  display: inline-block;
  transition: 0.5s;
}

.social-icon__link:hover {
  transform: translateY(-10px);
}

/* Menu */
.menu__link {
  font-size: 1.2rem;
  color: #fff;
  margin: 0 10px;
  display: inline-block;
  transition: 0.5s;
  text-decoration: none;
  opacity: 0.75;
  font-weight: 300;
}

.menu__link:hover {
  opacity: 1;
}

/* Footer Copyright */
.footer__copyright {
  color: #fff;
  margin: 15px 0 10px 0;
  font-size: 1rem;
  font-weight: 300;
}

  </style>
  <ul class="social-icon">
    <li class="social-icon__item">
      <a class="social-icon__link" href="https://www.facebook.com/profile.php?viewas=100000686899395&id=61557927822592">
        <ion-icon name="logo-facebook"></ion-icon>
      </a>
    </li>
    <li class="social-icon__item"></li>
    <li class="social-icon__item">
      <a class="social-icon__link" href="https://www.instagram.com/insat_tickets/">
        <ion-icon name="logo-instagram"></ion-icon>
      </a>
    </li>
  </ul>
  <ul class="menu">
    <li class="menu__item"><a class="menu__link" href="index.php">Home</a></li>
    <li class="menu__item"><a class="menu__link" href="account.php">My Account</a></li>
    <li class="menu__item">
      <a class="menu__link" href="mailto:insat.tickets@gmail.com">Contact</a>
    </li>
  </ul>
  <p class="footer__copyright">&copy;2024 Insat Tickets | All Rights Reserved</p>
</footer>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

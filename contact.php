<?php
session_start();
include_once "./include/db.php";
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Car Rental</title>
  <link rel="stylesheet" href="css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

  <?php
  include_once "./include/nav.php"
  ?>


  <!-- contact *******************************************************-->


  <div class="contact">
    <div class="main heading text-center">
      <h2><span>Contact </span>Us</h2>
    </div>
    <div class="container py-3">
      <div class="row">
        <div class="col-md-6">
          <div class="contact_sec1">
            <form>
              <div class="">
                <div class="mb-3">
                  <input type="text" class="form-control" placeholder="Enter Your Name" required>
                  <input type="email" class="form-control" placeholder="Enter Your Email" required>
                  <input type="number" class="form-control" placeholder="Enter Your Number" required>
                </div>
                <textarea class="form-control my-3" rows="4" placeholder="Message" required></textarea>
                <button type="submit" class="button w-100 text-center">Submit</button>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-6">
          <div class="contact_sec1">
            <img src="Assest/img/display.png" class="img-fluid my-5" alt="">
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- /contact *******************************************************-->


  <!-- Footer -->
  <footer class="text-center text-lg-start footer text-muted">
    <!-- Section: Social media -->
    <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
      <!-- Left -->
      <div class="me-5 d-none d-lg-block">
        <span>Get connected with us on social networks:</span>
      </div>
      <!-- Left -->

      <!-- Right -->
      <div>
        <a href="#" class="me-4 text-reset">
          <i data-lucide="facebook" class="btni"></i>
        </a>
        <a href="#" class="me-4 text-reset">
          <i data-lucide="twitter" class="btni"></i>
        </a>
        <a href="#" class="me-4 text-reset">
          <i data-lucide="instagram" class="btni"></i>
        </a>
        <a href="#" class="me-4 text-reset">
          <i data-lucide="linkedin" class="btni"></i>
        </a>
        <a href="#" class="me-4 text-reset">
          <i data-lucide="github" class="btni"></i>
        </a>
      </div>
      <!-- Right -->
    </section>
    <!-- Section: Social media -->

    <!-- Section: Links  -->
    <section class="">
      <div class="container text-center text-md-start mt-5">
        <!-- Grid row -->
        <div class="row mt-3">
          <!-- Grid column -->
          <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
            <!-- Content -->
            <h6 class="text-uppercase fw-bold mb-4 ">
              <i data-lucide="gem" class="btni"> </i> car rental
            </h6>
            <p>
              Here you can use rows and columns to organize your footer content. Lorem ipsum
              dolor sit amet, consectetur adipisicing elit.
            </p>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">
              Pages
            </h6>
            <p>
              <a href="index.html" class="text-reset">Home</a>
            </p>
            <p>
              <a href="about.html" class="text-reset">About us</a>
            </p>
            <p>
              <a href="carlist.html" class="text-reset">Car Listing</a>
            </p>
            <p>
              <a href="contact.html" class="text-reset">Contact us</a>
            </p>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
            <p><i data-lucide="house" class="btni"></i> New York, NY 10012, US</p>
            <p><i data-lucide="mail" class="btni"></i> carrental@gmail.com</p>
            <p><i data-lucide="phone" class="btni"></i> +94 71 085 4183</p>
            <p><i data-lucide="phone" class="btni"></i> +94 75 801 4532</p>
          </div>
          <!-- Grid column -->
        </div>
        <!-- Grid row -->
      </div>
    </section>
    <!-- Section: Links  -->

    <!-- Copyright -->
    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
      <p>© 2024 Copyright : <a class="text-reset fw-bold" href="https://mdbootstrap.com/">CarRental.com</a></p>

    </div>
    <!-- Copyright -->
  </footer>
  <!-- Footer -->

</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<!-- Development version -->
<script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>

<!-- Production version -->
<script src="https://unpkg.com/lucide@latest"></script>

<script>
  lucide.createIcons();
</script>

<!-- swiper -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>

</html>
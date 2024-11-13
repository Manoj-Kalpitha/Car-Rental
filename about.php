<?php
session_start();
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

<body bg-body-tertiary>

  <?php
  include_once "./include/nav.php"
  ?>



  <!-- /why choose us***********************************************-->

  <div class="gallery text-center">
    <div class="container">
      <div class="main_heading text-center">
        <h2>WHY? <span>Choose </span> us</h2>
        <p>Choose us for reliable vehicles, affordable rates, and top-notch customer service, ensuring a smooth and stress-free rental experience</p>
      </div>
      <div class=" row py-5 gy-3 ">
        <div class="work2 col-md-3 ">
          <i data-lucide="book-user" class="my-icon"></i>
          <p class="text-center">Easy and secure online booking capability</p>
        </div>
        <div class="work2 col-md-3">
          <i data-lucide="ban" class="my-icon"></i>
          <p class="text-center">Free cancellation and booking amendments</p>
        </div>
        <div class="work2 col-md-3">
          <i data-lucide="forklift" class="my-icon"></i>
          <p class="text-center">24/7 customer support and breakdown assistance</p>
        </div>
        <div class="work2 col-md-3">
          <i data-lucide="shield-minus" class="my-icon"></i>
          <p class="text-center">Lowest collision damage waiver rates</p>
        </div>
        <div class="work2 col-md-3">
          <i data-lucide="bus" class="my-icon"></i>
          <p class="text-center">Mordern fleet with leading vehicle brands</p>
        </div>
        <div class="work2 col-md-3">
          <i data-lucide="handshake" class="my-icon"></i>
          <p class="text-center">Unbranded vehicles for added security</p>
        </div>
        <div class="work2 col-md-3">
          <i data-lucide="gauge" class="my-icon"></i>
          <p class="text-center">Unlimited mileage for complete freedom</p>

        </div>
        <div class="work2 col-md-3">
          <i data-lucide="message-circle-code" class="my-icon"></i>
          <p class="text-center">Trusted positive reviews by our customers</p>
        </div>
      </div>
    </div>
  </div>

  <!-- /why choose us***********************************************-->


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
            "At Car Rental, we make your travel hassle-free with a diverse range of vehicles to match every occasion.
 Whether you're exploring the city or heading on a road trip, 
trust us for quality service, affordable prices, and an effortless rental experience."
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
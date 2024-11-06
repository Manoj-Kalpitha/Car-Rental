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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

  <!-- navigation bar************************************************-->

  <nav class="navbar navbar-expand-lg navclr p-3">
    <div class="container-fluid">
      <a class="navbar-brand navclra" href="#"><img src="./Assest/img/logo_v4.png" class=" navimg rounded float-start"
          alt="..."></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 gap-4">
          <li class="nav-item ">
            <a class="nav-link active navclra" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link navclra" href="about.php">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link navclra" href="carlist.php">Car Listing</a>
          </li>
          <li class="nav-item">
            <a class="nav-link navclra" href="contact.php">Contact Us</a>
          </li>
          <?php
          if (isset($_SESSION['user_id'])) {
            echo '<li class="nav-item">
              <button class="button btnlog"><a href="./include/logout.php">LogOut</a></button>
               </li>';
          }
          ?>
        </ul>

        <?php

        if (isset($_SESSION['user_id'])) {

        ?>

          <div class="d-flex align-items-center gap-2 px-4 ">
            <button class="btn border-0 text-center profile_btn" data-bs-toggle="offcanvas"
              data-bs-target="#offcanvasProfile" aria-controls="offcanvasProfile">
              <i class="bi bi-person-square text-white fs-4" data-lucide="circle-user-round"></i>
            </button>
            <p><?php echo $_SESSION['user_name']; ?></p>


            <!-- <div class="d-flex ms-4" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              </div>
              <button class="button1" type="submit">Search</button> -->
            </form>
          </div>
        <?php
        }
        ?>
      </div>
  </nav>

  <!-- /navigation bar***********************************************-->




  <!-- heading*******************************************************-->

  <div class="banner ">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="">
            <h1>Hi, Welcome to <br><span>Car Rental Protal</span> </h1>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Enim ut, id iusto nobis eveniet dolore
              cupiditate sequi aspernatur quam consequuntur!</p>

            <?php
            if (!isset($_SESSION['user_id'])) {

              echo '<button class ="button btnlog" type=""><a href="login.php">Login</a></button>
                    <button class="button btnlog" type=""><a href="registration.php">Register</a></button>';
            }

            ?>

          </div>
        </div>
        <div class="col-md-6">
          <div class="">
            <!-- <img src="image/banner_image.png" alt=""> -->
            <img src="./Assest/img/main2.png" class="w-100 h-100" alt="">
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--/heading******************************************************-->










  <!-- booking*******************************************************-->

  <div class="work text-center ">
    <div class="container">
      <div class="main_heading text-center">
        <h2>How it <span>Work</span> </h2>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Suscipit, ex?</p>
      </div>
      <!-- ********************************************** -->
      <div class="row py-5">
        <div class="col-md-4">
          <div class="work1 rounded-2 ">
            <div class="d-flex justify-content-center mb-4">
              <div class="work_icon py-4">
                <i data-lucide="map-pin" width="30" class=""></i>
              </div>
            </div>
            <h5>choose location</h5>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque, quos.</p>
          </div>
        </div>

        <div class="col-md-4">
          <div class="work1 rounded-2 ">
            <div class="d-flex justify-content-center mb-4">
              <div class="work_icon py-4">
                <i data-lucide="calendar" width="18" class=""></i>
              </div>
            </div>
            <h5>Pick-up-date</h5>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque, quos.</p>
          </div>
        </div>

        <div class="col-md-4">
          <div class="work1 rounded-2 ">
            <div class="d-flex justify-content-center mb-4">
              <div class=" work_icon py-4">
                <i data-lucide="car-front" width="18" class=""></i>
              </div>
            </div>
            <h5>Select car</h5>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque, quos.</p>
          </div>
        </div>
      </div>
      <!-- ********************************************** -->
      <button class="button">Book Now</button>
    </div>
  </div>

  <!-- /booking*******************************************************-->



  <!-- gallery*******************************************************-->

  <div class="gallery text-center">
    <div class="container">
      <div class="main_heading text-center">
        <h2>gallery <span>rent </span> Your usrs Today</h2>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Porro, vitae?</p>
      </div>
      <div class="row py-5">
        <div class="col-md-3">
          <img src="Assest/img/drive.png" alt="">
        </div>
        <div class="col-md-3">
          <img src="Assest/img/drive.png" alt="">
        </div>
        <div class="col-md-3">
          <img src="Assest/img/drive.png" alt="">
        </div>
        <div class="col-md-3">
          <img src="Assest/img/drive.png" alt="">
        </div>
        <div class="col-md-3">
          <img src="Assest/img/drive.png" alt="">
        </div>
        <div class="col-md-3">
          <img src="Assest/img/drive.png" alt="">
        </div>
        <div class="col-md-3">
          <img src="Assest/img/drive.png" alt="">
        </div>
        <div class="col-md-3">
          <img src="Assest/img/drive.png" alt="">
        </div>
      </div>
      <button class="button">Start Booking <i data-lucide="move-right" class="ps-1"></i></button>
    </div>
  </div>

  <!-- /gallery*******************************************************-->




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
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
  integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
  integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
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
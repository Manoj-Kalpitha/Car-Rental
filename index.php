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

  <?php
  include_once "./include/nav.php"
    ?>






  <!-- heading*******************************************************-->

  <div class="banner ">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="">
            <h1>Hi, Welcome to <br><span>Car Rental Protal</span> </h1>
            <p>Welcome to our Car Rental Portal, where finding the perfect rental car is quick and hassle-free.
              Our platform provides an extensive selection of vehicles to fit every need,
              from luxury models to economy cars, ideal for business trips, vacations, or daily use.
              With easy account registration and secure login, you can browse available cars,
              check prices, and make a booking in just a few clicks. Enjoy a seamless rental experience with clear
              information,transparent pricing, and dedicated customer support to assist you at every step.</p>

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
        <p>Choose your car, book your rental, pick it up, and return it when you're done. It's that easy!</p>
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
            <p>Begin by selecting the location where you’d like to pick up your car.</p>
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
            <p>Set your rental start date and time to fit your schedule.</p>
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
            <p>Browse our fleet and pick the car that best suits your needs.</p>
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
        <h2>"View, <span>Pick, </span> Book"</h2>
        <p>Browse our selection and rent today! Find the perfect car for your needs with ease.</p>
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
  <?php
  include_once "./include/footer.php";
  ?>
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
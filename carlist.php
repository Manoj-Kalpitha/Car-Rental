<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Car Rental - Car Listing</title>

  <!-- External CSS  -->
  <link rel="stylesheet" href="css/style.css">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
  <?php
  include_once "./nav.php";
  ?>

  <!-- filter*******************************************************-->

  <div class="search d-flex justify-content-center ">
    <div class="search_main w-75 rounded-4">
      <div class="container">
        <div class="row align-items-end">
          <div class="col-md-3">
            <div class="search1">
              <h5 class="pb-2">Location</h5>
              <div class="d-flex align-items-center gap-4">
                <i data-lucide="map-pin" width="30" class=""></i>
                <select class="form-select" aria-label="Default select example">
                  <option selected>Add Location</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="search1">
              <h5 class="pb-2">Pick-Up-Date</h5>
              <div class="d-flex align-items-center gap-4">
                <i data-lucide="calendar" width="18" class=""></i>
                <select class="form-select" aria-label="Default select example">
                  <option selected>Add Date</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="search1">
              <h5 class="pb-2">Return-Date</h5>
              <div class="d-flex align-items-center gap-4">
                <i data-lucide="calendar" width="18" class=""></i>
                <select class="form-select" aria-label="Default select example">
                  <option selected>Add Date</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="search1 mt-4">
              <button class="button">search</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--/filter*******************************************************-->















  <?php
  include_once "./footer.php"
  ?>


  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
  <!-- Development version -->
  <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>

  <!-- Production version -->
  <script src="https://unpkg.com/lucide@latest"></script>

  <!-- swiper -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>
</body>


</html>
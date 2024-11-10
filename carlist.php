<?php
include_once "./include/db.php";
session_start();



// SQL query to select all items from the cars table
$sql = "SELECT * FROM cars";


// Execute the query and fetch all results into a variable
$result = $conn->query($sql);

$cars = [];

if ($result->num_rows > 0) {
  // Fetch each row as an associative array and add it to $cars
  while ($row = $result->fetch_assoc()) {
    $cars[] = $row;
  }
}

// Close the database connection
$conn->close();

?>

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
  <link rel="stylesheet" href="./css/carCard.css">
  <link rel="stylesheet" href="./css/index.css">
</head>

<body>
  <?php
  include_once "./include/nav.php";
  ?>

  <div class="input-group rounded mt-5 w-50 mx-auto">
    <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" id="search" />
    <span class="input-group-text border-0" id="search-addon">
      <i class="fas fa-search"></i>
    </span>
  </div>



  <div class="container d-flex flex-wrap gap-5 p-5" id="cars">
    <?php foreach ($cars as $car):
      $carName = $car["make"] . " " . $car["model"];
      $year = $car["year"];
      $regNo = $car["registration_no"];
      $seatCapacity = $car["seating_capacity"];
      $category = $car["category"];
      $fuelType = $car["fuel_type"];
      $availability = $car["status"];
      $image = $car["image_url"];
      $carId = $car["car_id"];


      include "./carCard.php";
    endforeach; ?>
  </div>











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

  <script>
    const searchEl = document.getElementById("search");
    const cars = document.getElementById("cars");


    searchEl.addEventListener("keyup", (event) => {


      const xhr = new XMLHttpRequest();
      xhr.open("GET", "./include/search_handler.php?search=" + event.target.value, true);
      xhr.onload = function() {
        if (this.status == 200) {
          const res = this.responseText;
          updateBody(res);

        }
      }


      xhr.send();

    });

    function updateBody(res) {
      cars.innerHTML = "";

      JSON.parse(res).forEach(car => {
        console.log(car)

        const template = `
           <div class="card mb-3" style="max-width: 540px;">
          <div class="row g-0">
              <div class="col-md-6">
                  <img src="./Assest/img/uploads/${car.image_url}" class="rounded-start " alt="...">
              </div>
              <div class="col-md-6">
                  <div class="card-body">
                      <h3 class="card-title">${car.make}</h3>
                      <h3 class="card-title">${car.year}</h3>
                      <span class="badge text-bg-primary">Year - ${car.year}</span>
                      <span class="badge text-bg-secondary">Registration No - ${car.registration_no}</span>
                      <span class="badge text-bg-success">Category - ${car.category}</span>
                      <span class="badge text-bg-danger">Seat Capacity - ${car.seating_capacity}</span>
                      <span class="badge text-bg-warning">Fuel Type - ${car.fuel_type}</span>
                      <span class="badge text-bg-info">${car.status}</span> <br>
                      ${car.status == "Available" ? `<button class="btn btn-outline-primary  mt-3">
                          <a href="reserve.php?id=${car.car_id}">Reserve Now</a>
                      </button>` : `<button class="btn btn-outline-danger mt-3" disabled>Reserved</button>`}

               
    
                  </div>
              </div>
          </div>
      </div>
       `

        cars.innerHTML += template;
      })


    }
  </script>
</body>


</html>
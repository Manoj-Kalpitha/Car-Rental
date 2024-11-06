<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Car Rental</title>
    <link rel="stylesheet" href="../css/admin.css">
    <!-- <link rel="stylesheet" href="css/admin.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body >



    <section class="placed-orders container my-5 flex-grow-1"> 
        <h1 class="title text-center mb-4 text-muted"><i class="bi bi-luggage text-danger"></i> Placed Orders</h1>
     
        <div class="row g-4">
           <?php
           
           $select_orders = mysqli_query($conn, "SELECT * FROM `orders`") or die('query failed');
           if(mysqli_num_rows($select_orders) > 0){
              while($fetch_orders = mysqli_fetch_assoc($select_orders)){
           ?>
           <div class="col-md-6 col-lg-4">
              <div class="card shadow-sm h-100">
                 <div class="card-body">
                    <p class="card-text">User ID: <span class="fw-bold"><?php echo $fetch_orders['user_id']; ?></span></p>
                    <p class="card-text">Placed On: <span class="fw-bold"><?php echo $fetch_orders['placed_on']; ?></span></p>
                    <p class="card-text">Name: <span class="fw-bold" style="text-transform: capitalize;"><?php echo $fetch_orders['name']; ?></span></p>
                    <p class="card-text">Phone Number: <span class="fw-bold"><?php echo $fetch_orders['number']; ?></span></p>
                    <p class="card-text">Email: <span class="fw-bold"><?php echo $fetch_orders['email']; ?></span></p>
                    <p class="card-text">Address: <span class="fw-bold" style="text-transform: capitalize;"><?php echo $fetch_orders['address']; ?></span></p>
                    <p class="card-text">Total Products: <span class="fw-bold" style="text-transform: capitalize;"><?php echo $fetch_orders['total_products']; ?></span></p>
                    <p class="card-text">Total Price: <span class="fw-bold">Rs.<?php echo $fetch_orders['total_price']; ?>.00</span></p>
                    <p class="card-text">Payment Method: <span class="fw-bold" style="text-transform: capitalize;"><?php echo $fetch_orders['method']; ?></span></p>
                 </div>
              </div>
           </div>
           <?php
              }
           }else{
              echo '<p class="text-center text-danger">No orders placed yet!</p>';
           }
           ?>
        </div>
     </section>











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
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
    

<!-- admin nav  -->
    <header class="header navclr border-bottom py-3">
      <div class="container-fluid">
   
   
         <nav class="navbar navbar-expand-lg navbar-light">
   
   
            <a href="admin_page.php" class="navbar-brand text-decoration-none fw-bold fs-3">
               <img src="./../assest/img/logo-c.png" alt="Logo" class="img-fluid" width="100px" height="20px">
            </a>
   
   
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
            </button>
   
   
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
               <ul class="navbar-nav  text-center">
                  <li class="nav-item">
                     <a href="dashbord.php" class="nav-link navclra">Dashboard</a>
                  </li>
                  <li class="nav-item">
                     <a href="add_car.php" class="nav-link  navclra">ADD</a>
                  </li>
                  <li class="nav-item">
                     <a href="oders.php" class="nav-link navclra">Orders</a>
                  </li>
                  <li class="nav-item">
                     <a href="users.php" class="nav-link navclra">Users</a>
                  </li>
                  <li class="nav-item">
                     <a href="admin_contacts.php" class="nav-link navclra">Feedbacks</a>
                  </li>
               </ul>
   
    
               <ul class="navbar-nav ms-auto  text-center m-2">
                  <li class="nav-item ">
                     <p class="mb-0 navclra fw-bold ">Username: <span class="fw-bold text-danger" style="text-transform: capitalize;"></span></p>             
                  </li>
                  <li class="nav-item mx-3">
                     <p class="navclra fw-bold">Email: <span class="fw-bold text-danger"></span></p>
                  </li>
                  <li class="nav-item">
                     <a href="./functions/admin_logout_fun.php" class="btn button1 btn-sm mt-2 mt-lg-0">Logout</a>
                  </li>
               </ul>
            </div>
   
         </nav>
      </div>
   </header>

<!-- Dashboard -->
<section class="container my-5">
  <h1 class="text-center mb-4 text-muted"><i class="bi bi-house-dash text-danger"></i> Dashboard</h1>

  <div class="table-responsive tabel_main">
     <table class="table table-bordered table-hover text-center tabel_dash">
        <thead class="table-dark">
           <tr>
              <th scope="col">Category</th>
              <th scope="col">Count</th>
           </tr>
        </thead>
        <tbody>
           <tr>
              <td class="p-3">Orders Placed</td>
              <td class="p-3">
                 <?php
                    $select_orders = mysqli_query($conn, "SELECT * FROM `orders`") or die('query failed');
                    $number_of_orders = mysqli_num_rows($select_orders);
                    echo $number_of_orders;
                 ?>
              </td>
           </tr>
           <tr>
              <td class="p-3">Products Added</td>
              <td class="p-3">
                 <?php
                    $select_products = mysqli_query($conn, "SELECT * FROM `products`") or die('query failed');
                    $number_of_products = mysqli_num_rows($select_products);
                    echo $number_of_products;
                 ?>
              </td>
           </tr>
           <tr>
              <td class="p-3">Users</td>
              <td class="p-3">
                 <?php
                    $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE user_type = 'user'") or die('query failed');
                    $number_of_users = mysqli_num_rows($select_users);
                    echo $number_of_users;
                 ?>
              </td>
           </tr>
           <tr>
              <td class="p-3">Admins</td>
              <td class="p-3">
                 <?php
                    $select_admin = mysqli_query($conn, "SELECT * FROM `users` WHERE user_type = 'admin'") or die('query failed');
                    $number_of_admin = mysqli_num_rows($select_admin);
                    echo $number_of_admin;
                 ?>
              </td>
           </tr>
           <tr>
              <td class="p-3">Total Accounts</td>
              <td class="p-3">
                 <?php
                    $select_account = mysqli_query($conn, "SELECT * FROM `users`") or die('query failed');
                    $number_of_account = mysqli_num_rows($select_account);
                    echo $number_of_account;
                 ?>
              </td>
           </tr>
           <tr>
              <td class="p-3">New Messages</td>
              <td class="p-3">
                 <?php
                    $select_messages = mysqli_query($conn, "SELECT * FROM `message`") or die('query failed');
                    $number_of_messages = mysqli_num_rows($select_messages);
                    echo $number_of_messages;
                 ?>
              </td>
           </tr>
        </tbody>
     </table>
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
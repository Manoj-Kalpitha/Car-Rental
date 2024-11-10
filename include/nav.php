<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Car Rental</title>
  <link rel="stylesheet" href="css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

  <nav class="navbar navbar-expand-lg navclr p-3">
    <div class="container-fluid">
      <a class="navbar-brand navclra" href="#"><img src="./Assest/img//logo_v4.png" class=" navimg rounded float-start"
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
          <li class="nav-item">
            <a class="nav-link navclra" href="orderHistory.php">Orders</a>
          </li>
          <?php
          if (isset($_SESSION['user_name'])) {
            if (isset($_SESSION['admin']) == true) { ?>
              <li class="nav-item">
                <a class="nav-link navclra" href="./admin/adminDashboard.php">Admin Dashboard</a>
              </li>
            <?php }
            ?>
            <li class="nav-item">
              <a class="nav-link navclra" href="p"><?php echo $_SESSION['user_name'] ?></a>
            </li>
            <li class="nav-item">
              <a class="nav-link navclra" href="./include/logout.php">Log Out</a>
            </li>
          <?php
          } else { ?>
            <li class="nav-item">
              <a class="nav-link navclra" href="./login.php">Login</a>
            </li>
          <?php }
          ?>
        </ul>

        <div class="d-flex align-items-center gap-2 px-4">
          <button class="btn border-0 text-center profile_btn" data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasProfile" aria-controls="offcanvasProfile">
            <i class="bi bi-person-square text-white fs-4" data-lucide="circle-user-round"></i>
          </button>
          </form>
        </div>

      </div>
  </nav>
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
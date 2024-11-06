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
  <!-- header  -->
  <?php include('include/nav.php'); ?>


  <div class="sidebar_widget">
    <div class="widget_heading">
      <h4><i class="fa fa-envelope" aria-hidden="true"></i>Book Now</h4>
    </div>
    <form method="post">
      <div class="form-group">
        <label>From Date:</label>
        <input type="date" class="form-control" name="fromdate" placeholder="From Date" required>
      </div>
      <div class="form-group">
        <label>To Date:</label>
        <input type="date" class="form-control" name="todate" placeholder="To Date" required>
      </div>
      <div class="form-group">
        <textarea rows="4" class="form-control" name="message" placeholder="Message" required></textarea>
      </div>

      <div class="form-group">
        <input type="submit" class="btn" name="submit" value="Book Now">
      </div>

      <a href="login.php" class="btn btn-xs uppercase" data-toggle="modal" data-dismiss="modal">Login For
        Book</a>


    </form>
  </div>

  <!-- footer -->
  <?php include('include/footer.php'); ?>
</body>

</html>
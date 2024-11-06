<?php
include_once "../include/db.php";

// check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {


   // Retrieve form data
   $make = $_POST['make'];
   $model = $_POST['model'];
   $year = $_POST['year'];
   $registration_no = $_POST['registration_no'];
   $category = $_POST['category'];
   $seating_capacity = $_POST['seating_capacity'];
   $fuel_type = $_POST['fuel_type'];
   $daily_rate = $_POST['daily_rate'];
   $status = $_POST['status'];
   $image_url = $_POST['image_url'];

   // Insert data into the Cars table
   $sql = "INSERT INTO Cars (make, model, year, registration_no, category, seating_capacity, fuel_type, daily_rate, status, image_url)
            VALUES ('$make', '$model', '$year', '$registration_no', '$category', '$seating_capacity', '$fuel_type', '$daily_rate', '$status', '$image_url')";

   if ($conn->query($sql) === TRUE) {
      echo "New car added successfully!";
   } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
   }

   // Close connection
   $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <title>Add New Car</title>
   <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
   <div class="container my-4">
      <h2>Add New Car</h2>
      <form action="" method="POST">
         <div class="form-group">
            <label for="make">Make</label>
            <input type="text" class="form-control" id="make" name="make" required>
         </div>
         <div class="form-group">
            <label for="model">Model</label>
            <input type="text" class="form-control" id="model" name="model" required>
         </div>
         <div class="form-group">
            <label for="year">Year</label>
            <input type="number" class="form-control" id="year" name="year" required>
         </div>
         <div class="form-group">
            <label for="registration_no">Registration Number</label>
            <input type="text" class="form-control" id="registration_no" name="registration_no" required>
         </div>
         <div class="form-group">
            <label for="category">Category</label>
            <input type="text" class="form-control" id="category" name="category" required>
         </div>
         <div class="form-group">
            <label for="seating_capacity">Seating Capacity</label>
            <input type="number" class="form-control" id="seating_capacity" name="seating_capacity" required>
         </div>
         <div class="form-group">
            <label for="fuel_type">Fuel Type</label>
            <select class="form-control" id="fuel_type" name="fuel_type" required>
               <option>Gasoline</option>
               <option>Diesel</option>
               <option>Electric</option>
               <option>Hybrid</option>
            </select>
         </div>
         <div class="form-group">
            <label for="daily_rate">Daily Rate</label>
            <input type="number" step="0.01" class="form-control" id="daily_rate" name="daily_rate" required>
         </div>
         <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status" required>
               <option>Available</option>
               <option>Rented</option>
               <option>Maintenance</option>
            </select>
         </div>
         <div class="form-group">
            <label for="image_url">Image URL</label>
            <input type="text" class="form-control" id="image_url" name="image_url" required>
         </div>
         <button type="submit" class="btn btn-primary">Add Car</button>
      </form>
   </div>
</body>

</html>
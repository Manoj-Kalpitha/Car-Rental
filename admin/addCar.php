<?php
include_once "../include/db.php";

// Check if form is submitted
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

   // Handle file upload
   $targetDir = "../Assest/img/uploads/";
   $targetFile = $targetDir . basename($_FILES["image"]["name"]);
   $uploadOk = 1;
   $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

   // Check if image file is an actual image or fake image
   $check = getimagesize($_FILES["image"]["tmp_name"]);
   if ($check !== false) {
      $uploadOk = 1;
   } else {
      echo "File is not an image.";
      $uploadOk = 0;
   }

   // Check if file already exists
   if (file_exists($targetFile)) {
      echo "Sorry, file already exists.";
      $uploadOk = 0;
   }

   // Check file size
   if ($_FILES["image"]["size"] > 50000000000) { // Limit file size to 500KB
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
   }

   // Allow certain file formats
   if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
   }

   // Check if $uploadOk is set to 0 by an error
   if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
      // If everything is ok, try to upload file
   } else {
      if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
         $targetFile =  basename($_FILES["image"]["name"]);
         // Insert data into the Cars table, with the file path as the image URL
         $sql = "INSERT INTO Cars (make, model, year, registration_no, category, seating_capacity, fuel_type, daily_rate, status, image_url)
                    VALUES ('$make', '$model', '$year', '$registration_no', '$category', '$seating_capacity', '$fuel_type', '$daily_rate', '$status', '$targetFile')";

         if ($conn->query($sql) === TRUE) {
            echo "New car added successfully!";
         } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
         }
      } else {
         echo "Sorry, there was an error uploading your file.";
      }
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
      <form action="" method="POST" enctype="multipart/form-data">
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
            <label for="image">Upload Image</label>
            <input type="file" class="form-control-file" id="image" name="image" required>
         </div>
         <button type="submit" class="btn btn-primary">Add Car</button>
      </form>
   </div>
</body>

</html>
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
            <input type="url" class="form-control" id="image_url" name="image_url" required>
         </div>
         <button type="submit" class="btn btn-primary">Add Car</button>
      </form>
   </div>
</body>

</html>
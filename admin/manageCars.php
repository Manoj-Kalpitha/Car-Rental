<?php
// Database connection
include_once "../include/db.php";

// Handle Delete request
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $conn->query("DELETE FROM Cars WHERE car_id = $delete_id");
    header("Location: adminDashboard.php?page=manageCars");
    exit();
}

// Handle Update request
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_id'])) {
    $update_id = $_POST['update_id'];
    $make = $_POST['make'];
    $model = $_POST['model'];
    $year = $_POST['year'];
    $registration_no = $_POST['registration_no'];
    $category = $_POST['category'];
    $seating_capacity = $_POST['seating_capacity'];
    $fuel_type = $_POST['fuel_type'];
    $daily_rate = $_POST['daily_rate'];
    $status = $_POST['status'];
    $image_url = $_POST['image_url']; // Default to current image URL

    // Check if a new file was uploaded
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $targetDir = "../Assest/img/uploads/";
        $fileName = basename($_FILES["image"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $imageFileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

        // Move the uploaded file to the target directory
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
            $targetFilePath = $fileName;
            $image_url = $targetFilePath; // Update image URL to the new file path
        }
    }

    $sql = "UPDATE Cars SET 
                make = '$make',
                model = '$model',
                year = '$year',
                registration_no = '$registration_no',
                category = '$category',
                seating_capacity = '$seating_capacity',
                fuel_type = '$fuel_type',
                daily_rate = '$daily_rate',
                status = '$status',
                image_url = '$image_url'
            WHERE car_id = $update_id";
    $conn->query($sql);
    header("Location: adminDashboard.php?page=manageCars");
    exit();
}

// Fetch car data
$result = $conn->query("SELECT * FROM Cars");
$cars = $result->fetch_all(MYSQLI_ASSOC);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Manage Cars</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container my-4">
        <h2>Manage Cars</h2>
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Image</th>
                    <th>Make</th>
                    <th>Model</th>
                    <th>Year</th>
                    <th>Registration No</th>
                    <th>Category</th>
                    <th>Seating</th>
                    <th>Fuel Type</th>
                    <th>Daily Rate</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cars as $car): ?>
                    <tr>
                        <td><img src="../Assest/img/uploads/<?= htmlspecialchars($car['image_url']); ?>" width="50" height="50" alt="Car Image"></td>
                        <td><?= htmlspecialchars($car['make']); ?></td>
                        <td><?= htmlspecialchars($car['model']); ?></td>
                        <td><?= htmlspecialchars($car['year']); ?></td>
                        <td><?= htmlspecialchars($car['registration_no']); ?></td>
                        <td><?= htmlspecialchars($car['category']); ?></td>
                        <td><?= htmlspecialchars($car['seating_capacity']); ?></td>
                        <td><?= htmlspecialchars($car['fuel_type']); ?></td>
                        <td>$<?= htmlspecialchars(number_format($car['daily_rate'], 2)); ?></td>
                        <td><?= htmlspecialchars($car['status']); ?></td>
                        <td>
                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal<?= $car['car_id']; ?>">Edit</button>
                            <a href="manageCars.php?delete_id=<?= $car['car_id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this car?');">Delete</a>
                        </td>
                    </tr>




                    <!-- Edit Modal -->
                    <div class="modal fade" id="editModal<?= $car['car_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel<?= $car['car_id']; ?>" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form action="manageCars.php" method="POST" enctype="multipart/form-data">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModalLabel<?= $car['car_id']; ?>">Edit Car Details</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="update_id" value="<?= $car['car_id']; ?>">
                                        <div class="form-group">
                                            <label>Make</label>
                                            <input type="text" class="form-control" name="make" value="<?= htmlspecialchars($car['make']); ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Model</label>
                                            <input type="text" class="form-control" name="model" value="<?= htmlspecialchars($car['model']); ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Year</label>
                                            <input type="number" class="form-control" name="year" value="<?= htmlspecialchars($car['year']); ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Registration No</label>
                                            <input type="text" class="form-control" name="registration_no" value="<?= htmlspecialchars($car['registration_no']); ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Category</label>
                                            <input type="text" class="form-control" name="category" value="<?= htmlspecialchars($car['category']); ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Seating Capacity</label>
                                            <input type="number" class="form-control" name="seating_capacity" value="<?= htmlspecialchars($car['seating_capacity']); ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Fuel Type</label>
                                            <input type="text" class="form-control" name="fuel_type" value="<?= htmlspecialchars($car['fuel_type']); ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Daily Rate</label>
                                            <input type="number" step="0.01" class="form-control" name="daily_rate" value="<?= htmlspecialchars($car['daily_rate']); ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control" name="status" required>
                                                <option <?= $car['status'] == 'Available' ? 'selected' : ''; ?>>Available</option>
                                                <option <?= $car['status'] == 'Rented' ? 'selected' : ''; ?>>Rented</option>
                                                <option <?= $car['status'] == 'Maintenance' ? 'selected' : ''; ?>>Maintenance</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Upload Image</label>
                                            <input type="file" class="form-control-file" name="image">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success">Save changes</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- End Edit Modal -->
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
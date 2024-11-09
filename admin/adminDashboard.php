<?php
// Include your database connection file here
include_once "../include/db.php";
session_start();


if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];

    $sql = "SELECT * FROM users WHERE id = $userId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $userName = $row['name'];
    }
}

// Get the current page type (e.g., 'manageCars', 'addCar', etc.) from the URL
$page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';  // Default to 'dashboard' if no page is specified
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Car Rental</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }

        /* Sidebar styles */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            height: 100%;
            background-color: #343a40;
            color: white;
            padding-top: 20px;
            transition: all 0.3s ease-in-out;
        }

        .sidebar h3 {
            text-align: center;
            color: #fff;
        }

        .sidebar a {
            color: #ddd;
            text-decoration: none;
            display: block;
            padding: 15px;
            font-size: 18px;
            transition: background-color 0.3s;
        }

        .sidebar a:hover {
            background-color: #495057;
            color: #fff;
        }

        .sidebar a.active {
            background-color: #007bff;
            color: #fff;
        }

        /* Main content */
        .content {
            margin-left: 260px;
            padding: 20px;
        }

        /* Navbar styles */
        .navbar {
            background-color: #f8f9fa;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .navbar-nav .nav-item .nav-link {
            font-size: 16px;
            font-weight: 600;
        }
    </style>
</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h3 class="text-white">Admin Dashboard</h3>
        <a href="?page=dashboard" class="nav-link <?= ($page == 'dashboard') ? 'active' : '' ?>">Dashboard</a>
        <a href="?page=manageCars" class="nav-link <?= ($page == 'manageCars') ? 'active' : '' ?>">Manage Cars</a>
        <a href="?page=addCar" class="nav-link <?= ($page == 'addCar') ? 'active' : '' ?>">Add Car</a>
        <a href="?page=rentalManagement" class="nav-link <?= ($page == 'rentalManagement') ? 'active' : '' ?>">Rental Management</a>
        <a href="?page=userManagement" class="nav-link <?= ($page == 'userManagement') ? 'active' : '' ?>">User Management</a>
        <a href="../index.php" class="nav-link text-primary">Home</a>
        <a href="../include/logout.php" class="nav-link text-danger">Logout</a>
    </div>

    <!-- Main content -->
    <div class="content">
        <nav class="navbar navbar-expand-lg navbar-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item <?= ($page == 'dashboard') ? 'active' : '' ?>">
                        <a class="nav-link" href="?page=dashboard">Dashboard</a>
                    </li>
                    <li class="nav-item <?= ($page == 'manageCars') ? 'active' : '' ?>">
                        <a class="nav-link" href="?page=manageCars">Manage Cars</a>
                    </li>
                    <li class="nav-item <?= ($page == 'rentalManagement') ? 'active' : '' ?>">
                        <a class="nav-link" href="?page=rentalManagement">Rentals</a>
                    </li>
                    <li class="nav-item <?= ($page == 'userManagement') ? 'active' : '' ?>">
                        <a class="nav-link" href="?page=userManagement">Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-danger" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Dynamic Page Content -->
        <?php
        // Display content based on the selected page in the URL
        if ($page == 'manageCars') {
            include('manageCars.php');
        } elseif ($page == 'addCar') {
            include('addCar.php');
        } elseif ($page == 'rentalManagement') {
            include('rentalManagement.php');
        } elseif ($page == 'userManagement') {
            include('userManagement.php');
        } else {
            // Default content for the Dashboard
            echo "<h2>Welcome to Admin Dashboard, <b>$userName</b> </h2>";
            echo "<br>";
            echo "<p>Select an option from the sidebar to get started.</p>";
        }
        ?>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
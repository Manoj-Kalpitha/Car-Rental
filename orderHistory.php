<?php
include_once "./include/db.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order History</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        /* Custom styles */
        body {
            background-color: #f8f9fa;
        }

        .main-container {
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 2.5rem;
            color: #343a40;
            margin-bottom: 30px;
        }

        .table {
            border-collapse: collapse;
            width: 100%;
        }

        .table th,
        .table td {
            padding: 12px;
            text-align: center;
            border: 1px solid #dee2e6;
        }

        .table thead {
            background-color: #007bff;
            color: white;
        }

        .table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .table tbody tr:hover {
            background-color: #e9ecef;
            cursor: pointer;
        }

        .table td {
            font-size: 1.1rem;
        }

        .car-photo {
            width: 80px;
            /* Adjust the size of the image */
            height: auto;
            border-radius: 4px;
        }

        /* Responsive design */
        @media (max-width: 768px) {

            .table th,
            .table td {
                padding: 8px;
            }

            h1 {
                font-size: 1.8rem;
            }
        }
    </style>
</head>

<body>
    <?php
    include_once "./include/nav.php"; // Including the navigation bar
    ?>

    <div class="main-container mt-5">
        <h1>Order History</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Order ID</th>
                    <th scope="col">Car Photo</th>
                    <th scope="col">Car Make</th>
                    <th scope="col">Car Model</th>
                    <th scope="col">Car Year</th>
                    <th scope="col">Pickup Date</th>
                    <th scope="col">Return Date</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
                <?php

                // Prepare the query to select reservations based on user_id
                $query = "SELECT r.reservation_id, r.start_date, r.end_date, r.total_cost, c.make, c.model, c.year, c.image_url
                          FROM reservations r
                          INNER JOIN cars c ON r.car_id = c.car_id
                          WHERE r.customer_id = ?";

                // Prepare the statement
                $stmt = $conn->prepare($query);

                // Bind the user ID parameter from session
                $stmt->bind_param("i", $_SESSION['user_id']); // 'i' stands for integer (user_id)

                // Execute the query
                $stmt->execute();

                // Get the result
                $result = $stmt->get_result();

                // Check if any rows are returned
                if ($result->num_rows > 0) {
                    // Loop through each row in the result set
                    while ($row = $result->fetch_assoc()) {
                        // Output each reservation in a table row (<tr>) format
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['reservation_id']) . "</td>";
                        echo "<td><img src='./Assest/img/uploads/" . htmlspecialchars($row['image_url']) . "' alt='Car Image' class='car-photo'></td>";
                        echo "<td>" . htmlspecialchars($row['make']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['model']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['year']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['start_date']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['end_date']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['total_cost']) . "</td>";
                        echo "</tr>";
                    }
                } else {
                    // If no reservations are found, display a message
                    echo "<tr><td colspan='8' class='text-center'>No reservations found.</td></tr>"; // Updated colspan to 8
                }

                // Close the prepared statement
                $stmt->close();

                // Close the database connection
                mysqli_close($conn);

                ?>
            </tbody>
        </table>
    </div>

    <?php
    include_once "./include/footer.php"; // Including the footer
    ?>

    <!-- Bootstrap JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"></script>
</body>

</html>
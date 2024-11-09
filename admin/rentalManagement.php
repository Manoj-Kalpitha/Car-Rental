<?php
include_once "../include/db.php";

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    if ($_POST["action"] == "accept") {
        $conn->query("UPDATE reservations SET status = 'Complete' WHERE reservation_id = $id");
        header("Location: adminDashboard.php?page=rentalManagement");
    } else if ($_POST["action"] == "cancel") {
        $conn->query("UPDATE reservations SET status = 'Canceled' WHERE reservation_id = $id");
        header("Location: adminDashboard.php?page=rentalManagement");
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Management</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1>Rental Management</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Car ID</th>
                    <th>User ID</th>
                    <th>From Date</th>
                    <th>To Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT reservation_id, car_id, customer_id, start_date, end_date, status FROM reservations";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["reservation_id"] . "</td>";
                        echo "<td>" . $row["car_id"] . "</td>";
                        echo "<td>" . $row["customer_id"] . "</td>";
                        echo "<td>" . $row["start_date"] . "</td>";
                        echo "<td>" . $row["end_date"] . "</td>";
                        echo "<td>" . $row["status"] . "</td>";
                        echo "<td><form action='adminDashboard.php?page=rentalManagement&id=" . $row["reservation_id"] . "' method='POST'><input type='hidden' name='reservation_id' value='" . $row["reservation_id"] . "'><button type='submit' name='action' value='accept' class='mr-3 btn btn-success'>Accept</button><button type='submit' name='action' value='cancel' class='btn btn-danger'>Cancel</button></form></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>No rentals found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

</body>

</html>
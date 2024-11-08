<?php
session_start();
include_once "./include/db.php";

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    // Query to fetch car details based on car_id
    $stmt = $conn->prepare("SELECT * FROM cars WHERE car_id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $result = $result->fetch_assoc();
} else {
    header("Location: carlist.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/nav.css">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/style.css">
    <title>Car Rental Reservation</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .main-container {
            width: 90%;
            max-width: 800px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        header {
            text-align: center;
            margin-bottom: 20px;
        }

        header h1 {
            font-size: 2.5em;
            color: #333;
        }

        header p {
            font-size: 1.2em;
            color: #777;
        }

        .reservation-form form {
            display: grid;
            gap: 15px;
        }

        label {
            font-size: 1em;
            color: #333;
        }

        input,
        select,
        button {
            padding: 10px;
            font-size: 1em;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 100%;
        }

        input[type="date"],
        input[type="time"] {
            max-width: 300px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
            border: none;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <?php include_once "./include/nav.php"; ?>

    <div class="main-container">
        <header>
            <h1><?php echo $result["make"] . " " . $result["model"] . " " . $result["year"]; ?></h1>
            <img src="./Assest/img/uploads/<?php echo $result["image_url"]; ?>" alt="Car Image" class="img-fluid mt-5 mb-4">
            <p>Reserve this car for your trip!</p>
        </header>

        <section class="reservation-form">
            <form action="process_reservation.php" method="POST">
                <!-- Hidden car_id to associate with reservation -->
                <input type="hidden" name="car_id" value="<?php echo $result['car_id']; ?>">

                <!-- Full Name -->
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" required placeholder="John Doe">

                <!-- Email Address -->
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" required placeholder="example@email.com">

                <!-- Phone Number -->
                <label for="phone">Phone Number</label>
                <input type="tel" id="phone" name="phone" required placeholder="(123) 456-7890">

                <!-- Reservation Start Date -->
                <label for="start_date">Reservation Start Date</label>
                <input type="date" id="start_date" name="start_date" required>

                <!-- Reservation End Date -->
                <label for="end_date">Reservation End Date</label>
                <input type="date" id="end_date" name="end_date" required>

                <!-- Total Cost (based on car's daily rate and the number of days) -->
                <label for="total_cost">Total Cost</label>
                <input type="text" id="total_cost" name="total_cost" value="0.00" readonly>

                <!-- Submit Button -->
                <button type="submit">Reserve Car</button>
            </form>
        </section>
    </div>

    <?php include_once "./include/footer.php"; ?>

    <script>
        // JavaScript to calculate total cost based on reservation start and end dates
        const startDateInput = document.getElementById('start_date');
        const endDateInput = document.getElementById('end_date');
        const totalCostInput = document.getElementById('total_cost');
        const dailyRate = <?php echo $result['daily_rate']; ?>; // Assume the daily rental rate is stored in the database

        function calculateTotalCost() {
            const startDate = new Date(startDateInput.value);
            const endDate = new Date(endDateInput.value);

            if (startDate && endDate && endDate >= startDate) {
                const timeDiff = endDate - startDate;
                const days = timeDiff / (1000 * 3600 * 24); // Convert milliseconds to days
                const totalCost = days * dailyRate;
                totalCostInput.value = totalCost.toFixed(2);
            }
        }

        // Add event listeners to recalculate cost when dates change
        startDateInput.addEventListener('change', calculateTotalCost);
        endDateInput.addEventListener('change', calculateTotalCost);
    </script>
</body>

</html>
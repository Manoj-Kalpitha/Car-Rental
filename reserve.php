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

                <!-- Total Cost -->
                <label for="total_cost">Total Cost</label>
                <input type="text" id="total_cost" name="total_cost" value="0.00" readonly>

                <!-- Terms and Conditions -->
                <label class="d-flex justify-content-start p-0 m-0">
                    <input type="checkbox" name="agree_terms" id="agree_terms" required class="form-check-input">
                    <span class="ms-2">I agree to the <a href="#terms-modal" id="terms-link">Terms and Conditions</a>.</span>
                </label>
                <!-- Submit Button -->
                <button type="submit">Reserve Car</button>
            </form>
        </section>

        <!-- Terms and Conditions Modal (optional) -->
        <div id="terms-modal" class="terms-modal" style="display:none;">
            <div class="modal-content">
                <span class="close-btn" onclick="document.getElementById('terms-modal').style.display='none'">&times;</span>
                <h2>Terms and Conditions</h2>
                <p><strong>1. Reservation and Payment:</strong> All reservations require a valid payment method. Payments must be made in full before confirming the reservation. The full payment is based on the rental period and car selected.</p>
                <p><strong>2. Reservation Period:</strong> The rental period begins on the reservation start date and ends on the reservation end date as selected by the customer.</p>
                <p><strong>3. Late Return Policy:</strong> If the car is not returned on or before the reservation end date, a charge of 5000 LKR per day will apply for each additional day the car is held beyond the agreed return date.</p>
                <p><strong>4. Damage and Liability:</strong> The customer is responsible for any damages, loss, or theft of the car during the rental period. In the case of any damage, the customer will be liable for repair costs, and any insurance provided by the rental company will not cover these expenses.</p>
                <p><strong>5. Fuel Policy:</strong> The car should be returned with the same amount of fuel as when it was rented. A refueling charge will be applied if the car is returned with less fuel.</p>
                <p><strong>6. Cancellations and Refunds:</strong> Cancellations made more than 48 hours before the reservation start date will receive a full refund. Cancellations made within 48 hours of the reservation start date may incur a cancellation fee.</p>
                <p><strong>7. Driver Requirements:</strong> The driver must be at least 21 years of age and possess a valid driver's license. Additional charges may apply for drivers under 25.</p>
                <p><strong>8. Insurance:</strong> Basic insurance is included in the rental, but the customer may choose to purchase additional coverage at the time of booking.</p>
                <p><strong>9. Governing Law:</strong> These terms and conditions are governed by the laws of Sri Lanka, and any disputes will be subject to the jurisdiction of Sri Lankan courts.</p>
            </div>
        </div>

        <script>
            // Show the terms and conditions modal when the link is clicked
            document.getElementById("terms-link").addEventListener("click", function(e) {
                e.preventDefault();
                document.getElementById("terms-modal").style.display = "block";
            });

            // Close the modal when the user clicks the close button
            function closeModal() {
                document.getElementById("terms-modal").style.display = "none";
            }
        </script>

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
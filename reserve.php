<?php
session_start();
include_once "./include/db.php";

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $stmt = $conn->prepare("SELECT * FROM cars WHERE car_id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
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
    <title>Reservation Page</title>

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
    <?php
    include_once "./include/nav.php";
    ?>
    <div class="main-container">
        <header>
            <h1><?php ?></h1>
            <p>Please fill out the form below to reserve a table.</p>
        </header>

        <section class="reservation-form">
            <form action="#" method="POST">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" required placeholder="John Doe">

                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" required placeholder="example@email.com">

                <label for="phone">Phone Number</label>
                <input type="tel" id="phone" name="phone" required placeholder="(123) 456-7890">

                <label for="date">Reservation Date</label>
                <input type="date" id="date" name="date" required>

                <label for="time">Reservation Time</label>
                <input type="time" id="time" name="time" required>

                <label for="guests">Number of Guests</label>
                <select id="guests" name="guests" required>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select>

                <button type="submit">Reserve Table</button>
            </form>
        </section>


    </div>

    <?php
    include_once "./include/footer.php";
    ?>

</body>

</html>
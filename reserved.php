<?php
if (isset($_GET["orderId"])) {
    $id = $_GET["orderId"];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Placed</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css' integrity='sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==' crossorigin='anonymous' />

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        /* Global Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Roboto', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: linear-gradient(45deg, #FF4081, #9C27B0);
            color: #fff;
            overflow: hidden;
        }

        /* Main Container */
        .order-container {
            text-align: center;
            padding: 30px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
            width: 90%;
            max-width: 400px;
            animation: fadeIn 1.5s ease-out;
        }

        .order-container h1 {
            font-size: 2.5em;
            font-weight: 700;
            margin-bottom: 10px;
            animation: slideInFromLeft 1s ease-out;
        }

        .order-container p {
            font-size: 1.2em;
            margin-bottom: 20px;
            animation: slideInFromRight 1s ease-out;
        }

        .order-container .order-id {
            font-size: 1.4em;
            font-weight: 700;
            margin-top: 10px;
            background: #FF9800;
            padding: 8px 20px;
            border-radius: 5px;
            animation: bounceIn 1s ease-in-out;
        }

        .order-container .cta-button {
            padding: 12px 30px;
            background-color: #4CAF50;
            color: #fff;
            font-size: 1.1em;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: transform 0.2s ease-in-out;
            animation: pulse 2s infinite;
        }

        .order-container .cta-button:hover {
            transform: scale(1.05);
        }

        /* Keyframes */
        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: scale(0.8);
            }

            100% {
                opacity: 1;
                transform: scale(1);
            }
        }

        @keyframes slideInFromLeft {
            0% {
                opacity: 0;
                transform: translateX(-30px);
            }

            100% {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slideInFromRight {
            0% {
                opacity: 0;
                transform: translateX(30px);
            }

            100% {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes bounceIn {
            0% {
                transform: translateY(-10px);
                opacity: 0;
            }

            50% {
                transform: translateY(5px);
                opacity: 1;
            }

            100% {
                transform: translateY(0);
            }
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.1);
            }

            100% {
                transform: scale(1);
            }
        }
    </style>
</head>

<body>
    <div class="order-container">
        <h1>Order Confirmed!</h1>
        <p>Thank you for your purchase. Your order is being processed and we will be contact shortly.</p>
        <div class="order-id">Order ID: <?php echo $id; ?></div>
        <button class="cta-button mt-3" onclick="window.location.href='index.php'">Return to Home</button>
    </div>
</body>

</html>
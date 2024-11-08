<?php

@include './include/db.php';


?>




<?php


session_start();

if (isset($_POST['submit'])) {

    $filter_email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
    $email = mysqli_real_escape_string($conn, $filter_email);
    $filter_pass = filter_var($_POST['pass'], FILTER_SANITIZE_STRING);
    $pass = mysqli_real_escape_string($conn, md5($filter_pass));

    $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');


    if (mysqli_num_rows($select_users) > 0) {

        $row = mysqli_fetch_assoc($select_users);

        if ($row['user_type'] == 'admin') {

            $_SESSION["admin"] = true;
            $_SESSION['user_name'] = $row['name'];
            $_SESSION['user_email'] = $row['email'];
            $_SESSION['user_id'] = $row['id'];


            header('location:./index.php');
        } elseif ($row['user_type'] == 'user') {

            $_SESSION['user_name'] = $row['name'];
            $_SESSION['user_email'] = $row['email'];
            $_SESSION['user_id'] = $row['id'];
            header('location:./index.php');
        } else {
            $message3[] = 'no user found!';
        }
    } else {
        $message3[] = 'incorrect email or password!';
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://icons.getbootstrap.com/?q=fac">
</head>
</head>

<body>

    <!-- header  -->
    <?php include('include/nav.php'); ?>

    <!--Login-->
    <div class="form">
        <div class="main heading text-center">
            <h2><span>Sign </span>In</h2>
        </div>
        <div class="container py-3">
            <div class="row">
                <div class="col-md-6">
                    <div class="form_sec1">
                        <form action="" method="post">
                            <div class="">
                                <div class="mb-3">

                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" name="email" placeholder="Enter Your email" required><br>
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="pass" placeholder="Enter Your password" required>

                                </div>
                                <p>Create New Account: <a href="registration.php">Sign Up</a></p>
                                <button type="submit" name="submit" class="button align-items-center text-center">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form_sec1">
                        <img src="./Assest/img/main2.png " class="img-fluid" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- footer -->
    <?php include('include/footer.php'); ?>

</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
    crossorigin="anonymous"></script>

</html>
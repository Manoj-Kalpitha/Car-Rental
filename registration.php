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


    <!--Registrations-->
    <div class="form">
        <div class="main heading text-center">
            <h2><span>Sign </span>Up</h2>
        </div>
        <div class="container py-3">
            <div class="row">
                <div class="col-md-6">
                    <div class="form_sec1">
                        <form action="./include/signUp.php" method="post">
                            <div class="">
                                <div class="mb-3">
                                    <label for="username">User Name</label>
                                    <input type="text" class="form-control" name="username"
                                        placeholder="Enter Your name" required><br>
                                    <!-- <label for="password">Last Name</label>
                                    <input type="email" class="form-control" placeholder="Enter Last name" required> -->

                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="Enter Your email"
                                        required><br>
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="password"
                                        placeholder="Enter Your password" required><br>
                                    <label for="repeatpassword">Repeat Password</label>
                                    <input type="password" class="form-control" name="repeatpassword"
                                        placeholder="Repeat password" required>

                                </div>
                                <p>Already Have An Account: <a href="login.php">Sign In</a></p>
                                <button type="submit" name="submit"
                                    class="button align-items-center text-center">Register</button>
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
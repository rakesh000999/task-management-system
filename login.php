<?php require './connection/config.php'; ?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Login</title>
</head>

<body>
    <div class="container my-5 py-5" style="max-width: 600px;">
        <h1 class="text-center text-success">Login to Continue</h1>
        <?php
        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            if ($email != "" && $password != "") {
                $password = md5($password);
                $select_query = "SELECT * FROM join_users WHERE email = '$email' AND password = '$password'";
                $select_result = mysqli_query($conn, $select_query);
                $user = mysqli_fetch_assoc($select_result);

                if ($user) {
                    session_start();
                    $_SESSION['email'] = $user['email'];
                    echo header('Location:index.php');
                } else {
        ?>  
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Credentials donot match!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php
                }
            } else {
                header('refresh:0.8; url=login.php');
                ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    All fields are required!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                </div>
        <?php
            }
        }
        ?>

        <form action="" method="post">
            <div class="form-group mb-3">
                <label for="email" class="form-label"> Email</label>
                <input type="email" class="form-control" name="email" id="email">
            </div>
            <div class="form-group mb-3">
                <label for="password" class="form-label"> Password</label>
                <input type="password" class="form-control" name="password" id="password">
            </div>

            <button type="submit" class="btn btn-primary" name="submit">Login</button>
            <div class="text-center">
                <a href="register.php">Register Now</a>
            </div>
        </form>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>


</html>
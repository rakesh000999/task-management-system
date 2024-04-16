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
        <h1 class="text-center text-danger my-2">Register to Continue</h1>
        <?php
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];

            if ($name != "" && $email != "" && $password != "" && $confirm_password != "") {
                if ($password === $confirm_password) {
                    $select_query = "SELECT * FROM join_users WHERE email = '$email' ";
                    $select_result = mysqli_query($conn, $select_query);
                    $count = mysqli_num_rows($select_result);

                    if ($count == 0) {
                        $password = md5($password);
                        $insert_query = "INSERT INTO join_users(name, email, password) VALUES('$name','$email','$password')";
                        $insert_result = mysqli_query($conn, $insert_query);
                        if ($insert_result) {
                            
                            header('refresh:1, url=login.php');
                         
        ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                You are registered successfully. Please login to continue.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php
                        }
                    } else {
                        ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            This email already exists.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php
                    }
                } else {
                    ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Password do not match!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php
                }
            } else {
                ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    All fields are required!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
        <?php
            }
        }


        ?>


        <form action="#" method="post">
            <div class="form-group mb-3">
                <label for="text" class="form-label"> Name</label>
                <input type="text" class="form-control" name="name" id="text">
            </div>
            <div class="form-group mb-3">
                <label for="email" class="form-label"> Email</label>
                <input type="email" class="form-control" name="email" id="email">
            </div>
            <div class="form-group mb-3">
                <label for="password" class="form-label"> Password</label>
                <input type="password" class="form-control" name="password" id="password">
            </div>
            <div class="form-group mb-3">
                <label for="confirm_password" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" name="confirm_password" id="confirm_password">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Register</button>
            
            <div class="text-center">
                <a href="login.php">Login</a>
            </div>
        </form>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>


</html>
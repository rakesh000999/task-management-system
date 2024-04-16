<?php
session_start();
if (isset($_SESSION['email'])) {
} else {
    echo header('Location:login.php');
}
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>TMS</title>
    <style>
        .container {
            text-align: center;
            margin-top: 150px;
            /*Adjust the top margin as needed*/
        }
    </style>
</head>

<body>
    <div class="container  justify-content-center align-items-center">
        <h1>Enter to the System...</h1>
        <a href="../databaseconnection/tasks/create.php" class="btn btn-primary mt-3">Enter</a>
        <div>
            <a class="btn btn-danger mt-3" href="logout.php">Logout</a>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>
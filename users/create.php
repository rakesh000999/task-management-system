<?php require './../connection/config.php'; ?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Add Data</title>
</head>

<body>
    <?php include('./../layouts/navbar.php'); ?>


    <div class="container">

        <?php

        if (isset($_POST['userSubmit'])) {

            $name = $_POST['userName'];
            $email = $_POST['userEmail'];
            $password = $_POST['userPassword'];
            $address = $_POST['userAddress'];
            $contactNo = $_POST['userContact'];

            if ($name != "" && $email != "" && $password != "" && $address != "" && $contactNo != "") {
                if (strlen($name) > 8) {
                    $insert_query = "INSERT INTO users(name,email,password,address,contact_no) VALUES('$name','$email','$password','$address','$contactNo')";

                    $insert_result = mysqli_query($conn, $insert_query);

                    if ($insert_result) {
                        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Data added successfully.</strong> 
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                    }
                } else {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Name must be greater than 8 characters.</strong> 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
                }
            } else {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Please fill the form.</strong> 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
            }
        }

        ?>

        <form class=" g-3 " action=" #" method="post">
            <div class="">
                <label for="validationCustom01" class="form-label">Name</label>
                <input type="text" class="form-control" id="validationCustom01" value="" name="userName">

            </div>
            <div class="">
                <label for="validationCustom02" class="form-label">E-mail</label>
                <input type="email" class="form-control" id="validationCustom02" value="" name="userEmail">

            </div>
            <div class="">
                <label for="validationCustomUsername" class="form-label">Password</label>
                <div class="input-group">
                    <!-- <span class="input-group-text" id="inputGroupPrepend">@</span> -->
                    <input type="password" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="userPassword">

                </div>
            </div>
            <div class="">
                <label for="validationCustom03" class="form-label">Address</label>
                <input type="text" class="form-control" id="validationCustom03" name="userAddress">

            </div>
            <div class="">
                <label for="validationCustom05" class="form-label">Contact No.</label>
                <input type="text" class="form-control" id="validationCustom05" name="userContact">


            </div>

            <div class="my-3">
                <button class="btn btn-primary" type="submit" name="userSubmit"> Submit form</button>
            </div>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>
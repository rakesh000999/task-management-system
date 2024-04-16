<?php
require '../connection/config.php';
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Skills</title>
</head>

<body>
    <div class="container my-4">


        <?php

        if (isset($_POST['submit'])) {
            $description = $_POST['description'];
            $skill = $_POST['skill'];
            $percentage = $_POST['percentage'];

            if ($description != "" && $skill != "" && $percentage != "") {
                $insert_query = "INSERT  INTO skills (description, skill, percentage) VALUES ('$description','$skill','$percentage')";
                $insert_result = mysqli_query($conn, $insert_query);

                echo $insert_result;
               
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

        <form action="#" method="post" class="row g-3 needs-validation" novalidate>
            <div class="col-md-4">
                <label for="validationCustom01" class="form-label">Description</label>
                <textarea class="form-control" id="validationCustom01" value="M" name="description">
                </textarea>
            </div>
            <div class="col-md-4">
                <label for="validationCustom02" class="form-label">Skill</label>
                <input type="text" class="form-control" id="validationCustom02" value="" name="skill">

            </div>

            <div class="col-md-4">
                <label for="validationCustom03" class="form-label">Percentage</label>
                <input type="number" class="form-control" id="validationCustom02" value="" name="percentage">

            </div>

            <div class="col-12">
                <button class="btn btn-primary" type="submit" name="submit">Submit form</button>
            </div>
        </form>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>
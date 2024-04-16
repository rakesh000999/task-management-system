<?php require './../connection/config.php';
require '../process/secure.php';
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Title</title>
</head>

<body>

    <?php
    // just included ...here is the file path 
    include '../layouts/navbar.php';

    ?>

    <div class="container">

        <?php
        if (isset($_POST['btnSubmit'])) {
            $title = $_POST['title'];
            $description = $_POST['description'];
            $time = $_POST['time'];

            // echo $title; 
            // if above is printed -> hence data is fatched...
            if ($title != "" && $description != "" && $time != "") {
                if (strlen($title) > 8) {
                    $insert_query = "INSERT INTO tasks(title,description,time) VALUES('$title', '$description','$time')";
                    // echo $insert_query;
                    // now automating through the system,i.e. cooding
                    $insert_result = mysqli_query($conn, $insert_query);

                    if ($insert_result) {
        ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            Task added successfully.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                <?php
                    }
                } else {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Title must be greater than 8 characters
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div> ';
                }
            } else {
                // echo "All fields are required";
                ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    All field are required.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
        <?php
            }
        }

        ?>


        <form action="#" method="post" class="row g-3 needs-validation ">
            <div class="col-md-4">
                <label for="validationCustom01" class="form-label">Title</label>
                <input type="text" class="form-control" id="validationCustom01" name="title" value="">

            </div>
            <div class="col-md-4">
                <label for="validationCustom02" class="form-label">Description</label>
                <input type="text" class="form-control" id="validationCustom02" name="description" value="">

            </div>
            <div class="col-md-4">
                <label for="validationCustomUsername" class="form-label">Time</label>
                <div class="input-group">
                    <input type="time" class="form-control" id="validationCustomUsername" name="time" aria-describedby="inputGroupPrepend">

                </div>
            </div>
            <div class="col-12">
                <button class="btn btn-primary" name="btnSubmit" type="submit">Submit form</button>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>
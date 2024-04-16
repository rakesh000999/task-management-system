<?php require './../connection/config.php';
require '../process/secure.php';
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Add Image</title>
</head>

<body>

    <?php include './../layouts/navbar.php'; ?>

    <div class="container my-5">
        <?php


        if (isset($_POST['submit'])) {
            $title = $_POST['title'];
            $image = $_FILES['image'];

            $image_name = $image['name']; //name is pre-defined...
            $image_size = $image['size']; // size is pre-defined...

            if ($title != "" && $image_name != "") {
                $image_array = explode('.', $image_name);
                $extension = end($image_array);

                if ($extension === 'jpg' || $extension === 'png' || $extension === 'jpeg') {
                    if ($image_size === 0) {
                        echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        File size exceeds maximum value. Only file less than 2 MB is supported.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                    } elseif ($image_size > 0 && $image_size < 2097152) {
                        $image_final_name = strtolower(str_replace(" ", "", $title) . "-" . time() . "." . $extension);
                        // echo $image_final_name;
                        if (move_uploaded_file($image['tmp_name'], "../uploads/" . $image_final_name)) {
                            $insert_query = "INSERT INTO new_images (title, name) VALUES ('$title', '$image_final_name')";
                            $insert_result = mysqli_query($conn, $insert_query);

                            if ($insert_result) {
                                echo header('refresh: 2, url:index.php');
        ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    Image added successfully!
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                        <?php
                            }
                        }
                    } else {
                        ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            File type is not supported. Only jpg, png and jpeg is supported!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                <?php
                    }
                } else {
                }
            } else {
                // header("refresh:1;");
                ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>All fields are required!</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
        <?php
            }
        }
        ?>

        <form action="#" method="post" enctype="multipart/form-data">
            <div class="form-group mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" id="title" name="title" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" id="image" name="image" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Save Image</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>
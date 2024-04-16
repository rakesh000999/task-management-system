<?php require './../connection/config.php';
require '../process/secure.php'; ?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($id == "") {
        echo header('Location: index.php');
    }
} else {
    echo header('Location: index.php?msg=no_id_available');
}

// fetching the id bha ko data..
$select_query = "SELECT * FROM tasks WHERE id = $id";
$select_result = mysqli_query($conn, $select_query);
$row = mysqli_fetch_assoc($select_result);

if ($row == null) {
    echo header('Location: index.php');
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Edit Task</title>
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

            // if above is printed -> hence data is fatched...
            if ($title != "" && $description != "" && $time != "") {
                if (strlen($title) > 8) {
                    $update_query = "UPDATE tasks SET title='$title', description = '$description', time = '$time' WHERE id = $id ";
                    // echo $update;
                    // now automating the process
                    $update_results = mysqli_query($conn, $update_query);
                    if ($update_results) {
                        header("refresh:2, url=index.php");
                        // echo header('Location:index.php');

        ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Data is updated successfully.</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php
                    }
                } else {
                    ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        Title must be greater than 8 characters.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                <?php
                }
            } else {
                ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>All fields are required.</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
        <?php
            }
        }

        ?>


        <form action="#" method="post" class="row g-3 needs-validation mx-auto">
            <div class="group mb-3">
                <label for="validationCustom01" class="form-label">Title</label>
                <input type="text" class="form-control" id="validationCustom01" name="title" value="<?php echo $row['title']; ?>">

            </div>
            <div class="group mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea type="text" class="form-control" id="validationCustom02" name="description" value=">"><?php echo $row['title']; ?></textarea>

            </div>
            <div class="group mb-3">
                <label for="validationCustomUsername" class="form-label">Time</label>
                <div class="input-group">
                    <!-- <span class="input-group-text" id="inputGroupPrepend">@</span> -->
                    <input type="time" class="form-control" id="validationCustomUsername" name="time" aria-describedby="inputGroupPrepend" value="<?php echo $row['time']; ?>">

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
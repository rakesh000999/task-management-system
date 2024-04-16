<?php require '../connection/config.php';
require '../process/secure.php';
?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if ($id == "") {
        echo header('Location:index.php');
    }
} else {
    echo header('Location:index.php?msg=no_id_available');
}

$select_query = "SELECT * FROM new_images WHERE id = $id";
$select_result = mysqli_query($conn, $select_query);
$row = mysqli_fetch_assoc($select_result);
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>View</title>
</head>

<body>
    <?php include '../layouts/navbar.php'; ?>

    <div class="card" style="width:18rem;">
        <img src="../uploads/<?php echo $row['name']; ?>" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Title: <?php echo $row['title']; ?></h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>
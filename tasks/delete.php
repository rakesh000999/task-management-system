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

$delete_query = "DELETE FROM tasks WHERE id = $id";
$delete_result = mysqli_query($conn, $delete_query);
if ($delete_result) {
    echo header('Location: index.php');
}
?> 
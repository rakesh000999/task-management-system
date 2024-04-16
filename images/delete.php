<?php require('../connection/config.php');
require '../process/secure.php';
?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($id == "") {
        echo header('Location: index.php');
    }
} else {
    echo header('Location: index.php?msg=no_id_available');
}

$select_query = "SELECT * FROM new_images WHERE id = $id";
$select_results = mysqli_query($conn, $select_query);
$row = mysqli_fetch_assoc($select_results);
unlink('../uploads/' . $row['name']);
$delete_query = "DELETE FROM new_images WHERE id = $id";
$delete_result = mysqli_query($conn, $delete_query);
if ($delete_result) {
    echo header('Location: index.php');
}

?>
<?php require './../connection/config.php';
require '../process/secure.php';

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

$limit = 3;

$offset = ($page - 1) * $limit;

$select_query = "SELECT * FROM tasks";
$select_result = mysqli_query($conn, $select_query);
$total_data = mysqli_num_rows($select_result);

$total_page = ceil($total_data / $limit);

// echo $total_page;
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Task Management System</title>
</head>

<body>
    <?php
    include '../layouts/navbar.php';
    ?>

    <div class="container mt-5">
        <h1 class="mb-4">View Task</h1>


        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead class="bg-dark text-white">
                    <tr>
                        <th scope="col">S.N</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Time</th>
                        <th scope="row">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $select_query = "SELECT * FROM tasks LIMIT $offset, $limit";
                    $select_result = mysqli_query($conn, $select_query);
                    $i = 0;
                    while ($row = mysqli_fetch_assoc($select_result)) {
                    ?>
                        <tr>
                            <td><?php echo ++$i; ?></td>
                            <td><?php echo $row['title']; ?></td>
                            <td><?php echo $row['description']; ?></td>
                            <td><?php echo $row['time'] ?></td>
                            <td>
                                <a href="view.php?id=<?php echo $row['id']; ?>" class="btn btn-sm mb-2 btn-info">View</a>
                                <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-sm mb-2 btn-primary">Edit</a>
                                <a onclick="return confirm('Are you sure you want to delete this task?')" href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-sm mb-2 btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php
                    }

                    ?>

                </tbody>
            </table>

            <!-- Pagination -->
            <?php
            $current_page = $page;
            $current_page_for_next = $page;
            ?>
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-start">
                    <li class="page-item <?php echo ($current_page == 1) ? 'disabled' : ''; ?>">
                        <a class="page-link" href="?page=<?php echo --$current_page; ?>">Previous</a>
                    </li>
                    <?php
                    for ($i = 1; $i <= $total_page; $i++) {
                    ?>
                        <li class="page-item <?php echo ($page == $i) ? 'active' : ''; ?> ">
                            <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                        </li>

                    <?php
                    }
                    ?>
                    <li class="page-item <?php echo ($current_page_for_next == $total_page) ? 'disabled' : ''; ?>">

                        <a class="page-link" href="?page=<?php echo ++$current_page_for_next; ?>">Next</a>
                      
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <?php include './../layouts/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>
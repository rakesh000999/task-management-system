

<?php include './../connection/config.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Dashboard</title>
</head>

<body>



    <div class="container mt-5">
        <h1 class="mb-4">Users Data</h1>

        <?php
        // Query to select data from the 'users' table
        $sql = "SELECT * FROM users";
        $result = $conn->query($sql);

        // Check for errors in the query
        if (!$result) {
            die("Query failed: " . $conn->error);
        }
        // Check if there are rows in the result
        if ($result->num_rows > 0) {
            ?>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">S.N.</th>
                            <th scope="col">Users</th>
                            <th scope="col">Email</th>
                            <th scope="col">Password</th>
                            <th scope="col">Address</th>
                            <th scope="col">Contact No.</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Counter for serial number
                        $serialNumber = 1;

                        // Fetch data and display in a table
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<th scope='row'>" . $serialNumber . "</th>";
                            echo "<td>" . $row['name'] . "</td>";
                            echo "<td>" . $row['email'] . "</td>";
                            echo "<td>" . $row['password'] . "</td>";
                            echo "<td>" . $row['address'] . "</td>";
                            echo "<td>" . $row['contact_no'] . "</td>";
                            echo "</tr>";

                            // Increment the serial number
                            $serialNumber++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        <?php
        } else {
            echo "0 results";
        }
        // Close the database connection
        $conn->close();
        ?>
    </div>

    <!-- Bootstrap JS and Popper.js (if needed) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>


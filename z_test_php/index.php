<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>PHP Form</title>
</head>

<body>
    <div class="container my-4">

        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <div class="form-group">
                <label for="name" class="form-label">Name:</label>
                <input class="form-control" type="text" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input class="form-control" type="email" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="website" class="form-label">Website</label>
                <input class="form-control" type="text" id="website" name="website">
            </div>
            <div class="form-group">
                <label for="comment" class="form-label">Comment</label>
                <textarea class="form-control" type="comment" id="comment" name="website"></textarea>
            </div>
            <div class="form-group">
                <label for="gender" class="form-label">Gender</label><br>
                <input type="radio" name="gender" value="female">Female
                <input type="radio" name="gender" value="male">Male
                <input type="radio" name="gender" value="other">Other
            </div>

            <button class="btn btn-primary btn-sm my-3">Submit</button>



        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>
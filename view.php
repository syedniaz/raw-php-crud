<?php
session_start();

include "dbcon.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Patient</title>

    <link rel="stylesheet" href="style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>

</head>

<body>

    <div class="container mt-5">

        <h2>View Patient Details</h2>

        <button class="btn btn-danger"><a href="index.php">Back</a></button>

        <?php
        if (isset($_GET['id'])) {
            $id = mysqli_real_escape_string($con, $_GET['id']);
            $query = "SELECT * FROM details WHERE id='$id'";
            $result = mysqli_query($con, $query);

            if (mysqli_num_rows($result) > 0) {
                $patient = mysqli_fetch_array($result);
        ?>

                <form action="">
                    <input type="hidden" name="id" value="<?= $patient['id']; ?>">
                    <div class="mb-3">
                        <label>Patient Name</label>
                        <input type="text" name="name" value="<?= $patient['name']; ?>" class="form-control" readonly>
                    </div>
                    <div class="mb-3">
                        <label>Patient Email</label>
                        <input type="email" name="email" value="<?= $patient['email']; ?>" class="form-control" readonly>
                    </div>
                    <div class="mb-3">
                        <label>Patient Phone No</label>
                        <input type="phone" name="phone" value="<?= $patient['phone']; ?>" class="form-control" readonly>
                    </div>
                </form>
        <?php
            } else {
                echo "<h4>No Id Found</h4>";
            }
        }
        ?>

    </div>

</body>

</html>
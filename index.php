<?php
session_start();

include "dbcon.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Details</title>

    <link rel="stylesheet" href="style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>
</head>

<body>

    <div class="container mt-5">

        <div class="container">
            <h2>Patient Details</h2>

            <button type="button" class="btn btn-primary mt-3"><a class="" href="add.php">Add Patient</a></button>
        </div>

        <div class="container my-3">
            <div class="container row">
                <form action="" method="post" class="col-10">
                    <div class="row">
                        <div class="col-10">
                            <div class="mb-3">
                                <label for="id" class="form-label">Enter ID to filter</label>
                                <input type="number" class="form-control" id="id" name="id">
                            </div>
                        </div>
                        <div class="col-2 align-self-center m-0">
                            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                        </div>
                    </div>
                </form>

                <div class="col-2 text-center my-auto">
                    <button class="btn btn-success btn-lg"><a href="index.php">Reset</a></button>
                </div>

            </div>

            <table class="table mt-3">
                <thead>
                    <tr>
                        <th scope="col">Patient Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    if (isset($_POST['id'])) {
                        $id = $_POST['id'];
                        $result = mysqli_query($con, "SELECT * FROM details WHERE id = $id");
                    } else {
                        $result = mysqli_query($con, "SELECT * FROM details");
                    }
                    $data = $result->fetch_all(MYSQLI_ASSOC);

                    foreach ($data as $row) : ?>
                        <tr>
                            <th><?= htmlspecialchars($row['id']) ?></th>
                            <td><?= htmlspecialchars($row['name']) ?></td>
                            <td><?= htmlspecialchars($row['email']) ?></td>
                            <td><?= htmlspecialchars($row['phone']) ?></td>
                            <td>
                                <button type="button" class="btn btn-primary" id="<?= $row['id']; ?>"><a class="" href="view.php?id=<?= $row['id']; ?>">View</a></button>
                                <button type="button" class="btn btn-success" id="<?= $row['id']; ?>"><a class="" href="edit.php?id=<?= $row['id']; ?>">Edit</a></button>
                                <form action="code.php" method="POST" class="d-inline">
                                    <button type="submit" name="delete" value="<?= $row['id']; ?>" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach ?>

                </tbody>
            </table>

        </div>

</body>

</html>
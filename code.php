<?php
session_start();
require 'dbcon.php';

if (isset($_POST['save_patient'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);

    $query = "INSERT INTO details (name,email,phone) VALUES ('$name','$email','$phone')";

    $query_run = mysqli_query($con, $query);
    if ($query_run) {
        header("Location: index.php");
        exit(0);
    } else {
        header("Location: index.php");
        exit(0);
    }
}

if (isset($_POST['delete'])) {
    $id = mysqli_real_escape_string($con, $_POST['delete']);

    $query = "DELETE FROM details WHERE id='$id'";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        header("Location: index.php");
        exit(0);
    } else {
        header("Location: index.php");
        exit(0);
    }
}


if (isset($_POST['update_patient'])) {
    $id = mysqli_real_escape_string($con, $_POST['id']);

    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);

    $query = "UPDATE details SET name='$name', email='$email', phone='$phone' WHERE id='$id' ";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        header("Location: index.php");
        exit(0);
    } else {
        echo "Error: " . mysqli_error($con);
        exit(0);
    }
}

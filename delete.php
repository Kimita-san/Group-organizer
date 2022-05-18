<?php
require_once 'config.php';
require_once 'header.php';

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($dbcon, (int) $_GET['id']);
    $sql = "DELETE FROM adminpost WHERE id = '$id'";
    $result = mysqli_query($dbcon, $sql);

    if ($result) {
        header('location: admin.php');
    } else {
        echo "Failed to delete." . mysqli_connect_error();
    }
}
mysqli_close($dbcon);

<?php
include('dbcon.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete query
    $query = "DELETE FROM students WHERE id = $id";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query Failed: " . mysqli_error($connection));
    } else {
        header("Location: index.php?delete_msg=Record deleted successfully!");
        exit();
    }
} else {
    header("Location: index.php?delete_msg=Invalid request!");
    exit();
}
?>

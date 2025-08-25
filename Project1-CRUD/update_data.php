<?php
include('dbcon.php');

if(isset($_POST['update_students'])){
    $id = $_GET['id'];
    $fname = $_POST['f_name'];
    $lname = $_POST['l_name'];
    $age = $_POST['age'];

    $query = "UPDATE students SET first_name='$fname', last_name='$lname', age='$age' WHERE id=$id";
    $result = mysqli_query($connection, $query);

    if(!$result){
        die("Query Failed: " . mysqli_error($connection));
    } else {
        header("Location: index.php?update_msg=Record updated successfully!");
        exit();
    }
}
?>

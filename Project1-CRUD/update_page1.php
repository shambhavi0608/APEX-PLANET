<?php include('header.php'); ?>
<?php include('dbcon.php'); ?>

<?php
$row = null; // initialize row

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // SQL query
    $query = "SELECT * FROM students WHERE id = $id";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query Failed: " . mysqli_error($connection));
    } else {
        // Agar record mila to assign karo
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
        }
    }
}
?>

<div class="container mt-4">
    <h2>Update Student</h2>

    <?php if ($row) { ?>
        <form action="update_data.php?id=<?php echo $id; ?>" method="POST">
            <div class="form-group">
                <label for="f_name">First Name</label>
                <input type="text" name="f_name" class="form-control" 
                       value="<?php echo $row['first_name']; ?>">
            </div>

            <div class="form-group">
                <label for="l_name">Last Name</label>
                <input type="text" name="l_name" class="form-control" 
                       value="<?php echo $row['last_name']; ?>">
            </div>

            <div class="form-group">
                <label for="age">Age</label>
                <input type="text" name="age" class="form-control" 
                       value="<?php echo $row['age']; ?>">
            </div>

            <br>
            <input type="submit" class="btn btn-success" name="update_students" value="Update">
            <a href="index.php" class="btn btn-secondary">Cancel</a>
        </form>
    <?php } else { ?>
        <div class="alert alert-danger">⚠️ No student found with this ID.</div>
    <?php } ?>
</div>

<?php include('footer.php'); ?>

<?php include('header.php'); ?>
<?php include('dbcon.php'); ?>

<div class="box1">
    <h2 id="main_title1">ALL STUDENTS </h2>
    <!-- Fixed button -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Add Students
    </button>
</div>

<table class="table table-bordered mt-3">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Second Name</th>
            <th>Age</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $query = "SELECT * FROM students";
        $result = mysqli_query($connection, $query);

        if(!$result){
            die("Query Failed: " . mysqli_error($connection));
        } else {
            while($row = mysqli_fetch_assoc($result)){  
        ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['first_name']; ?></td>
                    <td><?php echo $row['last_name']; ?></td>
                    <td><?php echo $row['age']; ?></td>
                    <td><a href="update_page1.php?id=<?php echo $row['id']; ?>" class="btn btn-success">UPDATE</a></td>
                    <td>
  <a href="delete.php?id=<?php echo $row['id']; ?>" 
     class="btn btn-danger"
     onclick="return confirm('Are you sure you want to delete this record?');">
     DELETE
  </a>
</td>

                </tr>
        <?php
            }
        }
        ?>
    </tbody>
</table>
<?php 
if(isset($_GET['message'])){
    echo"<h6>".$_GET['message']."</h6>";
}
   
?>
<?php 
if(isset($_GET['insert_msg'])){
    echo"<h6>".$_GET['insert_msg']."</h6>";
}
   
?>
<?php 
if(isset($_GET['delete_msg'])){
    echo "<h6>".$_GET['delete_msg']."</h6>";
}
?>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Student</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- FORM START -->
        <form action="/APEX-PLANET/CRUD_APP/insert_data.php" method="POST">
          <div class="form-group">
            <label for="f_name">First Name</label>
            <input type="text" name="f_name" class="form-control" >
          </div>
          <div class="form-group">
            <label for="l_name">Second Name</label>
            <input type="text" name="l_name" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="age">Age</label>
            <input type="number" name="age" class="form-control" required>
          </div>
          <br>
          <div class=".modal-footer"></div>
          <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <input type="submit" class="btn btn-success" name="add_students" value="ADD">
</div>

    </div>
        </form>
        <!-- FORM END -->
      </div>
    </div>
  </div>
</div>

<?php include('footer.php'); ?>
</body>
</html>

<?php include('header.php')?>
<?php include('db_connection.php')?>

    <div class="box1">
    <h2>ALL STUDENTS</h2>
    <button vlass="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">>ADD STUDENTS</button>
    </div>
    <table class="table table-hover table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Age</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
        </thead>

        <tbody>
            <?php 

                $query = "select * from `students`";

                $result = mysqli_query($connection, $query);

                if(!$result){
                    die("query failed".mysqlierror());
                }
                
                else{

                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['first_name']; ?></td>
                            <td><?php echo $row['last_name']; ?></td>
                            <td><?php echo $row['age']; ?></td>
                            <td><a href="update_p1.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Update</a></td>
                            <td><a href="delete_p1.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>
                        </tr>
                        <?php
                    }

                }
            ?>
      
      

        </tbody>

    </table>
    
<?php

        if(isset($_GET['message'])){
            echo "<h6>".$_GET['message']."</h6>";

        }
?>

<?php
        if(isset($_GET['insert_msg'])){
            echo "<h6>".$_GET['insert_msg']."</h6>";

        }

?>

<?php
        if(isset($_GET['update_msg'])){
            echo "<h6>".$_GET['update_msg']."</h6>";

        }

?>

<?php
        if(isset($_GET['delete_msg'])){
            echo "<h6>".$_GET['delete_msg']."</h6>";

        }

?>

<form action="insert_data.php" method="post">
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">ADD STUDENTS</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            
                <div class="form-group">
                    <label>First Name</label>
                    <input type="text" name="f_name" class="form-control">
                </div>

                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" name="l_name" class="form-control">
                </div>

                <div class="form-group">
                    <label>Age</label>
                    <input type="text" name="age" class="form-control">
                </div>
            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-success" name="add_students" value="add">
      </div>
    </div>
  </div>
</div>
</form>

    <?php include('footer.php')?>
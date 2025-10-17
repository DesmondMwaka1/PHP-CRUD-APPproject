<?php 

include('header.php'); 
include('dbcon.php'); 
?>
<div class="container">
    <?php
      if(isset($_GET['insert_message'])){
        echo "<h4>".$_GET['insert_message']."</h4>";
      }
    ?>
    <h2>Available Students</h2>
    
    <button class="create-button">
        <a href="create.php">
            ADD STUDENTS
        </a>
    </button>
    
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
                $query = "select*from `students`";  
                $result = mysqli_query($connection, $query);

                if(!$result){
                    // Corrected error handling syntax for safety
                    die("Failed to fetch data: " . mysqli_error($connection));
                }
                else{
                    while($row = mysqli_fetch_assoc($result)){
            ?>

                <tr>
                    <td><?php  echo $row['Id']; ?></td>
                    <td><?php  echo $row['F_name']; ?></td>
                    <td><?php  echo $row['L_name']; ?></td>
                    <td><?php  echo $row['Age']; ?></td>
                    <td> <a href="update_page.php?id=<?php  echo $row['Id']; ?>" class="btn btn-success">Update</a> </td>
                    <td> <a href="delete_page.php?id=<?php  echo $row['Id']; ?>" class="btn btn-fail">Delete</a> </td>
                </tr>

            <?php        
                    }
                }
            ?>
        </tbody>
    </table>
</div>
<?php
if(isset($_GET['update_message'])){
    echo "<h4>".$_GET['update_message']."</h4>";
}
?>
<?php 
include('footer.php'); 
?>
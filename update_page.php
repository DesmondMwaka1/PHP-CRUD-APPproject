<?php 
include('header.php'); 
include('dbcon.php'); 

if(isset($_GET['id'])){
    $id = $_GET['id'];
} else if(isset($_GET['id_new'])){
    $id = $_GET['id_new']; 
} else {
    die("Error: No student ID provided for update.");
}

$query_select = "select * from `students` where `Id`='$id'";  
$result_select = mysqli_query($connection, $query_select);

if(!$result_select){
    die("Failed to fetch data for form: " . mysqli_error($connection));
} else {
    $row = mysqli_fetch_assoc($result_select);
    if (!$row) {
        die("Invalid Student ID.");
    }
}

if(isset($_POST['update_student'])){

    $fname = trim($_POST['firstname']);
    $lname = trim($_POST['lastname']);
    $age = trim($_POST['Theage']);

    $query_update = "UPDATE `students` SET `F_name`='$fname', `L_name`='$lname', `Age`='$age' WHERE `Id`='$id'";
    
    $result_update = mysqli_query($connection, $query_update);

    if(!$result_update){
        die("Failed to update data: " . mysqli_error($connection));
    }
    else{
        header('location:index.php?update_message=Student data updated successfully!');
        exit;
    }
}


?>

<div class="modal-body">
  <form action="update_page.php?id=<?php echo $id?>" method="POST">
    <div class="form-group">
      <label for="firstname">First Name</label>
      <input type="text" name="firstname" class="form-input" value="<?php echo $row['F_name'] ?>">
    </div>
    <div class="form-group">
      <label for="lastname">Last Name</label>
      <input type="text" name="lastname" class="form-input" value="<?php echo $row['L_name'] ?>">
    </div>
    <div class="form-group">
      <label for="Theage">Age</label>
      <input type="text" name="Theage" class="form-input" value="<?php echo $row['Age'] ?>">
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">
        <a href="/crudApp/index.php">CLOSE</a>
      </button>
      <input type="submit" class="btn btn-primary" name="update_student" value="UPDATE">
    </div>
  </form>
</div>

<?php
include('footer.php'); 
?>

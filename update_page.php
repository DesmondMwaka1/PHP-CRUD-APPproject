<?php 
include('header.php'); 
include('dbcon.php'); 
?>

<?php
if(isset($_GET['id'])){
    $id=$_GET['id'];

    $query = "select*from `students` where `Id`='$id'";  
    $result = mysqli_query($connection, $query);

    if(!$result){
        die("Failed to fetch data: " . mysqli_error($connection));
    }
    else{
        $row=mysqli_fetch_assoc($result);
    }
}
 
?>

<div class="modal-body">
  <form action="insert_data.php" method="POST">
    <div class="form-group">
      <label for="fname">First Name</label>
      <input type="text" name="fname" class="form-input" value="<?php echo $row['F_name'] ?>">
    </div>
    <div class="form-group">
      <label for="lname">Last Name</label>
      <input type="text" name="lname" class="form-input" value="<?php echo $row['L_name'] ?>">
    </div>
    <div class="form-group">
      <label for="age">Age</label>
      <input type="text" name="age" class="form-input" value="<?php echo $row['Age'] ?>">
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
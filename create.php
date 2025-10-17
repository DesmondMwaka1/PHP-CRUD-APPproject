<?php include('header.php'); ?>
<?php include('dbcon.php'); ?>

<?php
  if(isset($_GET['message'])){
    echo "<h4>".$_GET['message']."</h4>";
  }
?>

<div class="modal-body">
  <form action="insert_data.php" method="POST">
    <div class="form-group">
      <label for="fname">First Name</label>
      <input type="text" name="fname" class="form-input">
    </div>
    <div class="form-group">
      <label for="lname">Last Name</label>
      <input type="text" name="lname" class="form-input">
    </div>
    <div class="form-group">
      <label for="age">Age</label>
      <input type="text" name="age" class="form-input">
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">
        <a href="/crudApp/index.php">Close</a>
      </button>
      <input type="submit" class="btn btn-primary" name="add_student" value="ADD">
    </div>
  </form>
</div>

<?php include('footer.php'); ?>    
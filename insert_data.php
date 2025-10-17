<?php include('dbcon.php'); ?>
<?php
   ini_set('display_errors', 1);
   ini_set('display_startup_errors', 1);
   error_reporting(E_ALL);

   if(isset($_POST['add_student'])){
      $fname=trim($_POST['fname']);
      $lname=trim($_POST['lname']);
      $age=trim($_POST['age']);

      if($fname=="" || $lname=="" ||$age==""){
        header('location:create.php?message=All fields must be filled!!');
        exit;
      }
      else{

    
       $query="insert into `students`(`F_name`,`L_name`,`Age`) values('$fname','$lname','$age')";
       $result=mysqli_query($connection,$query);

       if(!$result){
        die("Query failed".mysqli_error($connection));
       }
       else{
        header('location:index.php?insert_message=Student data added successfully!');
        exit;
       }
      }
   }
?>
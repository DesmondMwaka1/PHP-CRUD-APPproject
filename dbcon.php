<?php
    
    define("HOSTNAME","localhost");
    define("USER","root");
    define("PASSWORD","");
    define("DATABASE","Crud_App_proj");

    $connection = mysqli_connect(HOSTNAME,USER,PASSWORD,DATABASE);

    if(!$connection){
        die("Connection Failed!! " . mysqli_connect_error()); 
    }
?>
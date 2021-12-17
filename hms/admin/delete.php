<?php 
require_once("include/config.php");

$id = 0;
if(isset($_POST['code'])){
   $id = $_POST['code'];
   // Delete record
   $query = "delete from medicine_table where code =".$id;
   mysqli_query($con,$query);
   echo 1;
}

  
    
 



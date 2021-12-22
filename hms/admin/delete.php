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
if(isset($_POST['id'])){
   $id = $_POST['id'];
   // Delete record
   $query = "delete from nearbyAmbulance where id =".$id;
   mysqli_query($con,$query);
   echo 1;




}
if(isset($_POST['procedureID'])){
   $id = $_POST['procedureID'];
   // Delete record
   $query = "delete from procedureList where procedureID =".$id;
   mysqli_query($con,$query);
   echo 1;




}


  ?>
    
 



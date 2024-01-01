<?php

include("cnx.php");
if(isset($_POST['delete'])){
    $id = $_POST['id'];

    $query = "DELETE FROM stuident WHERE id = '$id' ";
   $res =  mysqli_query($cn, $query);

   if($res){

    echo "<script> alert{'item deleted'};  </script>";
    header("location: selectall.php");
   }
   else{

    echo "<script> alert{'item not deleted'};  /> </script>";

   }

   
    

};
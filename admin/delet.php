<?php
include("../conn.php");
$id=$_GET['id'];
if(isset($id)){
    $sqls="DELETE FROM customer WHERE `customer`.`ID` ='$id' ";
    $result=mysqli_query($conn,$sqls);
    if($result){
     header("location:adminpage.php?msg=data has been Deleted");
      }
}

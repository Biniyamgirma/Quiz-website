<?php
include("../conn.php");
$id=$_GET['id'];
if(isset($id)){
    $sqls="DELETE FROM `admin` WHERE `admin`.`ID` ='$id' ";
    $result=mysqli_query($conn,$sqls);
    if($result){
     header("location:admin.php?msg=Admin data has been Deleted");
      }
}

<?php
session_start();
include("../conn.php");
$id= $_SESSION["id"];
 $sqls="DELETE FROM `admin` WHERE `admin`.`ID` ='$id' ";
$result=mysqli_query($conn,$sqls);
if($result){
 header("location:index.php");
     }
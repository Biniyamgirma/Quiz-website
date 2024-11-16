<?php
session_start();
include("conn.php");
$email = $_SESSION["email"];
$id= $_SESSION["id"];
 if (isset($_POST['DeleteAcc'])) {
 $sqls="DELETE FROM customer WHERE `customer`.`ID` ='$id' ";
$result=mysqli_query($conn,$sqls);
if($result){
 header("location:signup.php");
     }
    }
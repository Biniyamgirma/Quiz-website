<?php
include ("conn.php");
//  $ipaddress2 = $_SERVER['REMOTE_ADDR'];
// //  $ipaddress2="127.0.0.1";
// $sql_stm="INSERT INTO `ip`(`ID`, `subId`, `ipAddress`) VALUES ('$id','$qid','$ipaddress2')";
// $result_stm=mysqli_query($conn,$sql_stm);
// if($result_stm){
//   echo "correct";
// }

$id=102;
$qid=1;
$ipaddress2 = $_SERVER['REMOTE_ADDR'];
$sql_stm="SELECT `ipAddress` FROM `ip` WHERE `ID`='$id' and `subId`='$qid'";
$result_stm=mysqli_query($conn,$sql_stm);
$row_stm=mysqli_fetch_assoc($result_stm);
$ipaddressNew = $row_stm['ipAddress'];
 if($ipaddressNew == $ipaddress2){
    echo "Error";
 }  
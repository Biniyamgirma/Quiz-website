<?php
include("../conn.php");
$id=$_GET['id'];
if(isset($id)){
    $sqls="DELETE FROM `answer` WHERE `answer`.`Qid` ='$id' ";
    $sql="DELETE FROM `question` WHERE  `question`.`Qid` ='$id' ";
    $result=mysqli_query($conn,$sqls);
    $result1=mysqli_query($conn,$sql);
    if($result && $result1){
     header("location:editExamQus.php");
      }
}
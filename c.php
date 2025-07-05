<?php 
session_start();
include 'conn.php';
$subId=$_GET['qid'];
$sql2="SELECT `Qid`, `Aid`, `subId` FROM `question` WHERE `subId`='$subId'";
 $result2=mysqli_query($conn,$sql2);
   if(isset($_POST['submitButton'])){
    while($row2=mysqli_fetch_assoc($result2)){
        $examId=$row2['Qid'];
        $ansId=$row2['Aid'];
        $temp=$_POST[$examId];
        $sql_stm="INSERT INTO `studentanswer`(`ID`, `Qid`, `Aid`,`subId`) VALUES ('$id','$examId','$temp','$subId')";
        $result_stm=mysqli_query($conn,$sql_stm);
        if(!$result_stm){
            echo'error';
            break;
        }
    }
    header("location:index001.php");
}else{
    echo 'error111';
}
<?php 
session_start();
include 'conn.php';
$subId=$_SESSION['qid'];
$id=$_SESSION['id'];
$score=0;
if(isset($_SESSION["firstname"]) && isset($_SESSION["lastname"]) && isset($_SESSION["email"]) && isset($_SESSION["id"])){
    $id =$_SESSION["id"];
  }else {
    echo 'error';
  }
 $sql2="SELECT `Qid`, `Aid`, `subId` FROM `question` WHERE `subId`='$subId'";
 $result2=mysqli_query($conn,$sql2);
   if(isset($_POST['submitButton'])){
    while($row2=mysqli_fetch_assoc($result2)){
        $examId=$row2['Qid'];
        $ansId=$row2['Aid'];
        $temp=$_POST[$examId];
        if($temp==$ansId){
            $score++;
        }else {
            continue;
        }
    }
        $sql_stm="INSERT INTO `score`(`ID`, `subId`, `score`) VALUES ('$id','$subId','$score')";
        $result_stm=mysqli_query($conn,$sql_stm);
        if(!$result_stm){
            echo $score;
        }
        // echo $score;
    header("location:index001.php");
}else{
    echo 'error111';
}

?>

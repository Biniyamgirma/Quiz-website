<?php
session_start();
include("conn.php");
$firstname =$_SESSION["firstname"] ;
$id = $_SESSION['id'];
$email = $_SESSION['email'];
$comment = $_POST['textArea1'];
$sql2="INSERT INTO `usercom`(`ID`, `name`, `email`, `user-comment`) VALUES ($id,'$firstname','$email','$comment')";
      $result = mysqli_query($conn,$sql2);
if (isset($_POST["commentSubmit"])) {
      
      if ($result) {
        header("location:index001.php");
      }else{
        echo "am";
      }
    }
   
?>
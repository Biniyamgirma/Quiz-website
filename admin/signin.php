<?php
 session_start();
include("../conn.php");
if (isset($_POST["signIn"])) {
    $email=$_POST['emailInput'];
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $password=$_POST['passwordInput'];
    $password=hash('sha256', $password);
    if(  empty($email) || empty($password)) {
        echo 'you forget to enter someting';
    } else {
        $sql="SELECT `ID`, `fName`, `lName`, `password`, `email` FROM `admin` WHERE email='$email' AND password='$password' ";
        $result=mysqli_query( $conn,$sql);
        $number=mysqli_num_rows($result);
        if(mysqli_num_rows($result) > 0) {
            $row=mysqli_fetch_array($result);
            $email=$row["email"];
            $firstname=$row["fName"];
            $lastname=$row["lName"];
            $_SESSION["firstname"] = $firstname;
            $_SESSION["lastname"] = $lastname;
            $_SESSION["email"] = $email;
            $_SESSION["id"] = $row['ID'];
            $_SESSION["image"] = $row['file'];
            header('location:adminpage.php');
        } else {
            header("location: index.php?error=Email or Password incorrect");
        }
    }
}
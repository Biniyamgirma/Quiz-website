<?php
 session_start();
include("conn.php");
if (isset($_POST["signIn"])) {
    $email=$_POST['emailInput'];
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $password=$_POST['passwordInput'];
    $password=hash('sha256', $password);
    if(  empty($email) || empty($password)) {
        echo 'you forget to enter someting';
    } else {
        // echo'am here';
        if( $password == hash('sha256', '1234') and $email == 'admin@1') {
            header('location:adminpage.php');
            exit;
        }
        $sql="SELECT `ID`, `first_name`, `last_name`, `email`,`file` FROM customer WHERE email='$email' AND pass_word='$password' ";
        $result=mysqli_query( $conn,$sql);
        $number=mysqli_num_rows($result);
        if(mysqli_num_rows($result) > 0) {
            $row=mysqli_fetch_array($result);
            $email=$row["email"];
            $firstname=$row["first_name"];
            $lastname=$row["last_name"];
            $_SESSION["firstname"] = $firstname;
            $_SESSION["lastname"] = $lastname;
            $_SESSION["email"] = $email;
            $_SESSION["id"] = $row['ID'];
            $_SESSION["image"] = $row['file'];
            header("location:index001.php");
            
        } else {
            header("location: index.php?error=Email or Password incorrect");
        }
    }
}
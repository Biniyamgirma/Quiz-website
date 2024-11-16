<?php
include("conn.php");
if (isset($_POST["signUp"])) {
    $firstname=$_POST['firstName'];
    $lastN=$_POST['lastN'];
    $email=$_POST['emailInput'];
    $password=$_POST['passwordInput'];
    $password=hash('sha256', $password);
    if(empty($firstname) || empty($lastN) || empty($email) || empty($password)) {
        echo 'you forget to enter someting';
    } else {
        $sql="SELECT * FROM customer WHERE email='$email'";
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)> 0) {
            header("location: signup.php?error=User registered before");
        } else {
            $sqlComand="INSERT INTO customer( `first_name`, `last_name`,`email`, `pass_word`) VALUES ('$firstname','$lastN','$email','$password')";
            $result=mysqli_query($conn,$sqlComand);
            if($result){
                header("location: signup.php?msg=User has been registered successfully");
            }
        }
    }
}
?>
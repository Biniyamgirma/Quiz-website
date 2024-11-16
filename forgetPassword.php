
<?php
    include("conn.php");
    if (isset($_POST['submit2']) && isset($_POST['emailInput'])){
        $Email=$_POST['emailInput'];
        echo$Email;
        $sql_stm="SELECT * from customer WHERE email='$Email' ";
        $result_stm=mysqli_query($conn,$sql_stm);
        $num=mysqli_num_rows($result_stm);
        echo $num;
        if ( $num > 0) {
            $password='12345678';
             $password=hash('sha256', $password);
            $sql="UPDATE customer SET pass_word='$password' WHERE email='$Email'";
            $result=mysqli_query($conn,$sql);
        if ($result){
            header("location: signup.php?msg=Password has been updated successfully");
        }
        } else {
            header("location: signup.php?error=Error email does not exist");
        }
    }
    ?>

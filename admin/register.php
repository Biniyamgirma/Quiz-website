<?php
include("../conn.php");
if(isset($_POST['cancelButton'])) {
    header('location:adminpage.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/bootstrap.css">
    <link rel="stylesheet" href="../css/adminPage.css">
    <title>Document</title>
</head>
<body>
<?php include '../inc/navbar.php'; ?>
    <div class="container create-class">
        <form action="register.php" method="post" enctype="multipart/form-data">
                <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-2 col-form-label">First Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="colFormLabel"  name="firstName">
                        </div>
                </div>
                <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-2 col-form-label">Last Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="colFormLabe2"  name="lastName">
                        </div>
                </div>
                <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="colFormLabe3" placeholder="example@something.com" name="emailInput">
                        </div>
                </div>
                <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-2 col-form-label">password</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="colFormLabe4" placeholder="**********" name="passwordInput">
                        </div>
                </div>
                <div class="form-floating">
                <div class="container" >
                    <div class="input-group profile-pic" >
                            <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" name="image">
                    </div>
                    </div>
                    
                </div>
                <div class="row buttom" style="margin:10px;">
                    <div class=" col-1 p-2 d-md-inline "><button type="submit" class="btn btn-outline-success" id="signupbutton" name="submitButton">Submit</button></div>
                    <div class=" col-1 p-2 d-md-inline"><button type="submit" class="btn btn-outline-danger" href="admin.php" id="hello" name="cancelButton">Cancel</button></div>
                </div>
        </form>
    </div>
    <?php
        if (isset($_POST["submitButton"])) {
            $name=$_POST["firstName"];//
            $lastName=$_POST["lastName"];
            $email=$_POST["emailInput"];
            $email = filter_var($email, FILTER_SANITIZE_EMAIL);
            $password=$_POST['passwordInput'];
            $password=hash('sha256', $password);
            $file_name=$_FILES['image']['name'];
            $tempFile=$_FILES['image']['tmp_name'];
            $folder ='../upload/'.$file_name;
            if(  empty($email) || empty($lastName) || empty($name)|| empty($password) || $_FILES["image"]["size"] > 2000000 ) {
                echo '<p class="alert-message">input error</p>';
            } else {
            $sql="SELECT * FROM customer WHERE email='$email'";
            $result=mysqli_query($conn,$sql);
            if(mysqli_num_rows($result)> 0) {
                echo '<h3 class="alert-message">'. 'User Registored Before'.'</h3>';
            } else {
                $sqlComand="INSERT INTO customer( `first_name`, `last_name`,`email`, `pass_word`,`file`) VALUES ('$name','$lastName','$email','$password','$file_name')";
                if(move_uploaded_file($tempFile,$folder )){
                    $result=mysqli_query($conn,$sqlComand);
                if($result){
                    echo '<h3 class="success-message">'. 'User Regisrered '.'</h3>';
                }
                }
            }
            }
        }
        else{
            echo '<h3 class="alert-message"'. 'error'.'</h3>';
        }
        ?>
</body>
</html>
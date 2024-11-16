<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./bootstrap/bootstrap.css">
    <link rel="stylesheet" href="./css/adminPage.css">
    <title>edit</title>
</head>
<body>
    <?php
        include("conn.php");
        $id=$_GET['editid'];
        $firstname='';
        $lastname= '';
        $email= '';
        $comment='no comment!!';
        if(isset($id)){
            $sql="SELECT * FROM customer WHERE ID='$id'";
            $result=mysqli_query($conn,$sql);
            $row=mysqli_fetch_assoc($result);
            $firstname=$row['first_name'];
            $lastname=$row['last_name'];
            $email=$row['email'];
            $password=$row['pass_word'];
            $image=$row['file'];
            if(isset($_POST['cancelButton'])){
                header('location:adminpage.php');
            }elseif(isset($_POST['submitButton'])){
                $firstname=$_POST['firstName'];
                $lastname=$_POST['lastName'];
                $email=$_POST['emailInput'];
                $password=$_POST['passwordInput'];
                $file_name=$_FILES['image']['name'];
                $tempFile=$_FILES['image']['tmp_name'];
                $folder ='upload/'.$file_name;
                if(isset($_POST['image'])){
                    if($_FILES["image"]["size"] > 2000000 || !move_uploaded_file($tempFile,$folder )){
                        echo'<p class="alert-message">ERROR</p>';
                    }
                    $sql="UPDATE `customer` SET `first_name`='$firstname',`last_name`='$lastname',`email`='$email',`pass_word`='$password',`file`='$file_name'  WHERE ID='$id'";
                    $result=mysqli_query($conn,$sql);
                    if($result){
                        header("location:adminpage.php?msg=data has been updated successfully");
                    }
                }else {
                    $sql="UPDATE `customer` SET `first_name`='$firstname',`last_name`='$lastname',`email`='$email',`pass_word`='$password' WHERE ID='$id'";
                    $result=mysqli_query($conn,$sql);
                    if($result){
                        header("location:adminpage.php?msg=data has been updated successfully");
                    }
                }
               
            }   
        }
    ?>
    <div class="container create-class">
        <form method="post" enctype="multipart/form-data">
                        <div class="container p-2" >
                            <div class="input-group profile-pic py-2" >
                                    <img src="upload/<?php echo$image; ?>" alt="" style="height:100px; width:100px; object-fit:cover;">
                            </div>
                            <div style="width:40%;">
                                <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" name="image">
                            </div>
                        </div>
                <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-2 col-form-label">First Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="colFormLabel"  name="firstName" value="<?php echo$firstname;?>">
                        </div>
                </div>
                <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-2 col-form-label">Last Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="colFormLabe2"  name="lastName" value="<?php echo$lastname;?>">
                        </div>
                </div>
                <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="colFormLabe3"  name="emailInput" value="<?php echo$email;?>">
                        </div>
                </div>
                <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-2 col-form-label">password</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="colFormLabe4"  name="passwordInput" value="<?php echo$password;?>">
                        </div>
                        
                </div>
                <?php
                $sql2="SELECT * FROM usercom WHERE ID='$id'";
                $result2=mysqli_query($conn,$sql2);
                if($result2 && mysqli_num_rows($result2)>0){
                    while($row2=mysqli_fetch_assoc($result2)){
                         ?>  
                        <div class="form-floating">
                        <div class="container success-message">
                            <p>
                                <?php 
                                        echo $row2['user-comment'].' ';
                                 ?>
                            </p>
                        </div>
                        <?php
                    }
                }else { ?>
                    <div class="form-floating">
                    <div class="container success-message">
                        
                    </div>
                    <?php
                }
                ?>
                </div>
                <div class="row buttom container  " style="margin:10px;">
                    <div class="col-1 p-2 d-md-inline d-sm-block"><button type="submit" class="btn btn-outline-success" id="signupbutton" name="submitButton">Submit</button></div>
                    <div class="col-1 p-2 d-md-inline d-sm-block"><button type="submit" class="btn btn-outline-danger" id="hello" name="cancelButton">Cancel</button></div>
                </div>
        </form>
    </div>
</body>
</html>
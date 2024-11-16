<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/bootstrap.css">
    <link rel="stylesheet" href="../css/adminPage.css">
    <title>Edit Student</title>
</head>
<body>

    <?php
        include("../conn.php");
        $id=$_GET['editid'];
        $IdForScore=$id;
        $firstname='';
        $lastname= '';
        $email= '';
        if(isset($id)){
            $sql="SELECT * FROM `customer` WHERE ID='$id'";
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
                $folder ='../upload/'.$file_name;
                if($_FILES["image"]["size"] > 2000000 || move_uploaded_file($tempFile,$folder )){
                    $sql="UPDATE `customer` SET `first_name`='$firstname',`last_name`='$lastname',`email`='$email',`pass_word`='$password',`file`='$file_name'  WHERE ID='$id'";
                    $result=mysqli_query($conn,$sql);
                    if($result){
                        header("location:adminpage.php?msg=Student Data has been updated ");
                    }
                }else {
                    header("location:adminpage.php?msge=ERROR ");
                }
               
            }   
        }
    ?>
<?php include_once '../inc/navbar.php'; ?>
    <div class="container create-class">
        <form method="post" enctype="multipart/form-data">
                        <div class="container p-2" >
                            <div class="input-group profile-pic py-2" >
                                    <img src="../upload/<?php echo$image; ?>" alt="" style="height:100px; width:100px; object-fit:cover; border-radius:5px; border: 2px solid #198ef9;">
                                    <h2 class="mx-5" style="color:#0B2F9F;">Student</h2>
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
                            <input type="password" class="form-control" id="colFormLabe4"  name="passwordInput" value="<?php ?>">
                        </div>
                        
                </div>
                <div class="form-floating">
                <div class="container success-message" style="background:#e8f3fd;   color: #198ef9;">
                        <?php
                        $sql_for_sub="SELECT * FROM `score` WHERE `ID`='$IdForScore'";
                        $result_for_sub=mysqli_query($conn,$sql_for_sub);
                        $row=mysqli_num_rows($result_for_sub);
                        if( $row > 0){
                            while($row=mysqli_fetch_assoc($result_for_sub)){
                                $subId=$row['subId'];
                                $score=$row['score'];
                                
                                $sqlSubject="SELECT  `Subject` FROM `subject` WHERE `subId`='$subId'";
                                $result_stm=mysqli_query($conn,$sqlSubject);
                                
                                $row2=mysqli_fetch_assoc($result_stm);
                                $subject=$row2['Subject'];
                                echo $subject.':'.$score.'</br>';   
                            }
                        }else{
                            echo "no value";
                        }
                        ?>
                        
                    </div>
                </div>
                <div class="row buttom container  " style="margin:10px;">
                    <div class="col-1 p-2 d-md-inline d-sm-block"><button type="submit" class="btn btn-outline-success" id="signupbutton" name="submitButton">Submit</button></div>
                    <div class="col-1 p-2 d-md-inline d-sm-block"><button type="submit" class="btn btn-outline-danger" id="hello" name="cancelButton">Cancel</button></div>
                </div>
        </form>
    </div>
</body>
</html>
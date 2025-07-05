<?php
        include("../conn.php");
        if(isset($_POST['cancelButton'])){
            header('location:admin.php');
        }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/bootstrap.css">
    <link rel="stylesheet" href="../css/adminPage.css">
    <title>edit</title>
</head>
<body>
    <?php
        $id=$_GET['editid'];
        $firstname='';
        $lastname= '';
        $email= '';
        $comment='no comment!!';
        if(isset($id)){
            $sql="SELECT * FROM `admin` WHERE ID='$id'";
            $result=mysqli_query($conn,$sql);
            $row=mysqli_fetch_assoc($result);
            $firstname=$row['fName'];
            $lastname=$row['lName'];
            $email=$row['email'];
            
            $image=$row['file'];
        }
                if(isset($_POST['submitButton'])){
                $firstname=$_POST['firstName'];
                $lastname=$_POST['lastName'];
                $email=$_POST['emailInput'];
                
                $file_name=$_FILES['image']['name'];
                $tempFile=$_FILES['image']['tmp_name'];
                $folder ='../upload/'.$file_name;
                if($_FILES["image"]["size"] < 2000000 && move_uploaded_file($tempFile,$folder )){
                    $sql="UPDATE `admin` SET `fName`=' $firstname',`lName`='$lastname',`email`='$email',`file`='$file_name' WHERE ID='$id'";
                    $result=mysqli_query($conn,$sql);
                    if($result){
                        header("location:adminpage.php?msg=Admin Info Has Been Updated");
                    }
                }else {
                    header("location:adminpage.php?msge=Error In Admin Info");
                }
            }  ?>
<?php include_once '../inc/navbar.php'; ?>
    <div class="container create-class">
        <form method="post" enctype="multipart/form-data">
                        <div class="container p-2" >
                            <div class="input-group profile-pic py-2 d-flex" >
                                    <img src="../upload/<?php echo$image; ?>" alt="" style="height:100px; width:100px; object-fit:cover; border-radius:5px;">
                                    <h2 class="mx-5" style="color:#0B2F9F;">ADMIN</h2>
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
                        
                        
                </div>
                <div class="form-floating">
                <div class="container success-message">
                        
                    </div>
                </div>
                <div class="row buttom container d-md-inline  d-sm-block" style="margin:10px;">
                    <div class=" col-1 p-2 d-md-inline"><button type="submit" class="btn btn-outline-success" id="signupbutton" name="submitButton">Submit</button></div>
                    <div class=" col-1 p-2 d-md-inline"><button type="submit" class="btn btn-outline-danger" id="hello" name="cancelButton">Cancel</button></div>
                </div>
        </form>
    </div>
</body>
</html>
<?php
include("../conn.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/bootstrap.css">
    <link rel="stylesheet" href="../css/adminPage.css">
    <title>Admin</title>
</head>
<body>
<?php include '../inc/navbar.php'; ?>

    <div class="container my-3">
    <a href="#" id="addNewUser">Add New Admin</a>
    </div>
 <div class="container my-4">
 <h2 class="heading-2">List Of Admin</h2>
 <table class="table table-hover-color">
            <thead>
                <tr >
                <th scope="col">#</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Email</th>
                <th scope="col">Subject</th>
                <th scope="col">Profil Picture</th>
                <th scope="col">Edit & Delete</th>
                </tr>
            </thead>
            <?php
            $sql="SELECT * FROM `admin` ";
            $result=mysqli_query($conn,$sql);
            if($result){
                while($row=mysqli_fetch_assoc($result)){
                    $fname=$row['fName'];
                    $id=$row['ID'];
                    $lname=$row['lName'];
                    $email=$row['email'];
                    $subId=$row['subId'];
                    $imageName=$row['file'];

                    $sqlsub="SELECT `subId`, `Subject` FROM `subject` WHERE `subId`='$subId'";
                    $resultsub=mysqli_query($conn,$sqlsub);
                    $rowsub=mysqli_fetch_assoc($resultsub);
                    $subName=$rowsub['Subject'];
                    ?>
                    <tbody>
                <tr>
                <th scope="row" style="color:#15B392">'<?php echo$id; ?></th>
                <td style="color:#640D5F"><?php echo $fname; ?></td>
                <td style="color:#15B392"><?php echo$lname; ?></td>
                <td style="color:#640D5F"><?php echo$email; ?></td>
                <td style="color:#fc411e"><?php echo$subName; ?></td>
                <td><img src="../upload/<?php  echo$imageName;  ?>" alt="" style=" border-radius: 20px; object-fit:cover;" width="36px" height="36px" ></td>
                <td>
                      <div class="row">
                            <div class="col-6"><a href="edit.php?editid=<?php echo $id; ?>" role="button" name="edit" id="edit-logo"><img src="../img/pencil-square.svg" alt="" width="22px"></a></div>
                            <div class="col-6"><a href="delete.php?id=<?php echo $id; ?>" role="button" name="delete" id="delete-logo" onclick="return confirm('are you sure')"><img src="../img/trash3-fill.svg" alt="" width="22px"></a></div>
                        </div>
                </td>
                </tr>
            </tbody>
            <?php    }
            } else {
                echo 'error';
            }
            ?>
    <!-- this is the end of the admin page -->

    <div class="container create-class " id="hello" style="display:none;" >
        <form action="admin.php" method="post" enctype="multipart/form-data">
        <div class="container d-flex mx-2">
                    <?php 
                    $sql_for_sub="SELECT * FROM `subject`";
                    $result_for_sub=mysqli_query($conn,$sql_for_sub);
                    while($row_for_sub=mysqli_fetch_assoc($result_for_sub)){
                        $subId=$row_for_sub['subId'];
                        $subName=$row_for_sub['Subject'];


                    ?>
                    <div class="form-check mx-2">
                            <input class="form-check-input" type="radio" name="subject" id="flexRadioDefault<?php echo $subId; ?>" value="<?php echo$subId; ?>">
                            <label class="form-check-label" for="flexRadioDefault<?php echo$subId; ?>">
                            <?php echo '<p>'.$subName.'</p>'.''; ?>
                            </label>
                    </div>
                    <?php                     }?>
                </div>
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
                    <div class="col-2"><button type="submit" class="btn btn-outline-success" id="signupbutton" name="submitButton">Submit</button></div>
                    <div class="col-2"><button  class="btn btn-outline-danger hide-when-clicked" id="hello1" name="cancelButton" onclick="hideTheContent()">Cancel</button></div>
                </div>
        </form>
    </div>
    <?php
        if (isset($_POST["submitButton"])) {
            $name=$_POST["firstName"];//
            $subId=$subId=$_POST["subject"];
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
            $sql="SELECT * FROM `admin` WHERE email='$email'";
            $result=mysqli_query($conn,$sql);
            if(mysqli_num_rows($result)> 0) {
                echo '<h3 class="alert-message">'. 'User Registored Before'.'</h3>';
            } else {
                $sqlComand="INSERT INTO `admin`( `fName`, `lName`, `password`, `email`, `file`,`subId`) VALUES ('$name',' $lastName','$password','$email','$file_name',' $subId')";
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
 </div>

        <script src="../js/new.js"></script>
        
</body>
</html>
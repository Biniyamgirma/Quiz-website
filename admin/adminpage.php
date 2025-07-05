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
<?php include_once '../inc/navbar.php'; ?>
<div class="container darker-background my-3 container-withShadow  flex-row-reverse">
    <div class="upper-container d-flex" >
    <a href="create.php"><div class="btn1 m-2" ><img src="../img/house-add-fill.svg" alt="" id="image-1"></div></a><div class="hidden-message" id="hidden-1"  style="display:none;"><p>Add new admin</p></div>
        <a href="admin.php"><div class="btn1 m-2" onmouseover=" displayInfo1()" onmouseout="hideAllInfo()"><img src="../img/person-fill-add.svg" alt="" id="image-1"></div></a><div class="hidden-message" id="hidden-1"  style="display:none;"><p>Add new admin</p></div>
        <a href="message.php"  id="liveToastBtn" type="button"><div class="btn1 m-2" id="btn-2" onmouseover=" displayInfo2()" onmouseout="hideAllInfo()"><img src="../img/broadcast.svg" alt="" id="image-2"></div></a><div class="hidden-message" id="hidden-2" style="display:none;"><p>Message</p></div>
        <a href="editExamQus.php"><div class="btn1 m-2" id="btn-3" onmouseover=" displayInfo3()" onmouseout="hideAllInfo()"><img src="../img/bookmark-star-fill.svg" alt="" id="image-3"></div></a><div class="hidden-message" id="hidden-3" style="display:none;"><p>Edit Exam Qus</p></div>
        <a href="logout.php"><div class="btn1 m-2" id="btn-4" onmouseover=" displayInfo4()" onmouseout="hideAllInfo()"><img src="../img/box-arrow-right.svg" alt="" id="image-4"></div></a><div class="hidden-message" id="hidden-4" style="display:none;"><p>Logout</p></div>
    </div>
</div>
<div class="container my-2">
        <div class="container">
        <?php
            if(isset($_GET['msg'])){
                            ?>
            <div class="alert alert-warning alert-dismissible fade show header-notification" role="alert" style="color:#059212; background-color: #69e77668; border:1px solid #15B392;">
            <img src="../img/award-fill.svg" alt=""
            style=" filter: brightness(0) saturate(100%) invert(32%) sepia(82%) saturate(3094%) hue-rotate(350deg) brightness(101%) contrast(98%);">
            <strong>
            <?php echo $_GET['msg']; ?>
            </strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            
            <?php
            }
            ?>
            <?php
            if(isset($_GET['msge'])){
                            ?>
            <div class="alert alert-warning alert-dismissible fade show header-notification" role="alert" style="color: #311306; background-color:#c86c3a96; border:1px solid #fc411e;">
            <strong><img src="../img/bell-fill.svg" alt=""
            style="    filter: brightness(0) saturate(100%) invert(32%) sepia(82%) saturate(3094%) hue-rotate(350deg) brightness(101%) contrast(98%);"
            ></strong><?php echo $_GET['msge']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            
            <?php
            }
            ?>
        </div>
            
            <div class="container container-withShadow">
                <a class="btn btn-primary mb-3 my-2 edit-adminpage" role="button" href="create.php" id="top-navbar-1" >
                    <div class="div-for-admin" >
                        <img src="../img/cloud-plus-fill.svg" alt="">    
                        <p class="heading-for-admin">Add Exam Questions</p>
                        <p class="p-for-admin">
                                        <?php
                        $sql_stm9="SELECT * FROM `question` WHERE 1";
                        $result020=mysqli_query($conn, $sql_stm9);
                        $numrow=mysqli_num_rows($result020);
                        echo $numrow.' questions';
                        ?>
                        </p>
                    </div>
                </a>
                <a class="btn btn-primary mb-3 mx-2 my-2 edit-adminpage" role="button" href="editExamQus.php" id="top-navbar-2" >
                    <div class="div-for-admin" >
                        <img src="../img/pencil-square.svg" alt="">    
                        <p class="heading-for-admin">Edit Exam Questions</p>
                        <p class="p-for-admin">
                        <?php
             $sql_stm9="SELECT * FROM `question` WHERE 1";
             $result020=mysqli_query($conn, $sql_stm9);
             $numrow=mysqli_num_rows($result020);
             echo $numrow.' questions';
            ?>
                        </p>
            </div>
                </a>
                <a class="btn btn-primary mb-3 mx-2 my-2 edit-adminpage" role="button" href="admin.php" id="top-navbar-3">
                    <div class="div-for-admin" >
                        <img src="../img/award-fill.svg" alt="">    
                        <p class="heading-for-admin">Add New Admin</p>
                        <p class="p-for-admin">
                        <?php
             $sql_stm9="SELECT * FROM `admin` WHERE 1";
             $result020=mysqli_query($conn, $sql_stm9);
             $numrow=mysqli_num_rows($result020);
             echo$numrow.' Admins';
            ?>
                        </p>
                    </div>
                </a>
             <a class="btn btn-primary mb-3 mx-2 my-2 edit-adminpage" role="button" href="register.php" id="top-navbar-4">
                <div class="div-for-admin" >
                    <img src="../img/person-plus-fill.svg" alt="">    
                    <p class="heading-for-admin">Register New Student</p>
                    <p class="p-for-admin"> <?php
                    $sql_stm9="SELECT * FROM `customer` WHERE 1";
                    $result020=mysqli_query($conn, $sql_stm9);
                    $numrow=mysqli_num_rows($result020);
                    echo$numrow.' number of Student';
                    ?>
                    </p>
                </div>
             </a>
        </div>
            <h2 class="heading-2">List Of Students</h2>
    
        <table class="table table-hover-color ">
            <thead style="color:#0a005a;text-align:center;">
                <tr>
                <th scope="col">#ID</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Email</th>
                <th scope="col">Reg Date</th>
                <th scope="col">Country</th>
                <th scope="col">Profile Picture</th>
                <th scope="col">Edit & Delete</th>
                </tr>
            </thead>
            <?php
            $sql="SELECT * FROM customer";
            
            $result=mysqli_query($conn,$sql);
             
            if($result){
                while($row=mysqli_fetch_assoc($result)){
                    $fname=$row['first_name'];
                    $id=$row['ID'];
                    $lname=$row['last_name'];
                    $email=$row['email'];
                    $date=$row['reg_date'];
                    $imageName=$row['file'];
                    
                    ?>
                <tbody style="text-align:center;">
            <tr>
                <td scope="row" style="color:#fc411e;text-align:center;"><?php echo$id; ?></td>
                <td style="color:#0a005a;text-align:center;"><?php echo $fname; ?></td>
                <td style="color:#fc411e;text-align:center;"><?php echo$lname; ?></td>
                <td style="color:#0a005a;"><?php echo$email; ?></td>
                <td style="color:#fc411e"><?php echo$date; ?></td>
                <td><img src="../img/ethiopia.png" alt="" height="16px" style="text-align:center;"></td>
                <td><img src="../upload/<?php  echo$imageName;  ?>" alt="" style=" border-radius: 20px; object-fit:cover; border:1px solid #15B392;" width="36px" height="36px" ></td>
                <td>
                    <div class="row">
                        <div class="col-6"><a href="editStudent.php?editid=<?php echo $id; ?>" role="button" name="edit" id="edit-logo"><img src="../img/pencil-square.svg" alt="" width="22px"></a></div>
                        <div class="col-6"><a href="delet.php?id=<?php echo $id; ?>" role="button" name="delete" id="delete-logo" onclick="return confirm('are you sure')"><img src="../img/trash3-fill.svg" alt="" width="22px"></a></div>
                    </div>
                </td>
            </tr>
            </tbody>
            <?php    }
            } else {
                header('location:adminpage.php?msge=Error In Database');
            }
            ?>
        </table>
</div>
<script src="../js/bootstrap.js"></script>  
<script src="../js/new.js"></script>  
<script src="../js/message.js"></script> 
<?php include_once "../inc/footer.php" ?>

</body>
</html>
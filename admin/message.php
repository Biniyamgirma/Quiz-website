<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/bootstrap.css">
    <link rel="stylesheet" href="../css/message.css">
    <title>Message</title>
</head>
<body>
    <?php include_once "../inc/navbar.php" ?>
    <div class="container all-section">
        <div class="image-container">
             <?php
                      $query="SELECT  * FROM `admin` WHERE ID='$id'";
                      $result=mysqli_query($conn,$query);
                      while($row=mysqli_fetch_assoc($result)){
                        $fileName=$row['file'];
                        $Name=$row['fName'];
                        $lastN=$row['lName'];
                        $email=$row['email'];
                        $subId=$row['subId'];
                        ?>
                        
                    
            <div class="image-cotainer-for-profile" style="border: 2px solid #15B392; width:fit-content;border-radius:30px;">
                <img src="../upload/<?php echo $fileName;?>" alt="user profile picture" id="profile-pic">
            </div>
            <div class="full-name">
               Full Name: <p><?php echo $Name.' '.$lastN;?></p>
            </div>
            <div class="full-name">
              Email: <p><?php echo $email;?></p>
            </div>
            <div class="full-name">
               Department Name: <p><?php
                $sql2="SELECT `Subject` FROM `subject` WHERE `subId`='$subId'";
               $result2=mysqli_query($conn,$sql2);
               $row2=mysqli_fetch_assoc($result2);
                if(empty($row2['Subject'])){
                    echo "no result";
                }else{
                    $sub=$row2['Subject'];
                    echo $sub;
                }
               
               ?></p>
            </div>
            <?php }
                      ?>
        </div>
    <div class="t-container" >
        <div class="toast-container position-static" >
            <?php
            $s="UnRead";
            $sql="SELECT * FROM `usercom`";
            $result=mysqli_query($conn,$sql);
            while($row=mysqli_fetch_assoc($result)){
                $id=$row['ID'];
                $Name=$row['name'];
                $comment=$row['user-comment'];
                $email=$row['email'];
                $date=$row['com-date'];
                $status=$row['status'];
                ?>
                <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" style="display: block;">
                    <div class="toast-header">
                    <img src="../img/app-indicator.svg" class="rounded me-2" alt="Same symbol" id="some-image">
                    <strong class="me-auto"><?php echo  $Name; ?></strong>
                    <small class="text-body-secondary"><?php echo  $date; ?></small>
                    <?php
                    if($status==1){
                        $s="Read";
                    }
                    ?>
                    <img src="../img/bookmark-check-fill.svg" alt="" class="<?php echo $s; ?>">
                    </div>
                    <div class="toast-body">
                    <?php echo  $comment; ?>
                    <p> <?php echo  '<p class="masage-email">Email: </br>'.$email.'</p>'; ?> </p>
                    </div>
                </div>
                <?php
        $sqlUpdate="UPDATE `usercom` SET `status`='1' WHERE `ID`='$id'";
        $resultUpdate=mysqli_query($conn,$sqlUpdate);
        if($resultUpdate){
            continue;
        }

        }
        ?>
        
     
        </div>
    </div>
    <script src="../bootstrap/bootstrap.bundle.js"></script>
    
</body>
</html>
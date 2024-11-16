<?php
include("conn.php");
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./bootstrap/bootstrap.css">
    <link rel="stylesheet" href="./css/adminPage.css">
    <title>Admin dash boared</title>
</head>
<body>
    <div class="container create-class">
        <div class="float-right" style="width: 10%;
    padding: 5px;
    ">
            <?php
             $sql_stm9="SELECT * FROM `question` WHERE 1";
             $result020=mysqli_query($conn, $sql_stm9);
             $numrow=mysqli_num_rows($result020);
             echo'<h3 class="header-notification px-4" >'.$numrow.'</h3>';
            ?>
        </div>
        <form action="create.php" method="post" enctype="multipart/form-data">
                <div class="row mb-3">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Question</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="colFormLabel"  name="Question">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Answer A</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="colFormLabe2"  name="A">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Answer B</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="colFormLabel"  name="B">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Answer C</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="colFormLabel"  name="C">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Answer D</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="colFormLabel"  name="D">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Answer for This Question</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="colFormLabel"  name="Answer">
                    </div>
                </div>
               
                <div class="row buttom" style="margin:10px;">
                    <div class="col-1"><button type="submit" class="btn btn-outline-success" id="signupbutton" name="submitButton">Submit</button></div>
                    <div class="col-1"><button type="submit" class="btn btn-outline-danger" id="hello" name="cancelButton">Cancel</button></div>
                </div>
        </form>
    </div>
    <?php
        if (isset($_POST["submitButton"])) {
            $Question=$_POST["Question"];//
            $A=$_POST["A"];
            $B=$_POST["B"];
            $C=$_POST["C"];
            $D=$_POST["D"];
            $answer=$_POST["Answer"];

            if(  empty($A) || empty($B) || empty($C)|| empty($D) || empty($answer)||empty($Question) ) {
                echo '<p class="alert-message">input error</p>';
            } else {
            $sql="INSERT INTO `question` ( `question`) VALUES ('$Question')";
            $result=mysqli_query($conn,$sql);
            if($result){
                $sql2="SELECT `Qid` FROM `question` WHERE `question`='$Question'";
                $result2=mysqli_query($conn,$sql2);
                $row=mysqli_fetch_assoc($result2);
                $qid=$row['Qid'];
                
                $sql_stm001="INSERT INTO `answer`(`Qid`, `answer`) VALUES ('$qid','$A')";
                $sql_stm002="INSERT INTO `answer`(`Qid`, `answer`) VALUES ('$qid','$B')";
                $sql_stm003="INSERT INTO `answer`(`Qid`, `answer`) VALUES ('$qid','$C')";
                $sql_stm004="INSERT INTO `answer`(`Qid`, `answer`) VALUES ('$qid','$D')";
                if(mysqli_query($conn, $sql_stm001) && mysqli_query($conn, $sql_stm002) && mysqli_query($conn, $sql_stm003) && mysqli_query($conn, $sql_stm004)){
                    
                    $sql_stm2="SELECT `Qid`, `Aid` FROM `answer` WHERE `answer`='$answer'";
                    $result02=mysqli_query($conn, $sql_stm2);
                    $row1=mysqli_fetch_assoc($result02);
                    $Aid=$row1['Aid'];
                    $Qid=$row1['Qid'];
                    $sql_stm3="UPDATE `question` SET `Aid`=' $Aid' WHERE `Qid`='$Qid'";
                    $result03=mysqli_query($conn, $sql_stm3);
                    if($result03){
                        echo'<p class="success-message">'.'Question added successfully'.'</p>';
                    }
                }else {
                    echo'error';
                }
                
            }
            
           
            }
        }elseif(isset($_POST['cancelButton'])) {
            header('location:adminpage.php');
        }
        else{
            echo '<h3 class="alert-message"'. 'error'.'</h3>';
        }
        
        ?>
</body>
</html>
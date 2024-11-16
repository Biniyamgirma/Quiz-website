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
    <link rel="stylesheet" href="../css/temp.css">
    <title>Admin dash boared</title>
</head>
<body>
<?php include '../inc/navbar.php'; ?>
    <div class="container create-class">
    <a href="set_exam_password.php?qid=1"  class="btn btn-primary my-class">Set Password for Mathematics Quiz</a>
    <a href="set_exam_password.php?qid=4" class="btn btn-primary my-class">Set Password for Biology Quiz</a>
    <a href="set_exam_password.php?qid=2" class="btn btn-primary my-class" >Set Password for English Quiz</a>
    <a href="set_exam_password.php?qid=3" class="btn btn-primary my-class my-2" >Set Password for Chemistry Quiz</a>
        <div class="float-right" style="width: 10%;padding: 5px;">
            <?php
             $sql_stm9="SELECT * FROM `question` WHERE 1";
             $result020=mysqli_query($conn, $sql_stm9);
             $numrow=mysqli_num_rows($result020);
             echo'<h3 class="header-notification px-4" >'.$numrow.'</h3>';
            ?>
        </div>
        <form action="create.php" method="post" enctype="multipart/form-data">
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
                    <?php }?>
                </div>
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
            $subId=$_POST["subject"];
            $Question=$_POST["Question"];//
            $A=$_POST["A"];
            $B=$_POST["B"];
            $C=$_POST["C"];
            $D=$_POST["D"];
            $answer=$_POST["Answer"];
            if(  empty($A) || empty($B) || empty($C)|| empty($D) || empty($answer)||empty($Question) ) {
                echo '<p class="alert-message">input Empty</p>';
            } else {
                $sql="SELECT * From question WHERE `question`='$Question'";
                $result=mysqli_query($conn,$sql);
                if(mysqli_num_rows($result) > 0){
                    echo '<p class="alert-message">you are trying to Duplicate questions</p>';
                }else{
                    $sql="INSERT INTO `question` ( `question`,`subId`) VALUES ('$Question','$subId')";
                    $result=mysqli_query($conn,$sql);
                    if($result){
                        $sql2="SELECT * FROM `question` WHERE `question`='$Question'";
                        $result2=mysqli_query($conn,$sql2);
                        $row=mysqli_fetch_assoc($result2);
                        $qid=$row['Qid'];
                        //insert each answer to database
                        $sql_stm001="INSERT INTO `answer`(`Qid`, `answer`) VALUES ('$qid','$A')";
                        $sql_stm002="INSERT INTO `answer`(`Qid`, `answer`) VALUES ('$qid','$B')";
                        $sql_stm003="INSERT INTO `answer`(`Qid`, `answer`) VALUES ('$qid','$C')";
                        $sql_stm004="INSERT INTO `answer`(`Qid`, `answer`) VALUES ('$qid','$D')";
                        if(mysqli_query($conn, $sql_stm001) && mysqli_query($conn, $sql_stm002) && mysqli_query($conn, $sql_stm003) && mysqli_query($conn, $sql_stm004)){
                            
                            $sql_stm2="SELECT `Qid`, `Aid` FROM `answer` WHERE `answer`='$answer' and `Qid`='$qid' ";
                            $result02=mysqli_query($conn, $sql_stm2);
                            $row1=mysqli_fetch_assoc($result02);
                            $Aid=$row1['Aid'];
                            $Qid=$row1['Qid'];
                            $sql_stm3="UPDATE `question` SET `Aid`=' $Aid' WHERE `Qid`='$Qid'";
                            $result03=mysqli_query($conn, $sql_stm3);
                            if($result03){
                                echo'<p class="success-message">'.'Question added successfully'.'</p>';
                            }
                }
                }else {
                    echo'error';
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
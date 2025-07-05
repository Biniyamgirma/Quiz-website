<?php
session_start();
include 'conn.php';
if (!isset($_SESSION['firstname'])) {          
  header('location:index.php');
  exit();
  }
$id =$_SESSION["id"];
$subId=$_SESSION['qid'];
$sql="SELECT `Qid`, `question` FROM `question` WHERE 1";
$result=mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/bootstrap.css">
    <link rel="stylesheet" href="css/adminPage.css">
    <title>exam room</title>
</head>
<body>
    <nav class="nav-list">
        <h2>Exam Room 
            <div class="container flex-row flex-column align-items-end">
            <img src="img/icons8-education-100.png" alt=""width="30px" >
            </div>
        </h2>
    </nav>
   <div class="container color-time d-flex " >
    <div style="background-color:cadetblue; border-radius: 16px;">
        <H1 class="mx-2" style="font-size: 22px; color:#fff; position:sticky;
        font-weight: 500;">Remaining Time</H1><P id="examTimer" style="font-size: 22px;
        font-weight: 200; border-radius: 100px;background-color:#fff;padding:20px;margin:8px">00:00</P>
    </div>
    </div>
   <form action="k.php"  method="post" id="examForm">
            <?php
            $sql="SELECT `Qid`, `question`, `Aid`, `subId` FROM `question` WHERE `subId`='$subId'";
            $result=mysqli_query($conn,$sql);
            while($row=mysqli_fetch_assoc($result)){
                ?>
                <div class="container create-class">
                <?php
                $examQus=$row['question'];
                $examId=$row['Qid'];
                echo '<h4>'.$examQus.'</h4>'.'';

                $sqlAns="SELECT `Qid`, `Aid`, `answer`, `subId` FROM `answer` WHERE `Qid`='$examId'";
                $resultAns=mysqli_query($conn,$sqlAns);
                while($rowAns=mysqli_fetch_assoc( $resultAns)){
                    $ans=$rowAns['answer'];
                    $ansId=$rowAns['Aid'];
                    ?>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="<?php echo$examId; ?>" id="flexRadioDefault<?php echo $ansId; ?>" value="<?php echo$ansId; ?>">
                        <label class="form-check-label" for="flexRadioDefault<?php echo$ansId; ?>">
                        <?php echo '<p>'.$ans.'</p>'.''; ?>
                        </label>
                </div>
                    <?php  
                }
                ?>
                </div>
                <?php
            }
            ?><div class="row buttom" style="margin:10px;">
            <div class="col-1"><button type="submit" class="btn btn-outline-success" id="signupbutton" name="submitButton">Submit</button></div>
            </div>
        
   </form>
    <script src="js/bootstrap.js"></script>
    <script src="js/timer.js"></script>
</body>
</html>
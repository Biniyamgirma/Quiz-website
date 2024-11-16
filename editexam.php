<?php
include("../conn.php");
 $qid=$_GET['qusid'];
 $i=1;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/bootstrap.css">
    <link rel="stylesheet" href="../css/adminPage.css">
    <link rel="stylesheet" href="../css/temp.css">
    <title></title>
</head>
<body>
<?php include '../inc/navbar.php'; ?>
    <div class="container create-class">
        <div class="float-right" style="width: 10%;padding: 5px;">
            <?php
             $sql_stm9="SELECT * FROM `question` WHERE  `Qid`='$qid'";
             $result020=mysqli_query($conn, $sql_stm9);
             $numrow=mysqli_fetch_assoc($result020);
             $answerForQus=0;
             $sql_stm10="SELECT * FROM `answer` WHERE `Qid`='$qid'";//`Qid`, `Aid`, `answer`, `subId`
             $result010=mysqli_query($conn, $sql_stm10);
            ?>
        </div>
        <form action="" method="post" enctype="multipart/form-data"> 
            <!-- editedExamSubmit.php -->
                <div class="row mb-3">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Question</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="colFormLabel"  name="<?php echo  $qid?>" VALUE="<?php echo $numrow['question'];?>">
                    </div>
                </div>
                <?php while($numrow2=mysqli_fetch_assoc( $result010)){
                    $answerForQus=$numrow2['Aid'];
                    ?>
                
                <div class="row mb-3">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Answer <?php echo $i; ?></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="colFormLabe2"  name="<?php echo  $answerForQus;?>" VALUE="<?php echo $numrow2['answer'] ?>" >
                    </div>
                </div>
    <?php
    $i++;
                } ?>
                <div class="row mb-3">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Answer for This Question</label>
                    <div class="col-sm-10">
                        <?php
                        $Aid=$numrow['Aid'];
                        $sql2="SELECT  * FROM `answer` WHERE `Aid`='$Aid'"; 
                        $result3=mysqli_query($conn,$sql2);
                        $numrow3=mysqli_fetch_assoc( $result3);
                                               ?>
                        <input type="text" class="form-control" id="colFormLabel"  name="<?php echo $Aid;?>" value="<?php echo $numrow3['answer'];?>" >
                    </div>
                </div>
                <!-- <div class="row buttom" style="margin:10px;">
                    <div class="col-1"><button type="submit" class="btn btn-outline-success" id="signupbutton" name="submitButton2">Submit</button></div>
                    <div class="col-1"><button type="submit" class="btn btn-outline-danger" id="hello" name="cancelButton">Cancel</button></div>
                </div> -->
        </form>
    </div>
    <?php
        if (isset($_POST["submitButton2"])) {
            $Question=$_POST["$qid"];//
            $b=$answerForQus+1;
            $c=$answerForQus+2;
            $d=$answerForQus+3;
            $A=$_POST["$answerForQus"];
            $B=$_POST["$b"];
            $C=$_POST["$c"];
            $D=$_POST["$d"];
            $answer=$_POST["$Aid"];
            echo $A.' '.$B;
        }
            ?>
</body>
</html>
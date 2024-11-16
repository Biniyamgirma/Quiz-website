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
            if(  empty($A) || empty($B) || empty($C)|| empty($D) || empty($answer)||empty($Question) ) {
                header("location:adminpage.php?msge=input Empty ");
            } else {
                    $sql="UPDATE `question` SET `question`='$Question',`subId`='$subId' WHERE `Qid`='$qid'";
                    $result=mysqli_query($conn,$sql);
                    if($result){
                        $sql2="SELECT `Qid` FROM `question` WHERE `question`='$Question'";
                        $result2=mysqli_query($conn,$sql2);
                        $row=mysqli_fetch_assoc($result2);
                        $qid=$row['Qid'];
                        
                        $sql_stm001="UPDATE `answer` SET `answer`='$A' WHERE `Aid`='$answerForQus' and `Qid`='$qid'";
                        $sql_stm002="UPDATE `answer` SET `answer`='$B' WHERE `Aid`='$b' and `Qid`='$qid'";
                        $sql_stm003="UPDATE `answer` SET `answer`='$C' WHERE `Aid`='$c' and `Qid`='$qid'";
                        $sql_stm004="UPDATE `answer` SET `answer`='$D' WHERE `Aid`='$d' and `Qid`='$qid'";
                        if(mysqli_query($conn, $sql_stm001) && mysqli_query($conn, $sql_stm002) && mysqli_query($conn, $sql_stm003) && mysqli_query($conn, $sql_stm004)){
                            
                            $sql_stm2="SELECT `Qid`, `Aid` FROM `answer` WHERE `answer`='$answer'";
                            $result02=mysqli_query($conn, $sql_stm2);
                            $row1=mysqli_fetch_assoc($result02);
                            $Aid=$row1['Aid'];
                            $Qid=$row1['Qid'];
                            $sql_stm3="UPDATE `question` SET `Aid`=' $Aid' WHERE `Qid`='$Qid'";
                            $result03=mysqli_query($conn, $sql_stm3);
                            if($result03){
                                header("location:adminpage.php?msg=Question UPDATED successfully ");
                            }
                }
            
                }else {
                    header("location:adminpage.php?msge=error 002 ");
                }
           
            }
        }elseif(isset($_POST['cancelButton'])) {
            header('location:adminpage.php');
        }
        else{
            echo '<h3 class="alert-message"'. ''.'</h3>';
            header("location:adminpage.php?msge=error ");
        }
        
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/bootstrap.css">
    <link rel="stylesheet" href="../css/temp.css">
    <title>Edit Exam Question</title>
</head>
<body class="body-for-edit-page">
<?php include '../inc/navbar.php'; ?>
 <div class="container">
        <h2 class="textcenter my-2">Update Quiz Password</h2>
    <div class="row p-3">
          <div class="col-md-4">
            <!-- card 1 -->
            <div class="card ">
              <img src="../img/maths.jpg" class="card-img-top" alt="..." height="221.12" ">
              <div class="card-body">
                <h5 class="card-title" style="font-size: 32px; color: #0a005a; font-weight: 400;">Mathematics</h5>
                <a href="ChangeExampASSWORD.php?qid=1"  class="btn btn-primary my-class">Change Quiz Password</a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <!-- card2 -->
            <div class="card">
              <img src="../img/biology.jpg" class="card-img-top" alt="..." height="221.12" >
              <div class="card-body">
                <h5 class="card-title" style="font-size: 32px; color: #0a005a; font-weight: 400; " >Biology</h5>
                <a href="ChangeExampASSWORD.php?qid=4" class="btn btn-primary my-class">Change Quiz Password</a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <!-- card3 -->
            <div class="card">
              <img src="../img/chem.jpg" class="card-img-top" alt="..." height="221.12" >
              <div class="card-body">
                <h5 class="card-title" style="font-size: 32px; color: #0a005a; font-weight: 400;">Chemistry</h5>
                <a href="ChangeExampASSWORD.php?qid=3" class="btn btn-primary my-class">Change Quiz Password</a>
              </div>
            </div>
          </div>
        </div>
    </div>
<div class="container style-edit-qus">
    <table class="table tabe-color">
    <thead>
        <tr>
        <th scope="col">ID</th>
        <th scope="col">Question</th>
        <th scope="col">Subject</th>
        <th scope="col">View & Delete</th>
        </tr>
    </thead>
    <tbody>
    <?php
            $sql="SELECT * FROM `question` ";
            $result=mysqli_query($conn,$sql);
             
            if($result){
                while($row=mysqli_fetch_assoc($result)){
                    $qus=$row['question'];
                    $id=$row['Qid'];
                    $aId=$row['Aid'];
                    $subId=$row['subId'];
                    $sql1="SELECT * FROM `subject` WHERE `subId`='$subId'";
                    $result1=mysqli_query($conn,$sql1);
                    $row_for_sub=mysqli_fetch_assoc($result1);
                    $subject=$row_for_sub['Subject'];
                    ?>
        <tr>
        <th scope="row"><?php echo $id; ?></th>
        <td><?php echo $qus; ?></td>
        <th scope="row"><?php echo $subject; ?></th>
        <td>
            <div class="row">
                <div class="col-6"><a href="editexam.php?qusid=<?php echo $id; ?>" role="button" name="edit" id="edit-logo"><img src="../img/eye-fill.svg" alt="" width="22px"></a></div>
                <div class="col-6"><a href="deleteExam.php?id=<?php echo $id; ?>" role="button" name="delete" id="delete-logo" onclick="return confirm('are you sure')"><img src="../img/trash3-fill.svg" alt="" width="22px"></a></div>
            </div>
        </td>
        </tr>
        <?php
   } } ?>
    </tbody>
    </table>
</div>
</body>
</html>
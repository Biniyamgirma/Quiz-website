<?php 
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap/bootstrap.css">
</head>
<body>
    <div class="container">
        <h2 class="textcenter">Set Quiz Password</h2>
    <div class="row p-3">
          <div class="col-md-4">
            <!-- card 1 -->
            <div class="card ">
              <img src="img/maths.jpg" class="card-img-top" alt="..." height="221.12" ">
              <div class="card-body">
                <h5 class="card-title" style="font-size: 32px; color: #134B70; font-weight: 400;">Mathematics</h5>
                <a href="set_exam_password.php?qid=123"  class="btn btn-primary my-class">Set Quiz Password</a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <!-- card2 -->
            <div class="card">
              <img src="img/biology.jpg" class="card-img-top" alt="..." height="221.12" >
              <div class="card-body">
                <h5 class="card-title" style="font-size: 32px; color: #134B70; font-weight: 400; " >Biology</h5>
                <a href="set_exam_password.php?qid=124" class="btn btn-primary my-class">Set Quiz Password</a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <!-- card3 -->
            <div class="card">
              <img src="img/chem.jpg" class="card-img-top" alt="..." height="221.12" >
              <div class="card-body">
                <h5 class="card-title" style="font-size: 32px; color: #134B70; font-weight: 400;">Chemistry</h5>
                <a href="set_exam_password.php?qid=125" class="btn btn-primary my-class">Set Quiz Password</a>
              </div>
            </div>
          </div>
        </div>
    </div>
</body>
</html>
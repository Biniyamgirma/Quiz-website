<?php 
session_start();
include("conn.php");
if(isset($_SESSION["firstname"]) && isset($_SESSION["lastname"]) && isset($_SESSION["email"]) && isset($_SESSION["id"])){
  $fname= $_SESSION["firstname"];
  $lname= $_SESSION["lastname"] ;
  $email =$_SESSION["email"];
  $id =$_SESSION["id"];
}else {
  header('location:signup.php');
}                   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./bootstrap/bootstrap.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/new.css">
    <title>Home</title>
</head>
<body class="vh-100" style="position: relative;">
<nav class="navbar navbar-expand-lg bg-green  " style="background-color: #88D66C; ">
        <div class="container">
          <a class="navbar-brand fs-4" href="index001.php" >
            <img src="img/icons8-education-100.png" width="50px" height="50px" ALIGN="left" alt="pear fruit picture">
            <h1 class="mx-1">
                Quiz<span style="color: #134B70;">Website</span>
            </h1>
          </a>
          <!-- button part -->
          <button class="navbar-toggler shadow-none border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="sidebar offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header text-white border-bottom">
              <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
              <button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
              <ul class="navbar-nav justify-content-end fs-5 flex-grow-1 pe-3">
                <li class="nav-item">
                  <a class="nav-link  active my-class" aria-current="page" href="index001.php">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link my-class" href="contact001.html">Contact</a>
                </li>
                <li class="nav-item dropdown">

                  <!-- <a class="nav-link dropdown-toggle my-class" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Dropdown
                  </a>
                  <ul class="dropdown-menu ">
                    <li><a class="dropdown-item" href="#main-body">Service</a></li>
                    <li><a class="dropdown-item" href="#footer_bottom">footer</a></li>
                    <li>
                      <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#first-section">Main content</a></li>
                  </ul> -->
                </li>
                <li class="nav-item dropdown">
                  <!-- there is un image right here  -->
                   <a href="#" class="mx-2" id="profilePicture">
                      <?php
                      $query="SELECT `ID`, `file` FROM `customer` WHERE ID='$id'";
                      $result=mysqli_query($conn,$query);
                      while($row=mysqli_fetch_assoc($result)){
                        $fileName=$row['file']; ?>
                        <img src="upload/<?php echo$fileName;?>" class="rounded-circle" style="width:50px; height:50px; object-fit:cover; border:2px solid #134B70;">
                     <?php }
                      ?>
                    </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </nav>
        <section class="about-section1" id="first-section">
          <div class="card text-center container-fluid main-card-body">
           
          <div class="card " style="width: 18rem; display:none; position:absolute; right:20px; top:0px" id="profilePictureMenu">
                      <ul class="list-group list-group-flush " > 
                        <li class="list-group-item d-flex ">
                        <form method="post" action="delete.php" >
                          <button type="submit" class="btn btn-danger mx-3" id="signupbutton2" name="DeleteAcc" style="background-color:#fc411e;">Delete Account </button>
                        </form>
                        <div>
                            <img src="img/box-arrow-right.svg" alt="" class="mx-3" id="hideButton" style="width:30px;  ">
                        </div>
                        </li>
                        <li class="list-group-item  p-2 text-dark " >
                          <form  method="post" enctype="multipart/form-data">
                            <div class="container" >
                              <div class="input-group profile-pic" >
                                    <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" name="image">
                                    <button class="btn btn-outline-secondary" type="submit" id="inputGroupFileAddon04" name="submit">upload</button>
                              </div>
                            </div>
                          </form>
                          <?php 
                              if(isset($_POST['submit'])){
                                $file_name=$_FILES['image']['name'];
                                $tempFile=$_FILES['image']['tmp_name'];
                                $folder ='upload/'.$file_name;
                                $sqlQuery="UPDATE `customer` SET `file`='$file_name' WHERE ID='$id'";
                                $result=mysqli_query($conn,$sqlQuery);

                                if(move_uploaded_file($tempFile,$folder )){
                                
                                }else{
                                  echo'<p style="color:white;">file error </p>';
                                }
                              }
                          ?>
                        </li>
                        <li class="list-group-item ">
                          <form method="post" action="logout.php" >
                            <button type="submit" class="btn  mx-3" id="signupbutton2" name="logoutButton" style="background-color:#134B70; color:aliceblue">logout</button>
                          </form>
                        </li>
                      </ul>
                    </div>
            <div class="card-body">
              <h5 class="card-title" style="font-size: 72px; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; padding-top: 32px;">Quiz <span style="color: #134B70;">Website</span></h5>
              <p class="card-text" style="font-size: 20px;font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;padding-top: 32px;padding-bottom: 32px;">The Ultimate Quiz Showdown.<br>Test How much you know about different Topics ?<br> Find out in Our  <span style="color: #134B70;">Quiz Website</span> .</p>
                <h1>
                Welcome,<span style="color: #134B70;">
                  <?php
                    echo" ".$fname."  ".$lname."  ";
                ?></span>
                </h1>
            </div>
            <div class="card-footer text-muted">
              <img src="./img/chevron-double-down.svg" width="32px" height="32px" alt="">
            </div>
          </div>
        </section>
        <section class="about-section4" id="second-section">
          <div class="card text-center container-fluid about-card-body " style="border: none;">
            <div class="card-body">
              <h5 class="card-title" style="font-size: 64px; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; padding-top: 32px; color: #134B70;">Exam Result</h5>
              <p class="card-text">
                Chcek Out How much You Scored In Our Brain Teaser Quizes
              </p>
              <div class="about-card">
                <div class="row about-card2">
                  <?php
                    $sql="SELECT  `subId`, `score` FROM `score` WHERE `ID`='$id'";
                    $resultScore=mysqli_query($conn,$sql);
                    $rowScore=mysqli_num_rows($resultScore);
                    if($rowScore > 0){ 
                    while($rowScore=mysqli_fetch_assoc($resultScore)){
                      $subId=$rowScore['subId'];
                      $score=$rowScore['score'];
                  ?>
                  <div class="col-sm-6 custom-btn-aboutUs">
                    <div class="card shadow-lg">
                      <div class="card-body custom-btn-aboutUs002" style="color:#198ef9; background-color: #e8f3fd;">
                        <h5 class="card-title card-color" style="color:#198ef9;">
                          <?php
                           $sqlSubject="SELECT  `Subject` FROM `subject` WHERE `subId`='$subId'";
                           $resultSubject=mysqli_query($conn,$sqlSubject);
                           $num=mysqli_num_rows($resultSubject);
                           if($num > 0){
                            $rowSubject=mysqli_fetch_assoc($resultSubject);
                            $subject=$rowSubject['Subject'];
                           
                           echo 'Subject: '.$subject;
                          ?>
                        </h5>
                        <p class="card-text card-color" style="color:#198ef9;">
                          <?php echo 'Score:'.$score; }
                          else {
                            echo "No Exam Record Is Found !";
                          }
                          ?>
                        </p>
                        <!-- <a href="#" class="btn btn-primary">LINK</a> -->
                      </div>
                    </div>
                  </div>
                          <?php }?>
                </div>

              <?php  } else{
                          echo  '<p id="noRecord" style="color:#f0f0f0;background-color: #d62f7f;">'."No Exam Record Is Found !".'</p>';                
                        }  ?>
              </div>
            </div>
          </div>
        </section>
        <h1 class=" p-5 mt-5 mb-5 text-center" style="font-size: 64px; color: #134B70;" id="main-body">
          Exam Room Link
        </h1>
        <div class="row p-3">
          <div class="col-md-4">
            <!-- card 1 -->
            <div class="card ">
              <img src="img/maths.jpg" class="card-img-top" alt="..." height="221.12" ">
              <div class="card-body">
                <h5 class="card-title" style="font-size: 32px; color: #134B70; font-weight: 400;">Mathematics</h5>
                <p class="card-text"> <strong>Warning !!</strong>  The Value Of <strong>X</strong>  is Still Unknown.<br> <em>Dare To Find it</em>.</p>
                <a href="quizpass.php?qid=1"  class="btn btn-primary my-class">Link To Exam Room</a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <!-- card2 -->
            <div class="card">
              <img src="img/biology.jpg" class="card-img-top" alt="..." height="221.12" >
              <div class="card-body">
                <h5 class="card-title" style="font-size: 32px; color: #134B70; font-weight: 400; " >Biology</h5>
                <p class="card-text">Explore the world of <strong>Biology</strong> : Find the answer to the Mysteries of <b>Life</b>  .</p>
                <a href="quizpass.php?qid=4" class="btn btn-primary my-class">link To Exam Room</a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <!-- card3 -->
            <div class="card">
              <img src="img/chem.jpg" class="card-img-top" alt="..." height="221.12" >
              <div class="card-body">
                <h5 class="card-title" style="font-size: 32px; color: #134B70; font-weight: 400;">Chemistry</h5>
                <p class="card-text">From atoms to molecules, can you crack this <strong>Chemistry</strong> challenge ?
                </p>
                <a href="quizpass.php?qid=3" class="btn btn-primary my-class">link To Exam Room</a>
              </div>
            </div>
          </div>
        </div>
        <footer class="bottom container-fluid" id="footer_bottom">
          <section class="about-section3 bottom-color" style="display: block;">
            <p>
            This website was created using Bootstrap components as part of an internship project requirement at Meleket Advertisement and web design Company<span style="font-size: 20px;"> &copy2024</span>
            </p>
            <div class="container-fluid socal-link">
              <a href="https://github.com/Biniyamgirma" target="_blank"><img src="./img/github.svg" alt=""></a>
              <a href="#"><img src="./img/facebook.svg" alt=""></a>
              <a href="https://t.me/Biniyam_girma_1" target="_blank"><img src="./img/telegram.svg" alt=""></a>
              <a href="#"><img src="./img/icons8-linkedin.svg" alt="linked in logo" target="_blank"></a>
            </div>
          </section>
          <section class="about-section3">
            <form action="comment.php" method="post">
            <div class="mb-1 ">
                  <label for="exampleFormControlTextarea1" class="form-label" >Comment</label>
                  <textarea class="form-control" id="exampleFormControlTextarea1" cols="40" rows="2" name="textArea1"></textarea>
                  <div class="m-1">
              <button type="submit" class="btn btn-primary" name="commentSubmit" style="color:#f0f0f0;background-color: #d62f7f;">Submit</button>
              </div>
              </div>
            </form>
          </section>
        </footer>
    <script src="js/bootstrap.js" ></script>
    <script src="js/profile.js" ></script>
</body>
</html>
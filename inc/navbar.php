<?php
session_start();
include '../conn.php'; // include the connection for the database
 $id=$_SESSION["id"];
 if(empty($id)){ // check the id session if it has a value or not
  header('location:index.php');
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
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-first-color">
        <div class="container">
          <a class="navbar-brand fs-4" href="adminpage.php" >
            <img src="../img/icons8-education-100.png" ALIGN="left" alt="pear fruit picture" id="logo-image">
            <h1 class="company-name">
             <p class="c-red">Admin<span class="c-wihte"> Page</span></p>
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
              <ul class="navbar-nav justify-content-end fs-5 flex-grow-1 pe-3 ">
                <li class="nav-item center-text my-class">
                  <a class="nav-link  active my-class c-wihte" aria-current="page" href="adminpage.php" id="hello-color">Home</a>
                </li>
                <li class="nav-item center-text my-class">
                <a class="nav-link my-class c-wihte" href="admin.php">Admin</a>
                </li>
                <li class="nav-item dropdown center-text my-class">
                <a class="nav-link my-class c-wihte" href="editExamQus.php">Edit Exam</a>
                </li>
                <li class="nav-item dropdown my-class">
                  <div class="conainer">
                  <a class="nav-link dropdown-toggle my-class" id="profilePicture" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <?php
                      $query="SELECT  * FROM `admin` WHERE ID='$id'";
                      $result=mysqli_query($conn,$query);
                      while($row=mysqli_fetch_assoc($result)){
                        $fileName=$row['file']; ?>
                        <img src="../upload/<?php echo $fileName;?>" class="rounded-circle">
                     <?php }
                      ?>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="deleteAdmin.php" onclick="return confirm('are you sure!S')" id="dropdownlinkfordeleteacc">Delete Account <img src="../img/trash3-fill.svg" alt="trash icon with red color"></a></li>
                    <li><a class="dropdown-item" href="create.php" id="addquestionlink">Add Exam Question <img src="../img/cloud-plus-fill.svg" alt="cloud plus icon for adding new question in a database">
                  </a></li>
                    <li>
                      <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="logout.php" id="logoutlink">Logout <img src="../img/box-arrow-right.svg" alt="box arrow to the right icon"></a></li>
                  </ul>
                  </div>  
                </li>
              </ul>
            </div>
          </div>
        </div>
      </nav>
      <script src="../js/bootstrap.js"></script>
      <script src="../bootstrap/bootstrap.bundle.js"></script>
</body>
</html>

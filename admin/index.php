<?php
include ('../conn.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="google-site-verification" content="Lt_cVXs81d3r5xQi79Fxx0Ysy9pXzQhq-Ct4Ts_laW4" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Sign up</title>
</head>
<body class="my-body-section">
    <nav class="navbar navbar-expand-lg bg-transparent ">
        <div class="container">
          <a class="navbar-brand fs-4" href="#" >
            <img src="../img/icons8-education-100.png" width="50px" height="50px" ALIGN="left" alt="school picture">
            <h1>
                Quiz<span style="color: #134B70;">Website</span>
            </h1>
          </a>
          <!-- button part -->
          <button class="navbar-toggler shadow-none border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
          <span class="navbar-toggler-icon my-toggler"></span>
          </button>
          <div class="sidebar offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header text-white border-bottom">
              <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
              <button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
              <ul class="navbar-nav justify-content-end fs-5 flex-grow-1 pe-3">
                <li class="nav-item">
                  <a class="nav-link my-class" href="../contact001.html">Contact</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </nav>
            <?php
            if(isset($_GET['error'])){
              ?>
                <div class="alert alert-warning alert-dismissible fade show header-notification bottom-positon" role="alert" style=" color: #F5F7F8;  border: 1px solid #C7253E; background-color: #f05a7d31; width: 350px; position: absolute; right: 16px;">
                <strong><img src="../img/brilliance.svg" alt=""
                style="border-right:2px solid #06310a; filter: brightness(0) saturate(100%) invert(32%) sepia(82%) saturate(3094%) hue-rotate(350deg) brightness(101%) contrast(98%); padding-right:3px;"
                ></strong><?php echo ' '.$_GET['error']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              <?php
            }
            ?>
      <section class="sign-up-section" id="signIn" style="display:block">
        <h1 class=" text-center Wellcome-text">Admin SignIn</h1>
          <div class="container-fluid main-container">
              <form action="signin.php" method="post">
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label email-font">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="emailInput">
                    <div id="emailHelp" class="form-text">your password is stored hased on the database</div>
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label password-color">Password</label>
                    <input type="password" autocomplete="off" class="form-control" id="exampleInputPassword1" name="passwordInput">
                  </div>
                  <div class="row ">
                    <div class="col-1">
                      <img src="../img/github.svg" alt="">
                    </div>
                    <div class="col-1 mb-3">
                    <img src="../img/facebook.svg" alt="">
                    </div>
                    <div class=" col-1 mb-3">
                    <img src="../img/arrow-right-circle-fill.svg" alt="">
                    </div>
                  </div>
                  <button type="submit" class="btn  btn-color " id="signupbutton" name="signIn">Submit</button>
                </form>
          </div>
      </section>
      <script src="../js/bootstrap.js"></script>
   <script src="../js/script.js"></script>
</body>
</html>
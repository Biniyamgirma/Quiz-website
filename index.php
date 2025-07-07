<?php
include ('conn.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="google-site-verification" content="Lt_cVXs81d3r5xQi79Fxx0Ysy9pXzQhq-Ct4Ts_laW4" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./bootstrap/bootstrap.css">
    <link rel="stylesheet" href="./css/style.css">
    <title>sign up</title>
</head>
<body class="my-body-section">
    <nav class="navbar navbar-expand-lg bg-transparent ">
        <div class="container">
          <a class="navbar-brand fs-4" href="#" >
            <img src="./img/icons8-education-100.png" width="50px" height="50px" ALIGN="left" alt="pear fruit picture">
            <h1>
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
              </ul>
            </div>
          </div>
        </div>
      </nav>
      <?php
            if(isset($_GET['msg']) ){
                            ?>
            <div class="alert alert-warning alert-dismissible fade show header-notification bottom-positon" role="alert" style="  color: #06310a; background-color: #69e77668; width: 350px; position: absolute; right: 16px;">
            <strong><img src="./img/award-fill.svg" alt=""
            style="border-right:2px solid #06310a; filter: brightness(0) saturate(100%) invert(24%) sepia(8%) saturate(4235%) hue-rotate(109deg) brightness(98%) contrast(83%);"
            ></strong><?php echo ' '.$_GET['msg']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            
            <?php
            } elseif(isset($_GET['error'])){
              ?>
                <div class="alert alert-warning alert-dismissible fade show header-notification bottom-positon" role="alert" style=" color: #F5F7F8;  border: 1px solid #C7253E; background-color: #f05a7d31; width: 350px; position: absolute; right: 16px;">
                <strong><img src="./img/award-fill.svg" alt=""
                style="border-right:2px solid #06310a; filter: brightness(0) saturate(100%) invert(32%) sepia(82%) saturate(3094%) hue-rotate(350deg) brightness(101%) contrast(98%);"
                ></strong><?php echo ' '.$_GET['error']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              <?php
            }
            ?>
      <section class="sign-up-section" id="signIn" style="display:block">
        <h1 class=" text-center Wellcome-text">Student SignIn</h1>
          <div class="container-fluid main-container">
              <form action="signin.php" method="post">
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label email-font">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="emailInput" value="g@gmail.com">
                    <div id="emailHelp" class="form-text">enter your email </div>
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label password-color">Password</label>
                    <input type="password" autocomplete="off" class="form-control" id="exampleInputPassword1" name="passwordInput" value="1234">
                  </div>
                  <div class="row">
                    <div class="col-6">
                          <div class="mb-3 form-check">
                            
                            <label class="form-check-label" for="exampleCheck1"><a href="https://quiz-website.infinityfreeapp.com/admin/">Admin Page</a></label>
                          </div>
                    </div>
                    <div class="col-6">
                    <div >
                      <a href="#" id="forget_password">forget password?</a>
                    </div>
                    </div>
                  </div>
                  <button type="submit" class="btn  btn-color " id="signupbutton" name="signIn">Submit</button>
                  <div >
                    Don't Have An Account <a href="#" id="dontHaveAccount">Register?</a>
                  </div>
                </form>
          </div>
      </section>
      <!-- second section -->

      <section class="sign-up-section" id="Register" style="display:none">
        <h1 class=" text-center Wellcome-text">Register</h1>
          <div class="container-fluid main-container">
              <form action="register.php" method="post">
                <div class="row">
                  <div class="col-6">
                  <label for="exampleInputEmail1" class="form-label ">First Name</label>
                  <input type="text" class="form-control" id="firstName"  name="firstName">
                  </div>
                  <div class="col-6">
                  <label for="exampleInputEmail1" class="form-label ">Last Name</label>
                  <input type="text" class="form-control" id="firstName"  name="lastN">
                  </div>
                </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label ">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="emailInput">
                    <div id="emailHelp" class="form-text">you can  create account here </div>
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label ">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="passwordInput">
                  </div>
                  <button type="submit" class="btn  btn-color" name="signUp">Submit</button>
                  <div id="dont-have-account">
                  </div>
                  <div >
                    Alrady Have Account <a href="#" id="haveAccount">SignIn</a>
                  </div>
                </form>
          </div>
      </section>
    
      <!--  section 3-->

      <section class="sign-up-section" id="forgetPassword" style="display:none">
        <h1 class=" text-center Wellcome-text">Password Recovery</h1>
          <div class="container-fluid main-container">
              <form action="forgetPassword.php" method="post">
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label email-font">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="emailInput">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                  </div>
                  <div class="row">
                  <button type="submit" class="btn  btn-color " id="signupbutton1" name="submit2">Submit</button>
                </form>
          </div>
      </section>
      <script src="js/bootstrap.js"></script>
   <script src="js/script.js"></script>
</body>
</html>
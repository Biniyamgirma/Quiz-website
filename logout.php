<?php
include("conn.php");
session_start();
if (isset($_POST['logoutButton'])) {
  if(session_destroy())  {
    header("location:index.php");
  }
  }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Sign Up Page</title>
  <link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link href="https://fonts.googleapis.com/css?family=Permanent+Marker" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css"> 
  
</head>


<div class="w3-container">
  <header>
    <div class="row" style="padding-top: 20px;">
      <div class="col-5">
        <h1 class="h1" id="logo" style="color: #f3bf9f; font-family: 'Permanent Marker', cursive;">Exam Schedule Management System</h1>
      </div>
      <div class="col-6">
        <ul class="nav nav-tabs" style=" border-bottom: 0px; float: right;">
          <li class="nav-item">
            <a class="nav-link active" href="index.php" style="border-bottom-left-radius: .25rem; border-bottom-right-radius: .25rem;">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="signup.php" style="border-bottom-left-radius: .25rem; border-bottom-right-radius: .25rem;">Sign Up</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="studentlogin.php" style="border-bottom-left-radius: .25rem; border-bottom-right-radius: .25rem;">Student Log In</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="adminlogin.php" style="border-bottom-left-radius: .25rem; border-bottom-right-radius: .25rem;">Admin Log In</a>
          </li>
        </ul>
      </div>
    </div>
  </header>
</div>

<body style="background-image:url('images/5.jpg');">
  <div class="form" style="">
      
      <ul class="tab-group">
        <li class=" active"><a href="signup.php">Sign Up</a></li>
        <li class=""><a href="studentlogin.php">Log In</a></li>
      </ul>
      
      
</div> <!-- /form -->

<?php
include_once('includes/footer.php')
?>


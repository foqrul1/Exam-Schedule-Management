
<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Student Login</title>
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
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="signup.php">Sign Up</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="studentlogin.php">Student Log In</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="adminlogin.php">Admin Log In</a>
          </li>
        </ul>
      </div>
    </div>
  </header>
</div>

 <?php 
include_once("includes/dbconnection.php");     
$mess ='';
if(isset($_POST['Login'])){
  // echo "error";
  // exit();

  $emailid  = mysqli_escape_string($conn,$_POST['emailid']);
  $password = mysqli_escape_string($conn,$_POST['password']);

   $query = "SELECT id,name,emailid FROM students WHERE emailid='$emailid' AND password ='$password'";
  
  $result = mysqli_query($conn,$query);
  
   $row = mysqli_fetch_assoc($result); 
  
  $recod = mysqli_num_rows($result);
  if($recod > 0){
     $_SESSION['fullname']    = $row['name'];
     $_SESSION['emailid'] = $row['emailid'];
     $_SESSION['id']      = $row['id'];
    echo "<script>window.location='student-dashboard.php'</script>";
  } else {
     $mess = "Something went wrong !";
  }
}
?> 

<body style="background-image:url('images/5.jpg');">
  <div class="form" style="">
      
        <div class="login">   
          <h1 style="font-family: 'Permanent Marker', cursive;color: rgb(0, 0, 0)">Welcome Back!</h1>
          <p style="color: red;"><?php echo $mess;?></p>
          <form action="" method="post">
          
           <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email" name="emailid" id="emailid" required autocomplete="off" style="color: rgb(0, 0, 0)"/>
           </div>
          
          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input type="password" name="password" id="password" required autocomplete="off" style="color: rgb(0, 0, 0)"/>
          </div>          
          <button class="button button-block" type="submit" name="Login" style="font-family: 'Permanent Marker', cursive;" />Log In</button>
          
          </form>

        </div><!-- login -->
      
</div> <!-- /form -->


<?php
include_once('includes/footer.php')
?>


<?php  

session_start();
include_once("includes/dbconnection.php");

if(isset($_POST['Save']) && $_POST['coursename'] !=""){
  
  $coursecode     = $_POST['coursecode'];
  $coursename     = $_POST['coursename'];
  $credit         = $_POST['credit'];
  $examdate       = date("Y-m-d");
  $examduration   = $_POST['examduration'];
  $examlocation   = $_POST['examlocation'];
  $created_by     = $_SESSION['id'];

  $query = "INSERT INTO coursedetails(course_code, course_name, credit, exam_date, xm_duration, exam_location, created_by)
   VALUES('$coursecode','$coursename','$credit','$examdate','$examduration','$examlocation','$created_by')";

   $q = mysqli_query($conn,$query);
   
   if($q){
      echo "<script>alert('Exam Added Successfully;')</script>";
      echo "<script>window.location='addxm-details.php'</script>";
   }
}
?>


<!DOCTYPE html>
<html>
<head>
  <title>Add Exam Details</title>
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
            <a class="nav-link" href="admin-dashboard.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="addxm-details.php">Add Exam Details</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="exam-list.php">Exam List</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="student-list.php">Student List</a>
          </li>
          
          <?php 
      if(isset($_SESSION['id']) && $_SESSION['id'] !=""){
      ?>
      <li class="nav-item"><a class="nav-link" href="logout.php">Log out</a></li>
      <?php } else{?>
    <li class="nav-item"><a class="nav-link" href="adminlogin.php">Admin Log In</a>
      </li>
      <?php }?>
      
          
        </ul>
      </div>
    </div>
  </header>
</div>



<body style="background-image:url('images/5.jpg'); ;">
  <!-- background-color: #7bdef2 -->
   <div class="bodycontainer">
    <div class="row" style=" height: 500px;">
    <div class="col-3" style="border-right: 1px solid #ccc; max-width: 20%;">

      <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">

            <a class="nav-link" id="v-pills-home-tab" data-toggle="pill" href="admin-dashboard.php" role="tab" aria-controls="v-pills-home" aria-selected="true">Home</a>
            <a class="nav-link active" id="v-pills-messages-tab" data-toggle="pill" href="addxm-details.php" role="tab" aria-controls="v-pills-messages" aria-selected="false">Add Exam Details</a>
            <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="exam-list.php" role="tab" aria-controls="v-pills-messages" aria-selected="false">Exam List</a>
            <a class="nav-link " id="v-pills-messages-tab" data-toggle="pill" href="student-list.php" role="tab" aria-controls="v-pills-messages" aria-selected="false">Student List</a>
            
            <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</a>
            <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a>

         
      </div>
    </div>

<div class="col-9"><h1>Add exam</h1>  
    <form class="form-group" method="post">
  <div class="row" style="margin-bottom: 10px">
    <div class="col">
      <input type="text" name="coursecode" id="coursecode" class="form-control" required="" placeholder="Course Code">
    </div>
    <div class="col">
      <input type="text" name="coursename" id="coursename" class="form-control" required="" placeholder="Course Name ">
    </div>
    <div class="col">
      <input type="text" name="credit" id="credit" class="form-control" required="" placeholder="Credit">
    </div>
  </div>
  <div class="row" style="margin-bottom: 10px">
    <div class="col" >
      <input type="text" name="examdate" id="examdate" class="form-control" required="" placeholder="Exam Date">
    </div>
    <div class="col-4">
      <input type="text" name="examduration" id="examduration" class="form-control" required="" placeholder="Exam Duration">
    </div>
    <div class="col-4" >
      <input type="text" name="examlocation" id="examlocation" class="form-control" required=""  placeholder="Exam Location">
    </div>
    
  </div>
  <div class="col-3" style="text-align: right; margin-top: 10px; float: right;">
        <input type="submit" name="Save" value="Add New Exam" class="btn btn-primary" style="background-color: #179b77; border-color:#179b77 " />
      </div>
</form>
</div>
  
</div>
  

</div>
    
     
   </div>


<?php
include_once('includes/footer.php')
?>
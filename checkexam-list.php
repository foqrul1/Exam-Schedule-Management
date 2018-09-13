<?php
session_start();
include_once("includes/dbconnection.php");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Question List</title>
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
            <a class="nav-link" href="student-dashboard.php">Home</a>
          </li>
          <li class="nav-item">
            <li class="nav-item">
            <a class="nav-link active" href="checkexam-list.php">Exam List</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="course-checklist.php">Course Enrollment</a>
          </li>
          <?php 
      if(isset($_SESSION['id']) && $_SESSION['id'] !=""){
      ?>
      <li class="nav-item"><a class="nav-link" href="logout.php">Log out</a></li>
      <?php } else{?>
    <li class="nav-item"><a class="nav-link" href="studentlogin.php">Log In</a>
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
    <div class="row" style=" height: auto;">
    <div class="col-3" style="border-right: 1px solid #ccc; max-width: 20%;">

      <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">

            <a class="nav-link" id="v-pills-home-tab" data-toggle="pill" href="student-dashboard.php" role="tab" aria-controls="v-pills-home" aria-selected="true">Home</a>
            <a class="nav-link  active" id="v-pills-messages-tab" data-toggle="pill" href="checkexam-list.php" role="tab" aria-controls="v-pills-messages" aria-selected="false">Exam List</a>
            <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="course-checklist.php" role="tab" aria-controls="v-pills-messages" aria-selected="false">Course Enrollment</a>
      </div>
    </div>

<div class="col-9"><h1>Question List</h1>   
  <div class="row">
    <div class="col-12" >
      <table class="table table-bordered" style="border-color: #000;background-color: #f8f9fa;">
        <thead>
        <tr>
          <th>S.NO.</th>
          <th>Course Code</th>
          <th>Course Name</th>
          <th>Credit</th>
          <th>Exam Date</th>
          <th>Exam Duration</th>
          <th>Exam Location</th>
        </tr>
        </thead>
        <tbody>
          <?php 
          $query = "SELECT * FROM coursedetails ORDER BY course_code ASC";
          $result = mysqli_query($conn,$query);
          $sn=1;
          while($row = mysqli_fetch_assoc($result)) {
          ?>
          <tr>
            <td><?php echo $sn; ?></td>
            <td><?php echo $row['course_code']; ?></td>
            <td><?php echo $row['course_name']; ?></td>
            <td><?php echo $row['credit']; ?></td>       
            <td><?php echo $row['exam_date']; ?></td>
            <td><?php echo $row['xm_duration']; ?></td>
            <td><?php echo $row['exam_location']; ?></td>      
          </tr>

      <?php 
        $sn++ ;
      } ?>


        </tbody>
      </table>
    </div>
  </div>
</div>
  
</div>
  

</div>
    
     
   </div>


<?php
include_once('includes/footer.php')
?>
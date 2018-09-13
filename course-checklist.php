<?php 

session_start();
include_once("includes/dbconnection.php");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Dashboard</title>
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
            <a class="nav-link" href="checkexam-list.php">Exam List</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="course-checklist.php">Course Enrollment</a>
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

<?php 
  if(isset($_REQUEST['enrlcourse'])){
    $enrlcourse_ids =  implode(',', $_POST['course_code']);
  }


?>

<body style="background-image:url('images/5.jpg'); ;">
  <!-- background-color: #7bdef2 -->
   <div class="bodycontainer">

    <div class="row" style=" height: 500px;">
      <div class="col-3" style="border-right: 1px solid #ccc; max-width: 20%;">

      <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">

            <a class="nav-link" id="v-pills-home-tab" data-toggle="pill" href="student-dashboard.php" role="tab" aria-controls="v-pills-home" aria-selected="true">Home</a>
            <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="checkexam-list.php" role="tab" aria-controls="v-pills-messages" aria-selected="false">Exam List</a>
            <a class="nav-link active" id="v-pills-messages-tab" data-toggle="pill" href="course-checklist.php" role="tab" aria-controls="v-pills-messages" aria-selected="false">Course Enrollment</a>
                     
      </div>
    </div>
    <div class="col-8">
    <h1>Course Code You Want to take</h1>
    <form method="post" enctype="multipart/form-data" style="margin-left: 20px">
      <div class="row">
      <div class="col-12"> <ul style="list-style: none;">
      <?php
    $query  = "SELECT course_id,course_name,course_code from coursedetails";
    $result = mysqli_query($conn,$query); 
    // $row    = mysqli_fetch_assoc($result);
    // print_r($row);
    // exit();
    while($row = mysqli_fetch_array($result)) { ?>
    
        <li style="float: left; width: 350px; margin: 10px; padding: 5px;">
          
          <input type="checkbox" name="course_code[]" value="<?=$row['course_id']?>" /> 
          <b><?=$row['course_name'] ?> (<?=$row['course_code']?>)</b>
        </li> 
    
         <?php 
           }
        
          ?>
</ul> 
 </div>
  <div class="col-6">
    <input class="btn btn-info" name="enrlcourse" type="submit" value="Submit" style="margin-bottom: 20px">
  </div>
      </div>
    </form>
    </div>
    </div>
     
   </div>


<?php
include_once('includes/footer.php')
?>
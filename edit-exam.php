<?php  

session_start();
include_once("includes/dbconnection.php");

if(isset($_POST['courseid']) && $_POST['courseid']!=''){

  $courseid       =$_POST['courseid'];
  $coursecode     = $_POST['coursecode'];
  $coursename     = $_POST['coursename'];
  $credit         = $_POST['credit'];
  $examdate       = $_POST['examdate'];
  $examduration   = $_POST['examduration'];
  $examlocation   = $_POST['examlocation'];
  $modified_by    = $_SESSION['id'];
  $modified_date  = date("Y-m-d");


   $query = "UPDATE coursedetails SET course_code= '$coursecode', course_name='$coursename',credit='$credit', exam_date='$examdate', xm_duration='$examduration', exam_location='$examlocation', modified_by='$modified_by',modified_date='$modified_date' WHERE course_id=".$courseid; 

//exit;
  $qupd = mysqli_query($conn,$query);
  if($qupd){
    echo "<script>window.location='exam-list.php'</script>";
  }
  
}


?>


<!DOCTYPE html>
<html>
<head>
  <title>Edit Exam Details</title>
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


<?php



if(isset($_GET['course_id']) && $_GET['course_id'] !=''){
  $courseid= $_GET['course_id'];

   $query = "SELECT course_id,course_code,course_name,credit,exam_date,xm_duration, exam_location FROM coursedetails WHERE course_id=".$courseid;

  $result= mysqli_query($conn,$query);

  $record = mysqli_num_rows($result);

  if($record =="" || $record ==0){
    echo "<script>window.location='exam-list.php'</script>";
    exit();
  }
  $row = mysqli_fetch_assoc($result);
 
?>


    <form class="form-group" method="post">
      <input type="hidden" name="courseid" id="courseid" value="<?php echo $row['course_id'] ?>">
  <div class="row" style="margin-bottom: 10px">
    <div class="col">
      <input type="text" name="coursecode" value="<?php echo $row['course_code'] ?>" id="coursecode" class="form-control" required="" placeholder="Course Code">
    </div>
    <div class="col">
      <input type="text" name="coursename" value="<?php echo $row['course_name'] ?>" id="coursename" class="form-control" required="" placeholder="Course Name ">
    </div>
    <div class="col">
      <input type="text" name="credit" value="<?php echo $row['credit'] ?>" id="credit" class="form-control" required="" placeholder="Credit">
    </div>
  </div>
  <div class="row" style="margin-bottom: 10px">
    <div class="col" >
      <input type="text" name="examdate" value="<?php echo $row['exam_date'] ?>" id="examdate" class="form-control" required="" placeholder="Exam Date">
    </div>
    <div class="col-4">
      <input type="text" name="examduration" value="<?php echo $row['xm_duration'] ?>" id="examduration" class="form-control" required="" placeholder="Exam Duration">
    </div>
    <div class="col-4" >
      <input type="text" name="examlocation" value="<?php echo $row['exam_location'] ?>" id="examlocation" class="form-control" required=""  placeholder="Exam Location">
    </div>
    
  </div>
  <div class="col-3" style="text-align: right; margin-top: 10px; float: right;">
        <input type="submit" name="Save" value="Update Exam" class="btn btn-primary" style="background-color: #179b77; border-color:#179b77 " />
      </div>
</form>

<?php } else
echo "<script>window.location='exam-list.php'</script>";

 ?>
</div>
  
</div>
  

</div>
    
     
   </div>


<?php
include_once('includes/footer.php')
?>
 <?php  
  session_start();
  include_once("includes/dbconnection.php");  

  if(isset($_POST['update']) && $_POST['fullname'] !=""){
    $id = $_POST['id'];
    $fullname = $_POST['fullname'];
    $contactno = $_POST['contactno'];
    $emailid = $_POST['emailid'];
    $password = $_POST['password'];
    $address  = $_POST['address'];

    $query = "UPDATE students SET name='$fullname', contactno='$contactno',emailid='$emailid',password='$password',address='$address'WHERE id =".$id;
    $upd= mysqli_query($conn,$query);
    if($upd){
      echo "<script>window.location='student-dashboard.php'</script>";
    }

  }

  ?>

  <?php 
  // fetc record from database based in sid

  if(isset($_REQUEST['id']) && $_REQUEST['id'] !=''){
    $id = $_REQUEST['id'];
    $query= "SELECT * FROM students WHERE id='$id'";
    $result= mysqli_query($conn,$query);
    $row = mysqli_fetch_assoc($result);
    // print_r($row);
    // exit();
  }

?>


<!DOCTYPE html>
<html>
<head>
  <title>Edit Student Profile</title>
  <link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link href="https://fonts.googleapis.com/css?family=Permanent+Marker" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css"> 
  <style type="text/css">
    #label{
      position: static;
    }
  </style>
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
            <a class="nav-link active" href="students-dashboard.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="exam-list.php">Exam List</a>
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
     <div class="row" style=" height: 500px;">
      <div class="col-3" style="border-right: 1px solid #ccc;max-width: 20%;">

      <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
        <?php 
        if(isset($_SESSION['id']) && $_SESSION['id'] !=''){ ?>

            <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="student-dashboard.php" role="tab" aria-controls="v-pills-home" aria-selected="true">Home</a>
            <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="checkexam-list.php" role="tab" aria-controls="v-pills-messages" aria-selected="false">Exam List</a>
            <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="course-checklist.php" role="tab" aria-controls="v-pills-messages" aria-selected="false">Course Enrollment</a>

          <?php } ?>
      </div>
    </div>
      <div class="col-9"><h1>Update Profile
        <span style="float: right"><a href="student-dashboard.php">Back</a></span>
      </h1> 
        <form method="post" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?php echo $row['id']?>">
            <div class="top-row">
              <div class="field-wrap" style="margin-bottom: 0px;" >
                <label id="label">Fullname</label>
                <input type="text" name="fullname" id="fullname" required autocomplete="off" style="color: rgb(0, 0, 0)" value="<?php echo $row['name']?>"/>
              </div>
              <div class="field-wrap" style="margin-bottom: 0px;" >
                <label id="label">Contact No.</label>
                <input type="text" name="contactno" id="contactno" style="color: rgb(0, 0, 0)" value="<?php echo $row['contactno']?>"/>
              </div>
              </div>
              <div class="top-row">
              <div class="field-wrap" style="margin-bottom: 0px;">
                <label id="label">Email Address</label>
                <input type="email" name="emailid" id="emailid" required autocomplete="off" style="color: rgb(0, 0, 0)" value="<?php echo $row['emailid']?>" />
              </div>
              <div class="field-wrap" style="margin-bottom: 0px;">
                <label id="label"">Set A Password</label>
                <input type="password" name="password" id="password" required autocomplete="off" style="color: rgb(0, 0, 0)" value="<?php echo $row['password']?>" />
              </div>
            </div>
            <div class="top-row">
            <div class="field-wrap" style="margin-bottom: 0px;">
                <label id="label"">Address</label>  
                <textarea name="address" id="address" style="color: rgb(0, 0, 0); background: transparent; border-color: rgb(0, 0, 0); width: 100%; height: 43px"><?php echo $row['address']?></textarea>
              </div>
              
          </div>
          
            <div class="col-2" style="float: right;">
              <input type="submit" name="update" class="btn btn-info" value="Update"  style="font-family: 'Permanent Marker', cursive; margin-top: 20px; background-color: #179b77;border-color:#179b77" >
              </div>
              </form>
</div>

   </div>


<?php
    include_once('includes/footer.php');
  ?>

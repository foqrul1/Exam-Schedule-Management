<?php
session_start();

include_once("includes/dbconnection.php");

  if(isset($_REQUEST['id']) && $_REQUEST['id'] !=""){
    $id= $_REQUEST['id'];
    $query = "DELETE FROM students WHERE id =".$id;
    $delstudent= mysqli_query($conn,$query);
    if($delstudent){
        echo "<script>window.location='student-list.php'</script>";
    }

    
  }

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
            <a class="nav-link" href="admin-dashboard.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="addxm-details.php">Add Exam Details</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="exam-list.php">Exam List</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="student-list.php">Student List</a>
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
            <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="addxm-details.php" role="tab" aria-controls="v-pills-messages" aria-selected="false">Add Exam Details</a>
            <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="exam-list.php" role="tab" aria-controls="v-pills-messages" aria-selected="false">Exam List</a>
            <a class="nav-link  active" id="v-pills-messages-tab" data-toggle="pill" href="student-list.php" role="tab" aria-controls="v-pills-messages" aria-selected="false">Student List</a>
            
            <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</a>
            <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a>

         
      </div>
    </div>

<div class="col-9"><h1>Question List</h1>   
  <div class="row">
    <div class="col-12" >
      <table class="table table-bordered" style="border-color: #000;background-color: #f8f9fa;">
        <thead>
        <tr>
          <th>S.NO.</th>
          <th>Student Name</th>
          <th>Contact No</th>
          <th>Email Id</th>
          <th>Address</th>
          <th>Status</th>
          <th>Profile Picture</th>
          <th>Edit</th>
          <th>Delete</th>
        </tr>
        </thead>
        <tbody>
          <?php 
          $query = "SELECT * FROM students ORDER BY name ASC";
          $result = mysqli_query($conn,$query);
          $sn=1;
          while($row = mysqli_fetch_assoc($result)) {
          ?>
          <tr>
            <td><?php echo $sn; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['contactno']; ?></td>     
            <td><?php echo $row['emailid']; ?></td>
            <td><?php echo $row['address']; ?></td>
            <td><?php echo $row['status']; ?></td>  
            <td><img src="profilepics/<?php echo $row['profilepic']?>" height='100' width='100'></td>       
            <td><a class="btn btn-info" href="edit-student-by-admin.php?id=<?php echo $row['id']?>">Edit</a></td>
            <td><a class="btn btn-danger" href="student-list.php?id=<?php echo $row['id']?>">Delete</a></td>
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
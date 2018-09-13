<?php  

session_start();
include_once("includes/dbconnection.php");

if(isset($_POST['id']) && $_POST['id']!=''){


  $id             = $_POST['id'];
  $status         = $_POST['status'];
  $modified_by    = $_SESSION['id'];
  $modified_date  = date("Y-m-d");


   $query = "UPDATE students SET status= '$status' WHERE id=".$id; 

//exit;
  $qupd = mysqli_query($conn,$query);
  if($qupd){
    echo "<script>window.location='student-list.php'</script>";
  }
}

if(isset($_GET['id']) && $_GET['id'] !=''){
  $id= $_GET['id'];

   $query = "SELECT id,name,contactno,emailid,address ,status,modified_by,modified_date FROM students WHERE id=".$id;
  $result= mysqli_query($conn,$query);
  $row = mysqli_fetch_assoc($result);
}

?>


<!DOCTYPE html>
<html>
<head>
  <title>Edit Student List</title>
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
      <input type="hidden" name="id" id="id" value="<?php echo $row['id'] ?>">
  <div class="row" style="margin-bottom: 10px">
    
    <div class="col-4">
      <select name="status" id="status" value="<?php echo $row['id'] ?>" >
                <option value="Active" >Active</option>
                <option value="Inactive" >InActive</option>
              </select>
    </div>
  </div>
    
    <div class="row" style="margin-bottom: 10px">
    
  
  <div class="col-3" style="text-align: right; margin-top: 10px; float: right;">
        <input type="submit" name="Save" value="Update Student Information" class="btn btn-primary" style="background-color: #179b77; border-color:#179b77 " />
      </div>
      </div>
</form>
</div>
  
</div>
  

</div>
    
     
   </div>


<?php
include_once('includes/footer.php')
?>
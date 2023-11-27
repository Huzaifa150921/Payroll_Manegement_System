<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
        background:linear-gradient(#93A5CF ,#E4EfE9);
        background-repeat: no-repeat;
        min-height:96.1vh;
        }
    </style>
</head>
<body>
    
</body>
</html>

<?php  session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   
    <style>
      .welcome-message {
  
        font-size: 25px;
    margin-top: 20px;
    position: fixed;
    top: 19%;
    left: 2%;
    font-weight: bold;
    color: black;
    width: 28%;
    
}

.welcome-message1 {
    font-size: 25px;
    margin-top: 20px;
    position: fixed;
    top: 19%;
    left: 45%;
    font-weight: bold;
    color: black;
    width: 28%;
  
}

.welcome-message2 {
    font-size: 25px;
    margin-top: 20px;
    position: fixed;
    top: 19%;
    left: 73%;
    font-weight: bold;
    color: black;
    width: 25%;
  
}

.welcome-message3 {
    font-size: 25px;
    margin-top: 20px;
    position: fixed;
    top: 39%;
    left: 2%;
    font-weight: bold;
    color: black;
    width: 25%;
  
}

.welcome-message4 {
    font-size: 25px;
    margin-top: 20px;
    position: fixed;
    top: 39%;
    left: 45%;
    font-weight: bold;
    color: black;
    width: 25%;
  
}

.welcome-message5 {
    font-size: 25px;
    margin-top: 20px;
    position: fixed;
    top: 39%;
    left: 73%;
    font-weight: bold;
    color: black;
    width: 25%;
  
}

.welcome-message6 {
    font-size: 25px;
    margin-top: 20px;
    position: fixed;
    top: 63%;
    left: 2%;
    font-weight: bold;
    color: black;
    width: 25%;
  
}

.welcome-message7 {
    font-size: 25px;
    margin-top: 20px;
    position: fixed;
    top: 63%;
    left: 45%;
    font-weight: bold;
    color: black;
    width: 25%;
  
}
    </style>
</head>
<body>
<h2 style='text-align: center; margin-top: 20px;'>Personal Information</h2>

<?php

if (!isset($_SESSION['userid'])) {
    header('location: login2.php'); // Redirect if the user is not logged in
    exit;
}

include('connection.php'); // Include the database connection file

// Retrieve employee's name from the database
$empId = $_SESSION['userid'];
$query = mysqli_query($conn, "SELECT * FROM employee join phone on Employee=emp_id WHERE emp_id='$empId'");
$row = mysqli_fetch_array($query);
$empName = $row['emp_name'];
$empid = $row['emp_id'];
$empdob = $row['emp_dob'];
$empaddress = $row['emp_address'];
$empdepartment = $row['emp_department'];
$empdesignation = $row['emp_designation'];
$empjoindate = $row['emp_joinDate'];
$empphone = $row['phone_no'];

?>


<div class="welcome-message">
 
Name: <?php echo $empName; ?>
    </div>

    <div class="welcome-message1">
 
ID: <?php echo $empid; ?>
    </div>
    
    <div class="welcome-message2">
 
 Date Of Birth: <?php echo $empdob; ?>
     </div>

     <div class="welcome-message3">
 
 Address: <?php echo $empaddress; ?>
     </div>
     
     <div class="welcome-message4">
 
 Department: <?php echo $empdepartment; ?>
     </div>

     <div class="welcome-message5">
 
 Designation: <?php echo $empdesignation; ?>
     </div>

     <div class="welcome-message6">
 
Join Date: <?php echo $empjoindate; ?>
     </div>
     
     </div>

<div class="welcome-message7">

Phone No: <?php echo $empphone; ?>
</div>
</body>
</html>
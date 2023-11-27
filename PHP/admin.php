<?php  session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../CSS/admin.css">
    <style>
      .welcome-message {
    text-align: center;
    font-size: 40px;
    margin-top: 20px;
    position: fixed;
    top: 60%;
    left: -23%;
    font-weight: bold;
    color: black;
    width: 150%;
}

.welcome-message1 {
    text-align: center;
    margin-top: 20px;
    position: fixed;
    top: 30%;
    left: 50%;
    transform: translateX(-50%);
    width: 150px;
    height: 150px;
    border-radius: 50%;
    overflow: hidden;
}

.welcome-message1 img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}


    
    </style>
</head>
<body>
    <header>
        <a href="admin.php" class="logo">Pay Roll</a>

        <nav class="navbar">
            <ul>
                <li><a href="../PHP/displayemp.php">Manage Employee</a>
                  
                <li><a href="#">Requests &#8711;</a>
                    <ul>
                        <li><a href="../PHP/displayrequest.php">Advance Salary</a></li>
                        <li><a href="../PHP/displayleaverequest.php">Leave</a></li>
                       
                    </ul>
                </li>

                <li><a href="#">Search &#8711;</a>
                    <ul>
                        <li><a href="../PHP/searchbyname.php">By Name</a></li>
                        <li><a href="../PHP/searchbyid.php">By ID</a></li>
                        <li><a href="../PHP/searchbydesignation.php">By Designation</a></li>
                    </ul>
                </li>
               
                <li><a href="#">Record &#8711;</a>
                    <ul>
                        <li><a href="../PHP/displaysalary.php">Salary Record</a></li>
                        <li><a href="../PHP/displayattendance.php">Attendance Record</a></li>
                        <li><a href="../PHP/displayallowance.php">Allowance Record</a></li>
                        <li><a href="../PHP/displayleave.php">Leave Record</a></li>
                        <li><a href="../PHP/displaypayment.php">Payment Record</a></li>
                        <li><a href="../PHP/addattpercentage.php">Calculate Percentage</a></li>
                        <li><a href="../PHP/adddeduction.php">Calculate Deduction</a></li>
                    </ul>
                </li>
               
                <li><a href="../PHP/logout.php">Log Out</a></li>
            </ul>
        </nav>
    </header>


    <?php
if (!isset($_SESSION['username'])) {
    header('location: login1.php'); // Redirect if the user is not logged in
    exit;
}

include('connection.php'); // Include the database connection file

// Retrieve employee's name from the database
$username = $_SESSION['username'];
$query = mysqli_query($conn, "SELECT Admin_Name,profile_picture FROM admin WHERE Admin_Name='$username'");
$row = mysqli_fetch_array($query);
$username1 = $row['Admin_Name'];
$profilepic=$row['profile_picture']
    ?>

<div class="welcome-message1">
 <?php echo "<img src='$profilepic' alt='Profile Picture'>"; ?>
    </div>

    <div class="welcome-message">
        Welcome <?php echo $username1; ?>!
    </div>

    
</body>
</html>

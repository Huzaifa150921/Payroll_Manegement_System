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
    top: 20%;
    left: -23%;
    font-weight: bold;
    color: black;
    width: 150%;
    
}

    
    </style>
</head>
<body>
    <header>
        <a href="employee.php" class="logo">Pay Roll</a>

        <nav class="navbar">
            
            <ul>
                <li><a href="profileemp.php">View Profile</a>
                 
                </li>
               
                <li><a href="">Requests &nabla;</a>
                <ul>
                        <li><a href="../PHP/displayempsalaryrequest.php">Advance Salary</a></li>
                        <li><a href="../PHP/displayempleaverequest.php">Leave</a></li>
                      
                    </ul>
                </li>
               
                <li>
                    <a href="">Record &nabla;</a>
                <ul>
                        <li><a href="../PHP/displayempsalary.php">Salary Record</a></li>
                        <li><a href="../PHP/displayattemp.php">Attendance Record</a></li>
                        <li><a href="../PHP/displayempallowance.php">Allowance Record</a></li>
                        <li><a href="../PHP/displayempleave.php">Leave Record</a></li>
                        <li><a href="../PHP/dislayemppayment.php">Payment Record</a></li>
                    </ul>
                </li>
               
                <li><a href="../PHP/logout.php">Log Out</a></li>
            </ul>
            
        </nav>


    
    </header>
<?php

if (!isset($_SESSION['userid'])) {
    header('location: login2.php'); // Redirect if the user is not logged in
    exit;
}

include('connection.php'); // Include the database connection file

// Retrieve employee's name from the database
$empId = $_SESSION['userid'];
$query = mysqli_query($conn, "SELECT emp_name FROM employee WHERE emp_id='$empId'");
$row = mysqli_fetch_array($query);
$empName = $row['emp_name'];
?>


<div class="welcome-message">
 
Welcome <?php echo $empName; ?>!
    </div>

   
</body>
</html>
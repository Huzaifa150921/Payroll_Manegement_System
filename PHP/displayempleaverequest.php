<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
      body {
            background: linear-gradient(#93A5CF, #E4EfE9);
            background-repeat: no-repeat;
            min-height: 96.1vh;
            text-align: center; 
            font-family: Arial, sans-serif; 
        }

        table {
            width: 50%; 
            margin: 0 auto; 
            background-color: #FFFFFF; 
            border-collapse: collapse;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); 
        }

        table, th, td {
            border: 2px solid black; 
        }

        th, td {
            padding: 10px; 
            text-align: center; 
        }

        a {
            text-decoration: none; 
            color: #0066cc; 
            background-color: #f2f2f2; 
            padding: 6px 12px; 
            margin: 5px; 
            border-radius: 4px; 
            transition: background-color:blue 0.3s ease; 
            display: inline-block; 
        }

        a:hover {
            background-color: #ff9900; 
            color: #FFFFFF; 
        }
    </style>
</head>
<body>
    
</body>
</html>

<?php

session_start();
include 'connection.php';

$empId = isset($_SESSION['userid']) ? $_SESSION['userid'] : null; // Check if 'userid' is set
if ($empId !== null) {
    $requestsResult = mysqli_query($conn, "SELECT * FROM leave_request WHERE employee_id='$empId' ") or die("Query Unsuccessful");
} else {

    echo "You are not logged in. Please log in to view leave requests.";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Leave Requests</title>
    
</head>
<body>
    <h1>Leave Requests</h1>
    <table border="1">
        <tr>
            
        
            <th>No Of Leaves</th>
            <th>Leave Type</th>
            <th>Admin Response</th>
         
        </tr>
        <?php while ($row = mysqli_fetch_assoc($requestsResult)) { ?>
            <tr>
                
         
                <td><?php echo $row['no_of_leaves']; ?></td>
                <td><?php echo $row['type']; ?></td>
                <td><?php echo $row['admin_response']; ?></td>
              
            </tr>
        <?php } ?>
    </table>
    <a href="employee.php">Back to Home</a>
    <a href="addleave.php">Request Leave</a>
</body>
</html>

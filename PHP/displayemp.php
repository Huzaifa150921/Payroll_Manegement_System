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

<?php
include 'connection.php';
$sql = "SELECT * FROM employee
JOIN phone ON emp_id = Employee
JOIN admin ON Admin = admin_id";

$result = mysqli_query($conn, $sql) or die("Query Unsuccessful");

if(mysqli_num_rows($result) > 0) {
    echo "<h2 style='text-align: center; margin-top: 20px;'>Employee Information</h2>";
    echo "<table cellspacing='7px' border='1' width='100%' style='border-collapse: collapse; margin: 20px auto; text-align: center;'>";
    echo "<tr style='background-color: skyblue;'><th>ID</th><th>Name</th><th>Password</th><th>DOB</th><th>Address</th><th>Department</th><th>Designation</th><th>Join Date</th><th>Phone No</th></tr>";

    while($row=mysqli_fetch_assoc($result)){
        echo "<tr><td>{$row['emp_id']}</td><td>{$row['emp_name']}</td><td>{$row['emp_pass']}</td><td>{$row['emp_dob']}</td><td>{$row['emp_address']}</td><td>{$row['emp_department']}</td><td>{$row['emp_designation']}</td><td>{$row['emp_joinDate']}</td><td>{$row['phone_no']}</td></tr>";
    }
    echo "</table>";

    // Button styling with adjusted gap
    $buttonStyle = "display: inline-block; padding: 10px 20px; background-color: #007bff; color: white; text-decoration: none; border: none; border-radius: 5px; margin-top: 10px; margin-right: 10px;";

    echo "<div style='text-align: center;'>";
    echo "<a href='addemp.php' style='{$buttonStyle}'>Add Employee</a>";
    echo "<a href='updateemp.php' style='{$buttonStyle}'>Update Employee</a>";
    echo "<a href='removeEmp.php' style='{$buttonStyle}'>Delete Employee</a>";
    echo "<a href='../PHP/admin.php' style='{$buttonStyle}'>Home Page</a>";
    echo "</div>";
} else {
    echo "<p style='text-align: center;'>No record found</p>";
    $buttonStyle = "display: inline-block; padding: 10px 20px; background-color: #007bff; color: white; text-decoration: none; border: none; border-radius: 5px; margin-top: 10px; margin-right: 10px;";

    echo "<div style='text-align: center;'>";
    echo "<a href='addemp.php' style='{$buttonStyle}'>Add Employee</a>";
    echo "<a href='updateemp.php' style='{$buttonStyle}'>Update Employee</a>";
    echo "<a href='removeEmp.php' style='{$buttonStyle}'>Delete Employee</a>";
    echo "<a href='../PHP/admin.php' style='{$buttonStyle}'>Home Page</a>";
    echo "</div>";
}
?>

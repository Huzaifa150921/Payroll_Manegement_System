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
session_start();
include 'connection.php';
$empId = $_SESSION['userid'];

$result = mysqli_query($conn, "SELECT * from attendance join employee on Employee = emp_id join salary on Salary=s_id where emp_id='$empId'") or die("Query Unsuccessful");

$buttonStyle = "display: inline-block; padding: 10px 20px; background-color: #007bff; color: white; text-decoration: none; border: none; border-radius: 5px; margin-top: 10px; margin-right: 10px;";

if (mysqli_num_rows($result) > 0) {
    echo "<h2 style='text-align: center; margin-top: 20px;'>Attendance Record</h2>";
    echo "<table cellspacing='7px' border='1' width='100%' style='border-collapse: collapse; margin: 20px auto; text-align: center;'>";
    echo "<tr style='background-color: skyblue;'><th>Attendance ID</th><th>Total Present</th><th>Total Absent</th><th>Date</th><th>Percentage</th><th>Time In</th><th>Time Out</th></tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        $aid = $row['A_id'];
        $tp = $row['Total_Present'];
        $ta = $row['Total_Absents'];
        $ad = $row['Attendance_Date'];
        $ap=$row['Total_Percentage'];
        $ti = $row['Time_in'];
        $to = $row['Time_out'];
       

        echo "<tr><td>$aid</td><td>$tp</td><td>$ta</td><td>$ad</td><td>$ap</td><td>$ti</td><td>$to</td></tr>";
    }
    echo "</table>";

    echo "<div style='text-align: center;'>";
    echo "<a href='../PHP/employee.php' style='{$buttonStyle}'>Home Page</a>";
} else {
    echo "<p style='text-align: center;'>No record found</p>";
    echo "<div style='text-align: center; margin-top: 10px;'>";
    echo "<a href='../PHP/employee.php' style='{$buttonStyle}'>Home Page</a>";
    echo "</div>";
}
?>

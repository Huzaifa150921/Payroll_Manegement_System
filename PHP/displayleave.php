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
$sql = "SELECT * FROM leaves join employee on emp_id=Employee join attendance on A_id=Attendance";

$result = mysqli_query($conn, $sql) or die("Query Unsuccessful");

$buttonStyle = "display: inline-block; padding: 10px 20px; background-color: #007bff; color: white; text-decoration: none; border: none; border-radius: 5px; margin-top: 10px; margin-right: 10px;";

if (mysqli_num_rows($result) > 0) {
    echo "<h2 style='text-align: center; margin-top: 20px;'>Leave Record</h2>";
    echo "<table cellspacing='7px' border='1' width='100%' style='border-collapse: collapse; margin: 20px auto; text-align: center;'>";
    echo "<tr style='background-color: skyblue;'><th>Employee</th><th>Attendance ID</th><th>Date of leave</th><th>No of Leave</th><th>Type</th></tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>{$row['emp_name']}</td><td>{$row['A_id']}</td><td>{$row['date_of_leave']}</td><td>{$row['No_Of_Leave']}</td><td>{$row['Type']}</td></tr>";
    }
    echo "</table>";

    echo "<div style='text-align: center;'>";
    echo "<a href='../PHP/admin.php' style='{$buttonStyle}'>Home Page</a>";
    echo "</div>";
} else {
    echo "<p style='text-align: center;'>No record found</p>";
    echo "<div style='text-align: center; margin-top: 10px;'>";
    echo "<a href='../PHP/admin.php' style='{$buttonStyle}'>Home Page</a>";
    echo "</div>";
}
?>

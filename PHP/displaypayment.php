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

$sql1 = "SELECT * FROM pay join employee on emp_id=Employee join salary on s_id=Salary join payment on payment_id= Payment";

$result1 = mysqli_query($conn, $sql1) or die("Query Unsuccessful");


$buttonStyle = "display: inline-block; padding: 10px 20px; background-color: #007bff; color: white; text-decoration: none; border: none; border-radius: 5px; margin-top: 10px; margin-right: 10px;";


if (mysqli_num_rows($result1) > 0) {
    echo "<h2 style='text-align: center; margin-top: 20px;'>Payment Record</h2>";
    echo "<table cellspacing='7px' border='1' width='100%' style='border-collapse: collapse; margin: 20px auto; text-align: center;'>";
    echo "<tr style='background-color: skyblue;'><th>Employee</th><th>Pay ID</th><th>Account</th><th>Pay Time</th><th>Pay Date</th><th>Total Salary</th></tr>";

    while ($row = mysqli_fetch_assoc($result1)) {
        echo "<tr><td>{$row['emp_name']}</td><td>{$row['pay_id']}</td><td>{$row['Account']}</td><td>{$row['pay_time']}</td><td>{$row['pay_date']}</td><td>{$row['deduction']}</td></tr>";
    }
    echo "</table>";

    echo "<div style='text-align: center;'>";
    echo "<a href='addpayment.php' style='{$buttonStyle}'>Add / Update Payment</a>";
    echo "<a href='../PHP/admin.php' style='{$buttonStyle}'>Home Page</a>";
    echo "</div>";
} else {
    echo "<p style='text-align: center;'>No record found</p>";
    echo "<div style='text-align: center; margin-top: 10px;'>";
    echo "<a href='addpayment.php' style='{$buttonStyle}'>Add / Update Payment</a>";
    echo "<a href='../PHP/admin.php' style='{$buttonStyle}'>Home Page</a>";
    echo "</div>";
}
?>

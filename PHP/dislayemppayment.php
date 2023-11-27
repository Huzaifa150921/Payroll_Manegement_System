
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style> body{
        background:linear-gradient(#93A5CF ,#E4EfE9);
        background-repeat: no-repeat;
        min-height:96.1vh;
        }</style>
</head>
<body>
    
</body>
</html>

<?php
session_start();
include 'connection.php';
$empId = $_SESSION['userid'];


$sql1 = "SELECT * FROM pay join employee on emp_id=Employee join salary on s_id=Salary join payment on payment_id= Payment where Employee=$empId";

$result1 = mysqli_query($conn, $sql1) or die("Query Unsuccessful");

$buttonStyle = "display: inline-block; padding: 10px 20px; background-color: #007bff; color: white; text-decoration: none; border: none; border-radius: 5px; margin-top: 10px; margin-right: 10px;";

if (mysqli_num_rows($result1) > 0) {
    echo "<h2 style='text-align: center; margin-top: 20px;'>Payment Record</h2>";
    echo "<table cellspacing='7px' border='1' width='100%' style='border-collapse: collapse; margin: 20px auto; text-align: center;'>";
    echo "<tr style='background-color: skyblue;'><th>Pay ID</th><th>Total Salary</th><th>Account</th><th>Pay Date</th><th>Pay Time</th></tr>";

    while ($row = mysqli_fetch_assoc($result1)) {
        $pid = $row['pay_id'];
        $ts = $row['deduction'];
        $acc = $row['Account'];
        $pd = $row['pay_date'];
        $pt = $row['pay_time'];
       

        echo "<tr><td>$pid</td><td>$ts</td><td>$acc</td><td>$pd</td><td>$pt</td></tr>";
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

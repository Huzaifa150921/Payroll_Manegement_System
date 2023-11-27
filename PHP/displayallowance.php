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


<?php
include 'connection.php';
$sql = "SELECT * FROM allowances
JOIN employee e ON allowances.Employee = e.emp_id
JOIN admin a ON allowances.Admin = a.admin_id";

$result = mysqli_query($conn, $sql) or die("Query Unsuccessful");


if (mysqli_num_rows($result) > 0) {
    echo "<h2 style='text-align: center; margin-top: 20px;'>Allowance Record</h2>";
    echo "<table cellspacing='7px' border='1' width='100%' style='border-collapse: collapse; margin: 20px auto; text-align: center;'>";
    echo "<tr style='background-color: skyblue;'><th>Employee</th><th>Amount</th><th>Type of Allowance</th></tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>{$row['emp_name']}</td><td>{$row['Amount_of_Allowance']}</td><td>{$row['Type_of_Allowances']}</td></tr>";

    }
    echo "</table>";
    $buttonStyle = "display: inline-block; padding: 10px 20px; background-color: #007bff; color: white; text-decoration: none; border: none; border-radius: 5px; margin-top: 10px; margin-right: 10px;";

     echo "<div style='text-align: center;'>";
    echo "<a href='addallowance.php' style='{$buttonStyle}'>Add / Update Allowance</a>";
    echo "<a href='../PHP/admin.php' style='{$buttonStyle}'>Home Page</a>";
   
    echo "</div>";
    
    
} else {
    $buttonStyle = "display: inline-block; padding: 10px 20px; background-color: #007bff; color: white; text-decoration: none; border: none; border-radius: 5px; margin-top: 10px; margin-right: 10px;";
    echo "<p style='text-align: center;'>No record found</p>";
    echo "<div style='text-align: center;'>";
    echo "<a href='addallowance.php' style='{$buttonStyle}'>Add / Update Allowance</a>";
    echo "<a href='../PHP/admin.php' style='{$buttonStyle}'>Home Page</a>";
    
    echo "</div>";
}
?>
</body>
</html>
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
$sql = "SELECT * from generate join employee on Employee=emp_id join salary on Salary=s_id";

$result = mysqli_query($conn, $sql) or die("Query Unsuccessful");


if (mysqli_num_rows($result) > 0) {
    echo "<h2 style='text-align: center; margin-top: 20px;'>Salary Record</h2>";
    echo "<table cellspacing='7px' border='1' width='100%' style='border-collapse: collapse; margin: 20px auto; text-align: center;'>";
    echo "<tr style='background-color: skyblue;'><th>Employee</th><th>Salary ID</th><th>Issuance Date</th><th>Basic Salary</th><th>Taxes %</th><th>Bonus %</th><th>Advance Salary</th><th>Deduction</th><th>Loan</th></tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>{$row['emp_name']}</td><td>{$row['s_id']}</td><td>{$row['date_of_issuance']}</td><td>{$row['basic_salary']}</td><td>{$row['taxes']}</td><td>{$row['bonus']}</td><td>{$row['Advance_salery']}</td><td>{$row['deduction']}</td><td>{$row['loan']}</td></tr>";

    }
    echo "</table>";
    $buttonStyle = "display: inline-block; padding: 10px 20px; background-color: #007bff; color: white; text-decoration: none; border: none; border-radius: 5px; margin-top: 10px; margin-right: 10px;";

     echo "<div style='text-align: center;'>";
    echo "<a href='addsalary.php' style='{$buttonStyle}'>Add / Update Salary</a>";
    echo "<a href='../PHP/admin.php' style='{$buttonStyle}'>Home Page</a>";
    
    
} else {
    $buttonStyle = "display: inline-block; padding: 10px 20px; background-color: #007bff; color: white; text-decoration: none; border: none; border-radius: 5px; margin-top: 10px; margin-right: 10px;";
    echo "<p style='text-align: center;'>No record found</p>";
    echo "<div style='text-align: center; margin-top: 10px;'>";
    echo "<a href='addsalary.php' style='display: inline-block; padding: 10px 20px; background-color: #007bff; color: white; text-decoration: none; border: none; border-radius: 5px;'>Add / Update Record</a>";
    echo "<a href='../PHP/admin.php' style='margin-left:9px; {$buttonStyle}'>Home Page</a>";
    echo "</div>";
}
?>

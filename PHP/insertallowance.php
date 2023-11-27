<?php
$amount = $_POST['amount'];
$type = $_POST['type'];
$emp_id = $_POST['employee'];
$Admin_id = $_POST['admin']; // Add a semicolon at the end of this line

include 'connection.php';

$sql2 = "INSERT INTO allowances (Admin, Employee, Amount_of_Allowance, Type_of_Allowances)
VALUES ('$Admin_id', '$emp_id', '$amount', '$type')";

$insertResult = mysqli_query($conn, $sql2) or die("Insert Query Unsuccessful");

if ($insertResult) {
    echo "<p style='text-align: center;'>Allowance added for Employee ID {$emp_id}</p>";

    echo "<script>
    setTimeout(function() {
        window.location.href = 'http://localhost:8080/payroll/PHP/displayallowance.php';
    }, 3000); // 3000 milliseconds = 3 seconds
    </script>";

    echo "<script>
    setTimeout(function() {
        window.location.href = 'http://localhost:/payroll/PHP/displayallowance.php';
    }, 3000); // 3000 milliseconds = 3 seconds
    </script>";
} else {
    echo "<p style='text-align: center;'>No Record Found</p>";
}

mysqli_close($conn);
?>

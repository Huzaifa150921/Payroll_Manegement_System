<?php

$name = $_POST['name'];
$pass = $_POST['pass'];
$dob = $_POST['dob'];
$address = $_POST['address'];
$joindate = $_POST['joindate'];
$designation = $_POST['designation'];
$department = $_POST['department'];
$phone = $_POST['phone'];
include 'connection.php';

$sql = "INSERT INTO employee (emp_name,emp_pass, emp_dob, emp_address,  emp_joindate,emp_designation, emp_department) VALUES ('$name','$pass', '$dob', '$address', '$joindate','$designation', '$department')"; 

$sql1="INSERT INTO phone(Employee,phone_no) VALUES (LAST_INSERT_ID(), '$phone')";

$result = mysqli_query($conn, $sql);
$result1=mysqli_query($conn,$sql1);

if ($result && $result1) {
    echo "<p style='text-align: center;'>Employee {$name} Successfully Added on {$joindate}</p>"; 
       
    echo "<script>
    setTimeout(function() {
        window.location.href = 'http://localhost:8080/payroll/PHP/displayemp.php';
    }, 3000); // 3000 milliseconds = 3 seconds
</script>";

echo "<script>
setTimeout(function() {
    window.location.href = 'http://localhost:/payroll/PHP/displayemp.php';
}, 3000); // 3000 milliseconds = 3 seconds
</script>";
} else {
    echo "<p style='text-align: center;'>No record found</p>";
}

mysqli_close($conn);
?>

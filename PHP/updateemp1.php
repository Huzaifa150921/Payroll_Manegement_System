<?php
$name = $_POST['name'];
$pass = $_POST['pass'];
$dob = $_POST['dob'];
$address = $_POST['address'];
$joindate = $_POST['joindate'];
$designation = $_POST['designation'];
$department = $_POST['department'];
$phone = $_POST['phone'];
$emp_id = $_POST['employee']; // Assuming the name attribute of the select field is "employee"

include 'connection.php'; 
$sql = "SELECT emp_id, phone_no FROM employee JOIN phone ON employee.emp_id = phone.Employee WHERE employee.emp_id = '$emp_id'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // Employee already has a salary entry, update the existing record
    $sql1 = "UPDATE employee
                    SET emp_name = '$name',emp_pass = '$pass',
                    emp_dob = '$dob', emp_address = '$address', emp_department = '$department', emp_designation='$designation',emp_joinDate='$joindate'
                    WHERE emp_id = '$emp_id'";
    $updateResult = mysqli_query($conn, $sql1) or die("Update Query Unsuccessful");

    $sql2 = "UPDATE phone SET phone_no='$phone' WHERE Employee = '$emp_id'";
    $updateResult2 = mysqli_query($conn, $sql2) or die("Update Query Unsuccessful");

    if ($updateResult && $updateResult2) {
        echo "<p style='text-align: center;'>Employee Successfully updated</p>"; 
       
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
        echo "<p style='text-align: center;'>Update failed</p>";
    }
} else {
    echo "<p style='text-align: center;'>No record found</p>";
}

mysqli_close($conn);
?>

<?php
$doa = $_POST['doa'];
$timein = $_POST['timein'];
$timeout = $_POST['timeout'];
$absent = $_POST['absent'];
$presnet = $_POST['present'];
$s_id = $_POST['salary'];
$emp_id = $_POST['employee'];

include 'connection.php';

$sql = "SELECT * FROM attendance WHERE YEAR(Attendance_Date) = YEAR('$doa') AND MONTH(Attendance_Date) = MONTH('$doa') AND Employee = '$emp_id'";
$result = mysqli_query($conn, $sql) or die("Query Unsuccessful");

if (mysqli_num_rows($result) > 0) {
    // Update the existing attendance entry
    $sql1 = "UPDATE attendance
             SET Total_Present = '$presnet', Total_Absents = '$absent', Time_in = '$timein', Time_out = '$timeout'
             WHERE YEAR(Attendance_Date) = YEAR('$doa') AND MONTH(Attendance_Date) = MONTH('$doa') AND Employee = '$emp_id'";

    $updateResult = mysqli_query($conn, $sql1) or die("Update Query Unsuccessful");

    if ($updateResult) {
        echo "<p style='text-align: center; color:green;'>Attendance of Employee ID {$emp_id} Successfully updated</p>";
        echo "<script>
        setTimeout(function() {
            window.location.href = 'http://localhost:8080/payroll/PHP/displayattendance.php';
        }, 3000);
        </script>";

        echo "<script>
        setTimeout(function() {
            window.location.href = 'http://localhost/payroll/PHP/displayattendance.php';
        }, 3000);
        </script>";
    } else {
        echo "<p style='text-align: center; color:red;'>No record found</p>";
    }
} else {
    // Insert a new attendance entry
    $sql2 = "INSERT INTO attendance (Total_Present, Total_Absents, Attendance_Date, Time_in, Time_out, Employee, Salary)
             VALUES ('$presnet', '$absent', '$doa', '$timein', '$timeout', '$emp_id', '$s_id')";

    $insertResult = mysqli_query($conn, $sql2) or die("Insert Query Unsuccessful");

    if ($insertResult) {
        echo "<p style='text-align: center;'>Attendance added for Employee ID {$emp_id}</p>";
        echo "<script>
        setTimeout(function() {
            window.location.href = 'http://localhost:8080/payroll/PHP/displayattendance.php';
        }, 3000);
        </script>";

        echo "<script>
        setTimeout(function() {
            window.location.href = 'http://localhost/payroll/PHP/displayattendance.php';
        }, 3000);
        </script>";
    } else {
        echo "<p style='text-align: center;'>No record found</p>";
    }
}

mysqli_close($conn);
?>

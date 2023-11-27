<?php
include 'connection.php';

$emp_id = $_POST['employee'];
$attendance_month = $_POST['attendance_month'];
$attendance_year = $_POST['attendance_year'];

$sql_attendance = "SELECT SUM(Total_Present) AS total_present, SUM(Total_Absents) AS total_absents FROM attendance 
                  WHERE Employee = '$emp_id' AND YEAR(Attendance_Date) = $attendance_year AND MONTH(Attendance_Date) = $attendance_month";

$result_attendance = mysqli_query($conn, $sql_attendance) or die("Attendance Query Unsuccessful");


$sql_leaves = "SELECT SUM(No_Of_Leave) AS total_leaves FROM leaves 
               WHERE Employee = '$emp_id' AND YEAR(date_of_leave) = $attendance_year AND MONTH(date_of_leave) = $attendance_month";

$result_leaves = mysqli_query($conn, $sql_leaves) or die("Leaves Query Unsuccessful");

if (mysqli_num_rows($result_attendance) > 0 && mysqli_num_rows($result_leaves) > 0) {
    $row_attendance = mysqli_fetch_assoc($result_attendance);
    $total_present = $row_attendance['total_present'];
    $total_absents = $row_attendance['total_absents'];

    $row_leaves = mysqli_fetch_assoc($result_leaves);
    $total_leaves = $row_leaves['total_leaves'];

    $total_days = $total_present + $total_absents;

    if ($total_days > 0) {
        $attendance_percentage = ($total_present / $total_days) * 100;

  
        if ($total_leaves > 5) {
            $attendance_percentage -= 5;
        }

    
        $attendance_percentage = max(0, $attendance_percentage);
        $update_sql = "UPDATE attendance SET Total_Percentage = $attendance_percentage 
        WHERE Employee = '$emp_id' AND YEAR(Attendance_Date) = $attendance_year AND MONTH(Attendance_Date)= $attendance_month";

$update_result = mysqli_query($conn, $update_sql);

if ($update_result) {
    echo "<p style='text-align: center; font-size: 18px; color: green;'>
    Attendance Percentage for Employee ID {$emp_id} in {$attendance_month}/{$attendance_year} updated to: {$attendance_percentage}%
  </p>";

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
    echo "<p style='text-align: center; font-size: 18px; color: red;'>
    Failed to update attendance percentage: " . mysqli_error($conn) . "
  </p>";
}

        
    } else {
        echo "<p style='text-align: center; font-size: 18px; color: grey;'>
            No attendance data available for the selected month and year.
          </p>";
    }
} else {
    echo "<p style='text-align: center; font-size: 18px; color: grey;'>
    No attendance data available for the selected month and year.
  </p>";
}

mysqli_close($conn);
?>

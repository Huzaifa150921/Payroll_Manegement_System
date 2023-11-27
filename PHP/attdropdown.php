<?php
include 'connection.php';

if (isset($_GET['employee'])) {
    $selectedEmployeeId = $_GET['employee'];
    $sql = "SELECT A_id, emp_id, emp_name
    FROM employee
    JOIN attendance ON emp_id = Employee
    WHERE emp_id = '$selectedEmployeeId'
      AND YEAR(Attendance_Date) = YEAR(CURDATE())
      AND MONTH(Attendance_Date) = MONTH(CURDATE());";
    $result = mysqli_query($conn, $sql);

    $options = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $options[] = array('A_id' => $row['A_id'], 'emp_id' => $row['A_id'], 'emp_name' => $row['emp_name']);
    }

    header('Content-Type: application/json');
    echo json_encode($options);
}
?>

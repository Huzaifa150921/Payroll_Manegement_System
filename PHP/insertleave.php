<?php
session_start();
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $empId = $_SESSION['userid'];
    $A_id = $_POST['attendance'];
    $dol = $_POST['dol'];
    $nol = $_POST['nol'];
    $type = $_POST['type'];

    // Convert the date to "YYYY-MM-DD" format
    $dol = date('Y-m-d', strtotime($dol));

    $sql = "INSERT INTO leave_request (employee_id, date_of_leave, Attendance, no_of_leaves, type, admin_response) VALUES (?, ?, ?, ?, ?, 'Pending')";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "isiss", $empId, $dol, $A_id, $nol, $type);

    if (mysqli_stmt_execute($stmt)) {
        echo "<p style='text-align: center;'>Leave request submitted successfully.</p>";
    } else {
        echo "<p style='text-align: center;'>Error submitting Leave request.</p>";
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>

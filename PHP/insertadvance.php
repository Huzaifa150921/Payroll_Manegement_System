<?php
session_start();
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $empId = $_SESSION['userid'];
    $advance = $_POST['advance'];

    $sql = "INSERT INTO advance_salary_requests (employee_id, amount, admin_response) VALUES (?, ?, 'Pending')";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "id", $empId, $advance);

    if (mysqli_stmt_execute($stmt)) {
        echo "<p style='text-align: center;'>Advance salary request submitted successfully.</p>";
    } else {
        echo "<p style='text-align: center;'>Error submitting advance salary request.</p>";
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>

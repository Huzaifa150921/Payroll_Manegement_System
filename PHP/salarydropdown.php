<?php
include 'connection.php';

if (isset($_GET['employee'])) {
    $selectedEmployeeId = $_GET['employee'];
    $sql = "SELECT s_id, emp_id, emp_name FROM generate JOIN salary ON s_id = Salary join employee on emp_id=Employee WHERE emp_id = '$selectedEmployeeId'";
    $result = mysqli_query($conn, $sql);

    $options = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $options[] = array('s_id' => $row['s_id'], 'emp_id' => $row['s_id'], 'emp_name' => $row['emp_name']);
    }

    header('Content-Type: application/json');
    echo json_encode($options);
}
?>

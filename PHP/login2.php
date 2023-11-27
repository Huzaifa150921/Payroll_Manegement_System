<?php
session_start();
include('connection.php');

if (isset($_POST['login'])) {
    $id = $_POST['userid'];
    $password = $_POST['password'];

    $query = mysqli_query($conn, "SELECT * FROM employee WHERE emp_id='$id' and emp_pass='$password'");
    $row = mysqli_fetch_array($query);
    $num_row = mysqli_num_rows($query);

    if ($num_row > 0) {
        if ($num_row > 0) {
            $_SESSION['userid'] = $row['emp_id']; // Use the correct column name
            header('location: employee.php');
            exit; // Make sure to exit after the header redirect
        }
        
    } else {
        echo "<p style='text-align: center; color:red;'>Incorrect username or Password</p>";
    }
}
?>

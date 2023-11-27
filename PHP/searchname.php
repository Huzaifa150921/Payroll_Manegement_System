<?php
if(isset($_POST['search'])){
    include 'connection.php';
    $emp_name = mysqli_real_escape_string($conn, $_POST['name']); // Escape the input

    $sql = "SELECT * FROM employee
            JOIN phone ON emp_id = Employee
            JOIN admin ON Admin = admin_id
            WHERE emp_name = '{$emp_name}'"; // Enclose in single quotes

    $result = mysqli_query($conn, $sql) or die("Query Unsuccessful");

    if(mysqli_num_rows($result) > 0) {
        echo "<h2 style='text-align: center; margin-top: 20px;'>Employee Information</h2>";
        echo "<table cellspacing='7px' border='1' width='100%' style='border-collapse: collapse; margin: 20px auto; text-align: center;'>";
        echo "<tr style='background-color: skyblue;'><th>ID</th><th>Name</th><th>DOB</th><th>Address</th><th>Department</th><th>Designation</th><th>Join Date</th><th>Admin Name</th><th>Phone No</th></tr>";

        while($row=mysqli_fetch_assoc($result)){
            echo "<tr><td>{$row['emp_id']}</td><td>{$row['emp_name']}</td><td>{$row['emp_dob']}</td><td>{$row['emp_address']}</td><td>{$row['emp_department']}</td><td>{$row['emp_designation']}</td><td>{$row['emp_joinDate']}</td><td>{$row['Admin_Name']}</td><td>{$row['phone_no']}</td></tr>";
        }

        echo "</table>";
        $buttonStyle = "display: inline-block; padding: 10px 20px; background-color: #007bff; color: white; text-decoration: none; border: none; border-radius: 5px; margin-top: 10px; margin-right: 10px;";
        echo "<div style='text-align: center;'>";
        echo "<a href='../PHP/admin.php' style='{$buttonStyle}'>Home Page</a>";
    } else {
        echo "<p style='text-align: center;'>No record found</p>";
        echo "<script>
        setTimeout(function() {
            window.location.href = 'http://localhost:8080/payroll/PHP/admin.php';
        }, 3000); // 3000 milliseconds = 3 seconds
    </script>";

    echo "<script>
    setTimeout(function() {
        window.location.href = 'http://localhost/payroll/PHP/admin.php';
    }, 3000); // 3000 milliseconds = 3 seconds
    </script>";
    }
    mysqli_close($conn);
}
?>
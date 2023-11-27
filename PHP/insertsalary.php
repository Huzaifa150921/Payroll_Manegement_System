<?php
$doi = $_POST['doi'];
$basicsalary = $_POST['basicsalary'];
$tax = $_POST['tax'];
$bonus = $_POST['bonus'];
$loan = $_POST['loan'];


$emp_id = $_POST['employee']; // Assuming the name attribute of the select field is "employee"

include 'connection.php'; // Include the database connection

// Check if the employee already has a salary entry
$sql = "SELECT * from generate where Employee = '$emp_id'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // Employee already has a salary entry, update the existing record
    $sql1 = "UPDATE salary
                    SET  basic_salary = '$basicsalary',
                        taxes = '$tax', bonus = '$bonus', loan = '$loan'
                    WHERE Employee = '$emp_id'";

    $sql2="UPDATE generate
                     set date_of_issuance ='$doi' where Employee='$emp_id'";
    
    $updategenerateresult= mysqli_query($conn,$sql2) or die("Update generate unsucessfull");
    $updateResult = mysqli_query($conn, $sql1) or die("Update Query Unsuccessful");
    
    if ($updateResult && $updategenerateresult) {
        echo "<p style='text-align: center;'>Salary of Employee ID {$emp_id} Successfully updated</p>"; 
       
        echo "<script>
        setTimeout(function() {
            window.location.href = 'http://localhost:8080/payroll/PHP/displaysalary.php';
        }, 3000); // 3000 milliseconds = 3 seconds
    </script>";

    echo "<script>
    setTimeout(function() {
        window.location.href = 'http://localhost:/payroll/PHP/displaysalary.php';
    }, 3000); // 3000 milliseconds = 3 seconds
    </script>";
    } else {
        echo "<p style='text-align: center;'>No record found</p>";
    }
} else {

$sql2 = "INSERT INTO salary (basic_salary, taxes, bonus, loan) VALUES ('$basicsalary', '$tax', '$bonus', '$loan')";
$result1 = mysqli_query($conn, $sql2);



    $lastSalaryID = mysqli_insert_id($conn);

    $insertgenerate = "INSERT INTO generate (Employee, Salary, date_of_issuance) VALUES ('$emp_id', '$lastSalaryID', '$doi')";
    $result2 = mysqli_query($conn, $insertgenerate);



    if ($result2 &&  $result1 ) {
        echo "<p style='text-align: center;'>Salary added of Employee ID {$emp_id}</p>"; 
      
        echo "<script>
        setTimeout(function() {
            window.location.href = 'http://localhost/payroll/PHP/displaysalary.php';
        }, 3000); // 3000 milliseconds = 3 seconds
    </script>";

    echo "<script>
    setTimeout(function() {
        window.location.href = 'http://localhost:8080/payroll/PHP/displaysalary.php';
    }, 3000); // 3000 milliseconds = 3 seconds
</script>";
    } else {
        echo "<p style='text-align: center;'>No record found</p>";
    }
}

mysqli_close($conn);
?>

<?php
    

$account = $_POST['account'];
$paytime = $_POST['paytime'];
$paydate = $_POST['paydate'];
$s_id = $_POST['salary'];
$emp_id = $_POST['employee']; 

include 'connection.php'; 
$sql = "SELECT pay_id FROM pay WHERE Employee = '$emp_id'";
$result = mysqli_query($conn, $sql) or die("Query Unsuccessful");

if (mysqli_num_rows($result) > 0) {
    // Employee already has a salary entry, update the existing record
    $sql1 = "UPDATE payment
    JOIN pay ON Payment=payment_id
    SET payment.Account = $account
    WHERE pay.Employee = $emp_id;
    
    ";
    $updatepay="UPDATE pay 
    set pay_time='$paytime', pay_date='$paydate'  WHERE Employee = '$emp_id'";
    $updateResult = mysqli_query($conn, $sql1) or die("Update Query Unsuccessful");
    $updateresult1= mysqli_query($conn,$updatepay) or die("Update Query unsuccessfull");
    
    if ($updateResult && $updateresult1 ) {
        echo "<p style='text-align: center;'>Payment of Employee ID {$emp_id} Successfully updated</p>"; 
       
        echo "<script>
        setTimeout(function() {
            window.location.href = 'http://localhost:8080/payroll/PHP/displaypayment.php';
        }, 3000); // 3000 milliseconds = 3 seconds
    </script>";

    echo "<script>av
    setTimeout(function() {
        window.location.href = 'http://localhost/payroll/PHP/displaypayment.php';
    }, 3000); // 3000 milliseconds = 3 seconds
    </script>";
    } else {
        echo "<p style='text-align: center;'>No record found</p>";
    }
} else {
    $sql2 = "INSERT INTO payment (Account)
             VALUES ('$account')";
    $insertpay="INSERT into pay (pay_time,pay_date,Employee,Salary,Payment) values('$paytime','$paydate','$emp_id','$s_id',LAST_INSERT_ID())";
    $insertResult = mysqli_query($conn, $sql2) or die("Insert Query Unsuccessful");
    $insertresult1 = mysqli_query($conn, $insertpay) or die("Insert Query Unsuccessful");
    if ($insertResult && $insertresult1) {
        echo "<p style='text-align: center;'>Payment added of Employee ID {$emp_id}</p>"; 
      
        echo "<script>
        setTimeout(function() {
            window.location.href = 'http://localhost:8080/payroll/PHP/displaypayment.php';
        }, 3000); // 3000 milliseconds = 3 seconds
    </script>";

    echo "<script>
    setTimeout(function() {
        window.location.href = 'http://localhost/payroll/PHP/displaypayment.php';
    }, 3000); // 3000 milliseconds = 3 seconds
</script>";
    } else {
        echo "<p style='text-align: center;'>No record found</p>";
    }
}

mysqli_close($conn);
?>

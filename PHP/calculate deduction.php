<?php
include 'connection.php';

// Sanitize input data
$emp_id = mysqli_real_escape_string($conn, $_POST['employee']);
$attendance_month = mysqli_real_escape_string($conn, $_POST['attendance_month']);
$attendance_year = mysqli_real_escape_string($conn, $_POST['attendance_year']);

// Check if the input values are not empty
if (!empty($emp_id) && !empty($attendance_month) && !empty($attendance_year)) {
    $sql_attendance = "SELECT SUM(Total_Present) AS total_present, SUM(Total_Absents) AS total_absents FROM attendance 
                  WHERE Employee = '$emp_id' AND YEAR(Attendance_Date) = '$attendance_year' AND MONTH(Attendance_Date) = '$attendance_month'";

    $result_attendance = mysqli_query($conn, $sql_attendance);

    if ($result_attendance) {
        if (mysqli_num_rows($result_attendance) > 0) {
            $row_attendance = mysqli_fetch_assoc($result_attendance);
            $total_present = $row_attendance['total_present'];
            $total_absents = $row_attendance['total_absents'];

            $total_days = $total_present + $total_absents;

            if ($total_days > 0) {
                $attendance_percentage = ($total_present / $total_days) * 100;

                if ($attendance_percentage < 70) {
                    $sql_salary = "SELECT basic_salary, bonus, Advance_salery, taxes, loan FROM generate join Salary=s_id 
                                   WHERE Employee = '$emp_id' AND YEAR(date_of_issuance) = '$attendance_year' AND MONTH(date_of_issuance) = '$attendance_month'";

                    $result_salary = mysqli_query($conn, $sql_salary);

                    if ($result_salary) {
                        if (mysqli_num_rows($result_salary) > 0) {
                            $row_salary = mysqli_fetch_assoc($result_salary);
                            $basic_salary = $row_salary['basic_salary'];
                            $bonus = $row_salary['bonus'];
                            $advance_salary = $row_salary['Advance_salery'];
                            $taxes = $row_salary['taxes'];
                            $loan = $row_salary['loan'];

                            $absent_deduction = 0; // Initialize absent deduction
                            $additional_deduction = 0.1 * ($basic_salary ); // 10% additional deduction

                            $total_deduction = $absent_deduction + $additional_deduction;
                            $new_salary =  $bonus/100 + $advance_salary - $taxes/100 - $loan - $total_deduction;

                            // Update the salary table with the new calculated salary
                         $update_sql = "UPDATE Salary
JOIN generate ON Salary = s_id
SET deduction = $total_deduction
WHERE Employee = '$emp_id' AND YEAR(date_of_issuance) = '$attendance_year' AND MONTH(date_of_issuance) = '$attendance_month'";


                            $update_result = mysqli_query($conn, $update_sql);

                            if ($update_result) {
                                echo "<p style='text-align: center; font-size: 18px; color: green;'>
                                    Deduction for Employee ID {$emp_id} in {$attendance_month}/{$attendance_year} updated to: {$total_deduction}
                                </p>";

                                // Redirect to display page after a delay
                                echo "<script>
                                    setTimeout(function() {
                                        window.location.href = 'http://localhost:8080/payroll/PHP/displaysalary.php';
                                    }, 3000);
                                </script>";

                                echo "<script>
                                setTimeout(function() {
                                    window.location.href = 'http://localhost/payroll/PHP/displaysalary.php';
                                }, 3000);
                            </script>";
                            } else {
                                echo "<p style='text-align: center; font-size: 18px; color: red;'>
                                    Failed to update deduction: " . mysqli_error($conn) . "
                                </p>";
                            }
                        } else {
                            echo "<p style='text-align: center; font-size: 18px; color: gray;'>
                                No salary data available for the selected month and year.
                            </p>";
                        }
                    } else {
                        echo "<p style='text-align: center; font-size: 18px; color: red;'>
                            Error in Salary Query: " . mysqli_error($conn) . "
                        </p>";
                    }
                }
            } else {
                echo "<p style='text-align: center; font-size: 18px; color: gray;'>
                    No attendance data available for the selected month and year.
                </p>";
            }
        } else {
            echo "<p style='text-align: center; font-size: 18px; color: gray;'>
                No attendance data available for the selected month and year.
            </p>";
        }
    } else {
        echo "<p style='text-align: center; font-size: 18px; color: red;'>
            Error in Attendance Query: " . mysqli_error($conn) . "
        </p>";
    }
} else {
    echo "<p style='text-align: center; font-size: 18px; color: red;'>
        Please provide valid input values.
    </p>";
}

mysqli_close($conn);
?>

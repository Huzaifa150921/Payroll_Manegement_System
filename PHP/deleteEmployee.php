

    <?php
    if(isset($_POST['delete'])){
        include 'connection.php';
        $emp_id = $_POST['id'];

        $sql = "DELETE FROM employee WHERE emp_id = {$emp_id}";
        $sql1 = "DELETE FROM phone WHERE Employee = {$emp_id}";

        $result = mysqli_query($conn, $sql) or die("Query Unsuccessful");
        $result1 = mysqli_query($conn, $sql1) or die("Query Unsuccessful");

        if($result && $result1) {
            echo "<p style='text-align: center;'>Employee with ID {$emp_id} Successfully deleted</p>"; 
       
            echo "<script>
            setTimeout(function() {
                window.location.href = 'http://localhost/payroll/PHP/displayemp.php';
            }, 3000); // 3000 milliseconds = 3 seconds
        </script>"; 

        echo "<script>
        setTimeout(function() {
            window.location.href = 'http://localhost:8080/payroll/PHP/displayemp.php';
        }, 3000); // 3000 milliseconds = 3 seconds
    </script>"; 
        } else {
            echo "<p style='text-align: center;'>Employee doesn't Exist</p>";
            echo "<script>
            setTimeout(function() {
                window.location.href = 'http://localhost/payroll/PHP/displayemp.php';
            }, 3000); // 3000 milliseconds = 3 seconds
        </script>"; 

        echo "<script>
        setTimeout(function() {
            window.location.href = 'http://localhost:8080/payroll/PHP/displayemp.php';
        }, 3000); // 3000 milliseconds = 3 seconds
    </script>"; 
        }
        mysqli_close($conn);
    }
    ?>


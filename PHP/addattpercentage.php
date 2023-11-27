<html>

<head>
<link rel="stylesheet" type="text/css" href="../CSS/loginattper.css">
  <link rel="stylesheet" href="../CSS/loginnav.css">
</head>

<body>
<nav>

<label class="logo"> <a href="admin.php" id="loginpay">Pay Roll</a></label>
<ul>


  <li><a href="logout.php">Log Out</a></li>
</ul>
</nav>



<div class="box">
<span class="borderline"></span>

<form action="calculate attpercentage.php" method="post">
 
<h2>Calculate Attendance</h2>
        <div class="inputbox">
            <select name="employee" id="employeeSelect" required>
                <option value="">Select</option>
                <?php
                include 'connection.php';
                $sql = "SELECT emp_id, emp_name FROM employee";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='{$row['emp_id']}'>{$row['emp_id']} {$row['emp_name']}</option>";
                }
                ?>
            </select>
            <span>Employee ID</span>
        </div>




  <label for="attendance_month"></label>
  <div class="inputbox">
    <input type="number" name="attendance_month" required>
    <span>Attendance Month</span>
    <i></i>
  </div>

  <label for="attendance_year"></label>
  <div class="inputbox">
    <input type="number" name="attendance_year" required>
    <span>Attendance Year</span>
    <i></i>
  </div>







  <a href="#" id="submitlnk"> <input type="submit" value="Submit"></a>
</form>
</div>


</body>
</html>
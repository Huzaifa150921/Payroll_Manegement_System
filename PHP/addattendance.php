<html>

<head>
<link rel="stylesheet" type="text/css" href="../CSS/loginatt.css">
  <link rel="stylesheet" href="../CSS/loginnav.css">
</head>

<body>
<nav>

<label class="logo"> <a href="admin.php" id="loginpay">Pay Roll</a></label>
<ul>

  <li><a href="../PHP/logout.php">Log Out</a></li>
</ul>
</nav>



<div class="box">
<span class="borderline"></span>

<form action="insertattandence.php" method="post">
 
<h2>Add Attendance</h2>
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


<div class="inputbox">
    <select name="salary" id="salarySelect" required>
        <option value="">Select</option>
    </select>
    <span>Salary ID</span>
</div>
        <script>
    const employeeSelect = document.getElementById('employeeSelect');
    const salarySelect = document.getElementById('salarySelect');

    employeeSelect.addEventListener('change', function () {
        const selectedEmployeeId = this.value;

        if (selectedEmployeeId !== '') {
            fetch(`salarydropdown.php?employee=${selectedEmployeeId}`)
                .then(response => response.json())
                .then(options => {
                    salarySelect.innerHTML = '';
                    options.forEach(option => {
                        const optionElement = document.createElement('option');
                        optionElement.value = option.s_id;
                        optionElement.textContent = `${option.emp_id} ${option.emp_name}`;
                        salarySelect.appendChild(optionElement);
                    });
                })
                .catch(error => console.error('Error fetching salary options:', error));
        } else {
            salarySelect.innerHTML = '<option value="">Select</option>';
        }
    });
</script>



  <label for="doa"></label>
  <div class="inputbox">
   
    <input type="date" name="doa" required>
    <span>Attendance Date</span>
    <i></i>
    
  </div>

  <label for="timein"></label>
  <div class="inputbox">
    <input type="time" name="timein" required>
    <span>Time In</span>
    <i></i>
  </div>

  <label for="timeout"></label>
  <div class="inputbox">
    <input type="time" name="timeout" required>
    <span>Time Out</span>
    <i></i>
  </div>

<label for="absent"></label>
<div class="inputbox">
  <input type="number" name="absent" required>
  <span>Total Absents</span>
  <i></i>
</div>

<label for="present"></label>
  <div class="inputbox">
    <input type="number" name="present" required>
    <span>Total Presents</span>
    <i></i>
</div>





  <a href="#" id="submitlnk"> <input type="submit" value="Submit"></a>
</form>
</div>


</body>
</html>
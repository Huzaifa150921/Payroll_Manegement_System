<html>

<head>
<link rel="stylesheet" type="text/css" href="../CSS/loginpay.css">
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

<form action="insertpayment.php" method="post">
 
<h2>Add Payment</h2>
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



  <label for="account"></label>
  <div class="inputbox">
   
    <input type="number" name="account" required>
    <span>Account</span>
    <i></i>
    
  </div>

  <label for="paytime"></label>
  <div class="inputbox">
    <input type="time" name="paytime" required>
    <span>Pay Time</span>
    <i></i>
  </div>

  <label for="paydate"></label>
  <div class="inputbox">
    <input type="date" name="paydate" required>
    <span>Pay Date</span>
    <i></i>
  </div>



  <a href="#" id="submitlnk"> <input type="submit" value="Submit"></a>
</form>
</div>


</body>
</html>
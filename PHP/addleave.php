
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

<form action="insertleave.php" method="post">
 
<h2>Request Leave</h2>
        <div class="inputbox">
            <select name="employee" id="employeeSelect" required>
                <option value="">Select</option>
                <?php
                session_start();
                include 'connection.php';
                $sql = "SELECT emp_id, emp_name FROM employee ";
                $result = mysqli_query($conn, $sql);
              
                  echo "<option value='" . $_SESSION['userid'] . "'>" . $_SESSION['userid'] . "</option>";
                
                ?>
            </select>
            <span>Employee ID</span>
        </div>


<div class="inputbox">
    <select name="attendance" id="att" required>
        <option value="">Select</option>
    </select>
    <span>Attendance ID</span>
</div>
        <script>
    const employeeSelect = document.getElementById('employeeSelect');
    const attSelect = document.getElementById('att');

    employeeSelect.addEventListener('change', function () {
        const selectedEmployeeId = this.value;

        if (selectedEmployeeId !== '') {
            fetch(`attdropdown.php?employee=${selectedEmployeeId}`)
                .then(response => response.json())
                .then(options => {
                    attSelect.innerHTML = '';
                    options.forEach(option => {
                        const optionElement = document.createElement('option');
                        optionElement.value = option.A_id;
                        optionElement.textContent = `${option.emp_id} ${option.emp_name}`;
                        attSelect.appendChild(optionElement);
                    });
                })
                .catch(error => console.error('Error fetching salary options:', error));
        } else {
            attSelect.innerHTML = '<option value="">Select</option>';
        }
    });
</script>



  <label for="dol"></label>
  <div class="inputbox">
   
    <input type="date" name="dol" required>
    <span>Date of Leave</span>
    <i></i>
    
  </div>

  <label for="nol"></label>
  <div class="inputbox">
    <input type="number" name="nol" required>
    <span>No of Leaves</span>
    <i></i>
  </div>

  <label for="type"></label>
  <div class="inputbox">
    <input type="text" name="type" required>
    <span>Type of Leave</span>
    <i></i>
  </div>



  <a href="#" id="submitlnk"> <input type="submit" value="Request"></a>
</form>
</div>


</body>
</html>
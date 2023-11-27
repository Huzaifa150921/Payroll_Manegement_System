<html>

<head>
<link rel="stylesheet" type="text/css" href="../CSS/loginallow.css">
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

<form action="insertallowance.php" method="post">
 
<h2>Add Allowance</h2>


<div class="inputbox">
            <select name="admin" id="" required>
                <option value="">Select</option>
                <?php
                include 'connection.php';
                $sql = "SELECT admin_id, admin_name FROM admin";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='{$row['admin_id']}'>{$row['admin_id']} {$row['admin_name']}</option>";
                }
                ?>
            </select>
            <span>Admin ID</span>
        </div>


        <div class="inputbox">
            <select name="employee" id="" required>
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

  <label for="amount"></label>
  <div class="inputbox">
   
    <input type="number" name="amount" required>
    <span>Amount of Allowances</span>
    <i></i>
    
  </div>

  <div class="inputbox">
    <select name="type" required>
        <option value="">Select</option>
        <option value="Rental Allowance">Rental Allowance</option>
        <option value="Travel Allowance">Travel Allowance</option>
        <option value="Medical Allowance">Medical Allowance</option>
    </select>
    <span>Type of Allowances</span>
</div>


  <a href="#" id="submitlnk"> <input type="submit" value="Submit"></a>
</form>
</div>


</body>
</html>
<html>

<head>
<link rel="stylesheet" type="text/css" href="../CSS/loginsalary.css">
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

<form action="../PHP/insertsalary.php" method="post">
 
<h2>Add Salary</h2>
<div class="inputbox">
<select name="employee" id="" required>
            <option value="">Select</option>
            <?php
                  include 'connection.php';
                    $sql="select emp_id,emp_name from employee";
                    $result=mysqli_query($conn,$sql);
                    while($row=mysqli_fetch_assoc($result)){
                ?>
            <option value="<?php echo $row['emp_id']; ?>" > <?php echo $row['emp_id'].' '. $row['emp_name'];?>   </option>
            <?php } 
            ?>
       </select>
       
       <span>Employee ID</span>
      
                    </div>

  <label for="doi"></label>
  <div class="inputbox">
   
    <input type="date" name="doi" required>
    <span>Issuance Date</span>
    <i></i>
    
  </div>

  <label for="basicsalary"></label>
  <div class="inputbox">
    <input type="number" name="basicsalary" required>
    <span>Basic Salary</span>
    <i></i>
  </div>

  <label for="tax"></label>
  <div class="inputbox">
    <input type="number" name="tax" required>
    <span>Tax %</span>
    <i></i>
</div>

<label for="bonus"></label>
<div class="inputbox">
  <input type="number" name="bonus" required>
  <span>Bonus %</span>
  <i></i>
</div>

<label for="loan"></label>
  <div class="inputbox">
    <input type="number" name="loan" required>
    <span>Loan</span>
    <i></i>
</div>











  <a href="#" id="submitlnk"> <input type="submit" value="Submit"></a>
</form>
</div>


</body>
</html>
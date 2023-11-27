<html>

<head>
<link rel="stylesheet" type="text/css" href="../CSS/loginemp.css">
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
<form action="insertemp.php" method="POST">
 
<h2>Add Employee</h2>
  <label for="name"></label>
  <div class="inputbox">
    <input type="text" name="name" required>
    <span>Name</span>
    <i></i>
  </div>



  <label for="pass"></label>
  <div class="inputbox">
    <input type="password" name="pass" required>
    <span>Password</span>
    <i></i>
  </div>

  <label for="dob"></label>
  <div class="inputbox">
    <input type="date" name="dob" required>
    <span>Date of Birth</span>
    <i></i>
  </div>

  <label for="address"></label>
  <div class="inputbox">
    <input type="text" name="address" required>
    <span>Address</span>
    <i></i>
</div>



<label for="joindate"></label>
  <div class="inputbox">
    <input type="date" name="joindate" required>
    <span>Date of Joining</span>
    <i></i>
</div>


<label for="designation"></label>
<div class="inputbox">
  <input type="text" name="designation" required>
  <span>Designation</span>
  <i></i>
</div>


<label for="department"></label>
<div class="inputbox">
  <input type="text" name="department" required>
  <span>Deparment</span>
  <i></i>
</div>


<label for="phone"></label>
<div class="inputbox">
 
  <input type="text" name="phone" required>
  <span>Phone</span>
  <i></i>
</div>


  <a href="#" id="submitlnk"> <input type="submit" value="Submit" formtarget="_SELF"></a>
</form>
</div>


</body>
</html>


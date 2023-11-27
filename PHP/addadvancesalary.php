<html>

<head>
<link rel="stylesheet" type="text/css" href="../CSS/loginadvance.css">
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

<form action="insertadvance.php" method="post">
 
<h2>Request Advance Salary</h2>


  <label for="advance"></label>
  <div class="inputbox">
   
    <input type="number" name="advance" required>
    <span>Amount</span>
    <i></i>
    
  </div>




  <a href="#" id="submitlnk"> <input type="submit" value="Request"></a>
</form>
</div>


</body>
</html>
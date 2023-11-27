<!DOCTYPE html>
<html>
<head>
  <title>Delete Employee</title>
  <link rel="stylesheet" type="text/css" href="../CSS/login.css">
  <link rel="stylesheet" href="../CSS/loginnav.css">
</head>
<body>
    <nav>
       <label class="logo"> <a href="../HTML/index.html" id="loginpay">Pay Roll</a></label>
        <ul>
            <li><a href="../HTML/teamp.html">Teams</a></li>
            <li><a href="../HTML/contact.html">Contact Us</a></li>
            <li><a href="logout.php">Log Out</a></li>
        </ul>
    </nav>
    <div class="box">
        <span class="borderline"></span>
        <form action="../PHP/deleteEmployee.php" method="post">
            <h2>Delete Employee</h2>
            <div class="inputbox">
                <input type="text" name="id" required>
                <span>ID</span>
                <i></i>
            </div>
            <input type="submit" value="Submit" name="delete" formtarget="_SELF">
        </form>
    </div>
</body>
</html>

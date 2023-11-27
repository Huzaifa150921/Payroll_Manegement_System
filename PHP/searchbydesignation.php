<!DOCTYPE html>
<html>
<head>
  <title>Search Employee by Designation</title>
  <link rel="stylesheet" type="text/css" href="../CSS/login.css">
  <link rel="stylesheet" href="../CSS/loginnav.css">
</head>
<body>
    <nav>
       <label class="logo"> <a href="../PHP/admiin.php" id="loginpay">Pay Roll</a></label>
        <ul>
          
            <li><a href="logout.php">Log Out</a></li>
        </ul>
    </nav>
    <div class="box">
        <span class="borderline"></span>
        <form action="../PHP/searchdesignation.php" method="post">
            <h2 style="text-align: center;">Search By Designation</h2>
            <div class="inputbox" style="text-align: center;">
                <input type="text" name="designation" required>
                <span>Designation</span>
                <i></i>
            </div>
            <div style="text-align: center; margin-top: 10px;">
                <input type="submit" value="Search" name="search" formtarget="_SELF">
            </div>
        </form>
    </div>
</body>
</html>

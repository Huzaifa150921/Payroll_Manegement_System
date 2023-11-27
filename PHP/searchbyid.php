
<!DOCTYPE html>
<html>
<head>
  <title>Search Employee by ID</title>
  <link rel="stylesheet" type="text/css" href="../CSS/login.css">
  <link rel="stylesheet" href="../CSS/loginnav.css">
</head>
<body>
    <nav>
       <label class="logo"> <a href="../PHP/admin.php" id="loginpay">Pay Roll</a></label>
        <ul>
          
            <li><a href="logout.php">Log Out</a></li>
        </ul>
    </nav>
    <div class="box">
        <span class="borderline"></span>
        <form action="../PHP/searchid.php" method="post">
            <h2>Search By ID</h2>
            <div class="inputbox">
                <input type="number" name="id" required>
                <span>ID</span>
                <i></i>
            </div>
            <input type="submit" value="Submit" name="search" formtarget="_SELF">
        </form>
    </div>
</body>
</html>

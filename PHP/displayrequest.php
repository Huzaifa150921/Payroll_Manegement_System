<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
        background:linear-gradient(#93A5CF ,#E4EfE9);
        background-repeat: no-repeat;
        min-height:96.1vh;
        }
    </style>
</head>
<body>
    
</body>
</html>

<?php
session_start();
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['request_id']) && isset($_POST['response'])) {
        $requestId = $_POST['request_id'];
        $response = $_POST['response'];

        // Update admin response in the database
        $sql = "UPDATE advance_salary_requests SET admin_response = ? WHERE id = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "si", $response, $requestId);

        if (mysqli_stmt_execute($stmt)) {
            echo "<p style='text-align: center; color:green;'>Response saved successfully.</p>";
        }
        if ($response === 'Approved') {
            $insertSql = "UPDATE salary
            SET Advance_salery = (
                SELECT amount 
                FROM advance_salary_requests 
                WHERE id = ?
            )";
            $insertStmt = mysqli_prepare($conn, $insertSql);
            mysqli_stmt_bind_param($insertStmt, "i", $requestId);
            
            // Execute the insert statement
            if (mysqli_stmt_execute($insertStmt)) {
                echo "<p style='text-align: center; color:green;'>Data inserted into salary table.</p>";
            } else {
                echo "<p style='text-align: center; color:red;'>Error inserting data into salary table.</p>";
            }
            
            mysqli_stmt_close($insertStmt);
        } else {
            echo "<p style='text-align: center; color:red;'>Error saving response.</p>";
        }

        mysqli_stmt_close($stmt);
       
    }
}

// Fetch advance salary requests
$requestsResult = mysqli_query($conn, "SELECT * FROM advance_salary_requests") or die("Query Unsuccessful");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Advance Salary Requests</title>
    <style>
      body {
            background: linear-gradient(#93A5CF, #E4EfE9);
            background-repeat: no-repeat;
            min-height: 96.1vh;
            text-align: center; 
            font-family: Arial, sans-serif; 
        }

        table {
            width: 80%; 
            margin: 0 auto; 
            background-color: #FFFFFF; 
            border-collapse: collapse;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); 
        }

        table, th, td {
            border: 2px solid black; 
        }

        th, td {
            padding: 10px; 
            text-align: center; 
        }

        a {
            text-decoration: none; 
            color: #0066cc; 
            background-color: #f2f2f2; 
            padding: 6px 12px; 
            margin: 5px; 
            border-radius: 4px; 
            transition: background-color 0.3s ease; 
            display: inline-block; 
        }

        a:hover {
            background-color: #ff9900; 
            color: #FFFFFF; 
        }
    </style>
</head>
<body>
    <h1>Advance Salary Requests</h1>
    <table border="1">
        <tr>
            <th>Request ID</th>
            <th>Employee ID</th>
            <th>Amount</th>
            <th>Admin Response</th>
            <th>Action</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($requestsResult)) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['employee_id']; ?></td>
                <td><?php echo $row['amount']; ?></td>
                <td><?php echo $row['admin_response']; ?></td>
                <td>
                    <?php if ($row['admin_response'] === 'Pending') { ?>
                        <form method="post" action="">
                            <input type="hidden" name="request_id" value="<?php echo $row['id']; ?>">
                            <select name="response">
                                <option value="Pending">Pending</option>
                                <option value="Approved">Approved</option>
                                <option value="Rejected">Rejected</option>
                            </select>
                            <button type="submit">Save</button>
                        </form>
                    <?php } else { ?>
                        Response submitted
                    <?php } ?>
                </td>
            </tr>
        <?php } ?>
    </table>
    <a href="admin.php">Back to Home</a>
</body>
</html>

<?php
include 'connection.php';

// Get values from the form using $_POST
$name = mysqli_real_escape_string($conn, $_POST['name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);

// Enclose string values in single quotes
$name = "'" . $name . "'";
$email = "'" . $email . "'";

// Construct the SQL query
$sql = "INSERT INTO contact (name, email) VALUES ($name, $email)";

// Execute the query
if (mysqli_query($conn, $sql)) {
    echo "<p style='text-align:center; '>Your response has been successfully recorded.</p>";

} else {
    echo "Error: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>

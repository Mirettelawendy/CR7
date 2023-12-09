<?php
// Establish a database connection
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'habak';  

$conn = mysqli_connect($host, $username, $password, $dbname);
if (mysqli_connect_errno()) {
    die("Failed to connect to database: " . mysqli_connect_error());
}

// Retrieve the email and password values from the form submission
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

// Query the database to check if the user exists and the password is correct
$query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) == 1) {
    // If login is successful, redirect to the success page
    header('Location: index.html');
    exit;
} else {
    // If login fails, show an error message
    echo "Invalid email or password.";
}

// Close the database connection
mysqli_close($conn);
?>

<?php
// Establish a connection to the database
$servername = "127.0.0.1";  // Replace with your database server name
$username = "root";         // Replace with your database username
$password = "";             // Replace with your database password
$dbname = "contact";        // Replace with your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user input
    $name = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['name']), ENT_QUOTES, 'UTF-8');
    $email = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['email']), ENT_QUOTES, 'UTF-8');
    $message = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['message']), ENT_QUOTES, 'UTF-8');

    // Further processing and handling of the form data...
    // For example, you can send an email, store data in a database, etc.
    // Make sure to implement any necessary validation and business logic.

    // Insert data into the database
    $sql = "INSERT INTO contact_messages (name, email, message) VALUES ('$name', '$email', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "Message sent successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>

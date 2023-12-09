<?php
// Establish a connection to the database
$servername = "127.0.0.1";  // Replace with your database server name
$username = "root";         // Replace with your database username
$password = "";             // Replace with your database password
$dbname = "your_database";  // Replace with your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize user input
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Example validation for username
    if (!preg_match("/^[a-zA-Z0-9_]+$/", $username)) {
        // Invalid username format
        echo "Invalid username format.";
        // Handle the error appropriately, e.g., redirect to the login page with an error message
        exit();
    }

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($userId, $dbUsername, $dbPasswordHash);
        $stmt->fetch();

        // Verify the password using password_verify
        if (password_verify($password, $dbPasswordHash)) {
            // Password is correct, login successful
            session_start();
            $_SESSION['user_id'] = $userId;
            $_SESSION['username'] = $dbUsername;
            header("Location: dashboard.php"); // Redirect to a secure page after login
            exit();
        } else {
            // Invalid password
            echo "Invalid username or password.";
        }
    } else {
        // User not found
        echo "Invalid username or password.";
    }

    $stmt->close();
}

// Close the database connection
$conn->close();
?>

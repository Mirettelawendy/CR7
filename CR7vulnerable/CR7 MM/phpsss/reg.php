<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, intial-scale=1.0">
<title>Registration</title>
</head>

<body>
<h1> Registration </h1>
<form class="" ></form>
<a href="logout.php">logout</a>

</body>
<?php
// Get form data
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

// Connect to database
$conn = mysqli_connect('localhost', 'username', 'password', 'database_name');
if (!$conn) {
  die('Connection failed: ' . mysqli_connect_error());
}

// Insert user data into database
$sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
if (mysqli_query($conn, $sql)) {
  // If registration is successful, redirect to success page
  header('Location: logg.html');
  exit;
} else {
  // If registration fails, show an error message
  echo 'Registration failed. Please try again later.';
}

mysqli_close($conn);
?>
<?php  
 require 'config.php';
 if(isset($_POST["sub"])){
  $name = $_POST["name"]
  $email = $_POST["name"]
  $password = $_POST["password"]
  $duplicate = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username' OR email = '$email'");
  if(mysqli_num_rows($duplicate) > 0){
    echo
    "<script>alert(Email Has Already Taken); </script>"; 
 }
 else{
  if ($password){
    $query = "INSERT INTO tb_user VALUES('','$name',' $email','$password')";
    mysqli_query($conn,$query);
    echo
    "<script>alert(Registration Succesful ); </script>";
  }
  else{
    echo
    "<script>alert(Registration Succesful ); </script>";
  }
 }
}
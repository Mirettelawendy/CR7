<?php
	$name = $_POST['name'];
	$email = $_POST['email'];
	$subject = $_POST['subject'];
    $message = $_POST['message'];


	// Database connection
	$conn = new mysqli('localhost','root','','contact');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into order(name, email, subject, message) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssi", $name, $email, $subject, $message);
		$execval = $stmt->execute();
		echo $execval;
		echo "ordered successfully...";
		$stmt->close();
		$conn->close();
	}
?>
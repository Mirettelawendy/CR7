<?php
session_start();
include "db_conn.php";

if (isset($_POST['uname']) && isset($_POST['password']) && (isset($_POST['name']) 
   && isset($_POST['re_password']))) {
    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $uname = validate($_POST['uname']);
    $password = validate($_POST['password']);
    $re_password = validate($_POST['re-password']);
    $name = validate($_POST['name']);
    $user_data = 'uname'. $unmae. '&name='. $name; 
    echo $user_data;

    if (empty($uname)) { 
        header("Location: signup.php?error=Username is required&$user_data");
        exit();
    } else if (empty($password)) {
        header("Location: signup.php?error=Password is required&$user_data");
        exit();
    } 
    else if (empty($re_password)) {
        header("Location: signup.php?error=Re Password is required&$user_data");
        exit();
    }
    else if (empty($name)) {
        header("Location: signup.php?error=Name is required&$ userdata");
        exit();
    }
    else if (empty($password !==$re_password)) {
        header("Location: signup.php?error=The confirmation password doesnt match&$user_data");
        exit();
    }
    else {
        $sql = "SELECT * FROM users WHERE username='$uname' AND password='$password'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['username'] === $uname && $row['password'] === $password) {
                $_SESSION['username'] = $row['username'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['id'] = $row['id'];
                header("Location: home.php");
                exit();
            }
        } else {
            header("Location: signup.php?error=Incorrect Username or Password");
            exit();
        }
    }
} else {
    header("Location: signup.php");
    exit();
}

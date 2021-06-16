<?php
session_start();
include_once "../db.php";
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

if (!empty($email) && !empty($password)) {
    //checking of user datas
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}' AND password = '{$password}'");
    if (mysqli_num_rows($sql) > 0) {
     $row = mysqli_fetch_assoc($sql);
     $_SESSION['success'] = "Login is successful";
   header('Location: ../dashboard.php');
    } else {
        $_SESSION['failure'] = "Login is not Successful";
        echo "Email or Password is Incorrect";
    }
} else {
    echo "All input field are required";
}


?>
 
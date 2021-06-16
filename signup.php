<?php
session_start();
include_once "../db.php";

$fname = mysqli_real_escape_string($conn, $_POST['fname']);
$lname = mysqli_real_escape_string($conn, $_POST['lname']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

if (!empty($fname) && !empty($lname) && !empty($email) && !empty($password)) {
//check if email is valid
if (filter_var($email, FILTER_VALIDATE_EMAIL)){
 //checking if email already exist
 $sql = mysqli_query($conn, "SELECT email FROM users WHERE email = '{$email}'");
 if (mysqli_num_rows($sql) > 0) {
     //if email already exist
 
     echo "$email - this email already exist !!!";
 } else{
     //lets check user upload file or not
    if ($sql2) {
        //if these data inserted 
      
        $sql3 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
        if(mysqli_num_rows($sql3) > 0){
            $row= mysqli_fetch_assoc($sql3);
            $_SESSION['unique_id'] = $row['unique_id'];
            echo "Success";
        }
    }else {
        echo "something went wrong";
    } }
        
        
         }else {
             echo "Please select an image file - jpeg, jpg, png!";
         }
     } else {
         echo "Please Select an image file";
     }
 }
}else {
   echo "$email - This is not a valid email address !";
}
} else {
    echo "All inputs is required";
}

<?php

$uname1 = $_POST['username2'];
$email  = $_POST['email2'];
$upswd1 = $_POST['name2'];
$upswd2 = $_POST['password2'];
$upswd2 = $_POST['repassword2'];




if (!empty($username2) || !empty($email2) || !empty($name2) || !empty($password2) || !empty($repassword2))
{

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "login";



// Create connection
$conn = new mysqli ($host, $username, $password, $name);

if (mysqli_connect_error()){
  die('Connect Error ('. mysqli_connect_errno() .') '
    . mysqli_connect_error());
}
else{
  $SELECT = "SELECT email2 From register account Where email2 = ? Limit 1";
  $INSERT = "INSERT Into register account (username2 , email2 ,name2, password2, repassword2 )values(?,?,?,?)";

//Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $email2);
     $stmt->execute();
     $stmt->bind_result($email2);
     $stmt->store_result();
     $rnum = $stmt->num_rows;

     //checking username
      if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("ssss", $username2,$email2,$name2,$password2,$repassword2);
      $stmt->execute();
      echo "New record inserted sucessfully";
     } else {
      echo "Someone already register using this email";
     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All field are required";
 die();
}
?>
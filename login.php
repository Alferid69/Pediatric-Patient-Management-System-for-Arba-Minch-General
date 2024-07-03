<?php
include("connection.php");

$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM doctor where username = '$username' AND password='$password'";
$result = $conn->query($query);

$query2 = "SELECT * FROM receptionist where username = '$username' AND password='$password'";
$result2 = $conn->query($query2);

$query3 = "SELECT * FROM nurse where user_name = '$username' AND password='$password'";
$result3 = $conn->query($query3);

if($result->num_rows > 0){
  header("Location: home.php");
  $_SESSION['status'] = "";
}

elseif($result2->num_rows > 0){
  header("Location: patient_register.php");
  $_SESSION['status']="";
}

elseif($result3->num_rows > 0){
  header("Location: nurse_interface.php");
  $_SESSION['status']="";
}

else{
  $_SESSION['status'] = "SORRY WRONG PASSWORD OR USERNAME";
  header("Location: index.php");
}

?>
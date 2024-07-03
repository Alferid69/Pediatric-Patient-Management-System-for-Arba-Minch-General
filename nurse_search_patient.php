<?php
include("connection.php");


$_SESSION['Medical_Record_No'] = $_POST['medical_record_number'];
$medno = $_SESSION['Medical_Record_No'];

$query = "SELECT * FROM patient_info where Medical_Record_No = '$medno'";

$result = $conn->query($query);

if($result->num_rows > 0){
  header("Location: patient_result_nurse.php");
  $_SESSION['status'] = "";
}
else{
  $_SESSION['status'] = "Please register first.";
  header("Location: home.php");
}

?>
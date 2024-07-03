<?php
include("connection.php");
$facultyname = $_POST['faculty'];
$medical_record = $_POST['medical_record'];
$date_of_registration = $_POST['date_of_registration'];
$patient_name = $_POST['patient_name'];
$sex = $_POST['sex'];
$date_of_birth = $_POST['date_of_birth'];
$age = $_POST['age'];
$region = $_POST['region'];
$subcity = $_POST['subcity'];
$ketena = $_POST['ketena'];
$kebele = $_POST['kebele'];
$phone_number = $_POST['phone_number'];

$query = "INSERT INTO patient_info
(patient_ID, Faculty_Name, Medical_Record_No, Registration_Date, Full_Name, Sex, Birth_Date, Age, Region, Subcity, Ketena, Kebele, Phone_No) 
VALUES (DEFAULT,'$facultyname','$medical_record','$date_of_registration','$patient_name','$sex',
'$date_of_birth','$age','$region','$subcity','$ketena','$kebele','$phone_number')";



if($conn->query($query) == TRUE){
  header("Location: patient_register.php");
  $_SESSION['status'] = "Registered successfully";
}
else{
  header("Location: patient_register.php");
  $_SESSION['status'] = "Registeration Failed";
}
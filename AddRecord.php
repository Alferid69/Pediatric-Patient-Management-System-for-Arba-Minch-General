<?php
include("connection.php");

$patient_ID = $_POST['patient_ID'];
$symptoms = $_POST['symptoms'];
$diagnosis = $_POST['diagnosis'];
$prescription = $_POST['prescription'];
$last_visit_date = $_POST['last_visit_date'];
$disease_ID = intval($_POST['disease_ID']);

$query = "INSERT INTO disease (disease_ID, symptoms, Diagnosis, prescription, p_ID)
VALUES('$disease_ID', '$symptoms', '$diagnosis', '$prescription','$patient_ID')";
$conn->query($query);
$query = "INSERT INTO visitation_day (visited_date, pat_ID, dis_ID)
  VALUES('$last_visit_date', '$patient_ID', '$disease_ID');";
$conn->query($query);
header("Location: patient_result.php");
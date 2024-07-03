<?php
session_start();
$conn = new mysqli("localhost", "root", "", "patient");

if(!$conn){
  echo "error connecting";
}
  
?>
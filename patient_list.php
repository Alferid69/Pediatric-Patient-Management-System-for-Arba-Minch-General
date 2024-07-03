<?php
include("connection.php");
$name = strtolower($_POST['name']);

$patientids = array();
$patientnames = array();
$medicalnumbers = array();
$phonenumbers = array();
$number_of_records = 0;
$query = "SELECT Full_Name, patient_ID, Medical_Record_No, Phone_No FROM patient_info where LOWER(Full_Name) = '$name';";
$result = $conn->query($query);
if($result->num_rows > 0){
  while($rows = $result->fetch_assoc()){
    $patientids[] = $rows['patient_ID'];
    $patientnames[] = $rows['Full_Name'];
    $medicalnumbers[] = $rows['Medical_Record_No'];
    $phonenumbers[] = $rows['Phone_No'];
    $number_of_records++;
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patients List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
      <h2>Patients List</h2>
      <table class="table table-bordered table-striped table-hover table-dark mt-3">
        <thead>
          <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Medical Number</th>
              <th>Phone Number</th>
          </tr>
        </thead>
        <?php
          for($i = 0; $i < $number_of_records; $i++){
            ?><tbody>
                <tr>
                    <td><?php echo $patientids[$i] ?></td>
                    <td><?php echo $patientnames[$i] ?></td>
                    <td><?php echo $medicalnumbers[$i] ?></td>
                    <td><?php echo $phonenumbers[$i] ?></td>
                </tr>
              </tbody><?php
          }
        ?>
        
      </table>
  </div>
</body>
</html>

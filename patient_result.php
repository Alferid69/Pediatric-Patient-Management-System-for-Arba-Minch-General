<?php
include("connection.php");

$medno = $_SESSION['Medical_Record_No'];
$random = rand(0, 2147483647);

$query = "SELECT * FROM patient_info where Medical_Record_No = '$medno'";
$userid = "";
$result = $conn->query($query);

if($result->num_rows > 0){
  while($rows = $result->fetch_assoc()){
    $userid = $rows['patient_ID'];
  }
  
  $query = "SELECT symptoms, Diagnosis, prescription, Full_Name, Sex, Age, Medical_Record_No, visited_date
  FROM disease
  JOIN patient_info ON p_ID = patient_ID
  AND Medical_Record_No = '$medno'
  JOIN visitation_day ON pat_ID = patient_ID AND dis_ID = disease_ID";
  $result = $conn->query($query);
  if($result->num_rows > 0){
      $symptoms = array();
      $Diagnosis =array();
      $prescription =array();
      $patient_name = array();
      $sex = array();
      $age = array();
      $medical_record_number = array();
      $visited_day = array();
    while($rows = $result->fetch_assoc()){
      $symptoms[] = $rows['symptoms'];
      $Diagnosis[] = $rows['Diagnosis'];
      $prescription[] = $rows['prescription'];
      $patient_name[] = $rows['Full_Name'];
      $sex[] = $rows['Sex'];
      $age[] = $rows['Age'];
      $medical_record_number[] = $rows['Medical_Record_No'];
      $visited_day[] = $rows['visited_date'];
    }
    $div_numbers = count($patient_name);
  }
  else{?>
    <div class="card" id="add-record-section" style=
  "background-color: lightblue;
  position: fixed;
  height: 100vh;
  top: 10%;
  width: 80%;
  left: 10%;

  ";
  >
    <h2 class="card-title text-center mb-5">Add New Patient Record</h2>
    <form action="AddRecord.php" method="post">
      <div class="form-group mb-2">
        <input
          type="hidden"
          class="form-control"
          placeholder="Disease ID"
          name="disease_ID"
          value="<?php echo $random?>"
          readonly
          required
        />
      </div>
      <div class="form-group mb-2">
        <input
          type="hidden"
          class="form-control"
          placeholder="Medical Record Number"
          name="patient_ID"
          value="<?php echo $userid?>"
          readonly
          required
        />
      </div>
      <div class="form-group mb-2">
        <textarea
          class="form-control"
          placeholder="Symptoms"
          name="symptoms"
          rows="3"
          required
        ></textarea>
      </div>
      <div class="form-group mb-2">
        <textarea
          class="form-control"
          placeholder="Diagnosis"
          name="diagnosis"
          rows="3"
          required
        ></textarea>
      </div>
      <div class="form-group mb-2">
        <textarea
          class="form-control"
          placeholder="Prescription"
          name="prescription"
          rows="3"
          required
        ></textarea>
      </div>
      <div class="form-group mb-2">
        <label for="last_visit_date">Visitation Day</label>
        <input
          type="date" 
          class="form-control" 
          name = "last_visit_date"
          id="last_visit_date" 
          required
        ></input>
      </div>
      <div class="text-center">
        <button class="btn btn-primary" type="submit">Add Record</button>
      </div>
    </form><?php
  }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Patient Search Result</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="patient_result.css">
</head>
<body>
  <header class="header" style=
    "position: fixed;
    top: 0;
    display: flex;
    align-items: center;
    justify-content: space-evenly;
    height: 60px;
    width: 100%;
    background-color: lightgreen;
    z-index: 2;">
    <button class="btn btn-primary" id="newrec">Add New Patient Record</button>
    <ul class="nav navbar-nav navbar-right">
              <li>
                  <form action="logout.php" method="post">
                      <button type="submit" class="btn btn-danger">Logout</button>
                  </form>
              </li>
          </ul>
  </header>
  <div class="container" style="margin-top: 80px;">
    <?php
    for($i=0; $i < $div_numbers; $i++){
      ?>
      <div class="card">
      <h1 class="card-title text-center mb-5">Patient Record <?php echo $i+1;?></h1>
      <div class="result-info">
        <p class="result-label">Patient Name:</p>
        <p class="result-value"><?php echo $patient_name[$i]; ?></p>
      </div>
      <div class="result-info">
        <p class="result-label">Age:</p>
        <p class="result-value"><?php echo $age[$i]; ?></p>
      </div>
      <div class="result-info">
        <p class="result-label">Gender:</p>
        <p class="result-value"><?php echo $sex[$i]; ?></p>
      </div>
      <div class="result-info">
        <p class="result-label">Medical Record Number:</p>
        <p class="result-value"><?php echo $medical_record_number[$i]; ?></p>
      </div>
      <div class="result-info">
        <p class="result-label">Symptoms:</p>
        <p class="result-value"><?php echo $symptoms[$i]; ?></p>
      </div>
      <div class="result-info">
        <p class="result-label">dignosis:</p>
        <p class="result-value"><?php echo $Diagnosis[$i]; ?></p>
      </div>
      <div class="result-info">
        <p class="result-label">prescription:</p>
        <p class="result-value"><?php echo $prescription[$i]; ?></p>
      </div>
      <div class="result-info">
        <p class="result-label">Last Visit Date:</p>
        <p class="result-value"><?php echo $visited_day[$i]?></p>
      </div>
    </div>
<?php
    }
?>
    
    
  </div>

  <div class="card" id="add-record-section" style=
  "background-color: lightblue;
  position: fixed;
  height: 100vh;
  top: 10%;
  width: 80%;
  left: 10%;
  display: none;
  ";
  >
    <h2 class="card-title text-center mb-5">Add New Patient Record</h2>
    <form action="AddRecord.php" method="post">
      <div class="form-group mb-2">
        <input
          type="hidden"
          class="form-control"
          placeholder="Disease ID"
          name="disease_ID"
          value="<?php echo $random?>"
          readonly
          required
        />
      </div>
      <div class="form-group mb-2">
        <input
          type="hidden"
          class="form-control"
          placeholder="Medical Record Number"
          name="patient_ID"
          value="<?php echo $userid?>"
          readonly
          required
        />
      </div>
      <div class="form-group mb-2">
        <textarea
          class="form-control"
          placeholder="Symptoms"
          name="symptoms"
          rows="3"
          required
        ></textarea>
      </div>
      <div class="form-group mb-2">
        <textarea
          class="form-control"
          placeholder="Diagnosis"
          name="diagnosis"
          rows="3"
          required
        ></textarea>
      </div>
      <div class="form-group mb-2">
        <textarea
          class="form-control"
          placeholder="Prescription"
          name="prescription"
          rows="3"
          required
        ></textarea>
      </div>
      <div class="form-group mb-2">
        <label for="last_visit_date">Visitation Day</label>
        <input
          type="date" 
          class="form-control" 
          name = "last_visit_date"
          id="last_visit_date" 
          required
        ></input>
      </div>
      <div class="text-center">
        <button class="btn btn-primary" type="submit">Add Record</button>
      </div>
    </form>
    
  </div>
  <script>
    var newRecord = document.getElementById("newrec");
    var newRecordField = document.getElementById("add-record-section");

    newRecord.addEventListener("click", ()=>{
      if(newRecordField.style.display === "none")
        newRecordField.style.display = "block";
      else{
        newRecordField.style.display = "none"
      }
    })
  </script>
</body>
</html>

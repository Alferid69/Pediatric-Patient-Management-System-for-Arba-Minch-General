<?php
include("connection.php");

do{
  $medical_number = rand(1000,9999);

  $query = "SELECT * FROM patient_info where Medical_Record_No = '$medical_number'";
  $result = $conn->query($query);
}while($result->num_rows > 0);


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registration Page</title>

    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
    />
    <link rel="stylesheet" href="Register_styles.css" />
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
        <span class="navbar-brand">Pediatric Patient Register System</span>
        <form class="form-inline my-2 my-lg-0 ml-auto" action="patient_list.php" method="POST">
            <input name="name" class="form-control mr-sm-2" type="search" placeholder="Search patient by name" aria-label="Search" style="width: 400px;">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            <!-- Or you can use an icon for the search button -->
            <!-- <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button> -->
        </form>
        <ul class="nav navbar-nav ml-auto">
            <li class="nav-item">
                <form class="form-inline" action="logout.php" method="post">
                    <button type="submit" class="btn btn-danger">Logout</button>
                </form>
            </li>
        </ul>
    </div>
</nav>


    <div class="container" style="flex-direction: column; margin-top: 40px">
      
        <?php if(isset($_SESSION['status'])){?>
          <h4 style="color: red;"><?php echo $_SESSION['status'];?> </h4><?php
        }
        ?>
        
      <form action="Register.php" method="post">
        <div class="section">
          <div class="form-group">
            <label for="faculty">Name of Faculty:</label>
            <input
              type="text"
              id="faculty"
              name="faculty"
              value="Arbaminch General Hospital"
              spellcheck="false"
              required
            />
          </div>
          <div class="form-group">
            <label for="medical_record">Medical Record Number:</label>
            <input
              type="text"
              id="medical_record"
              name="medical_record"
              value="<?php echo $medical_number; ?>";
              required
            />
          </div>
          <div class="form-group">
            <label for="date_of_registration"
              >Date of Registration (DD/MM/YYYY):</label
            >
            <input
              type="date"
              id="date_of_registration"
              name="date_of_registration"
              placeholder="DD/MM/YYYY"
              required
            />
          </div>
          <div class="form-group">
            <label for="patient_name">Patient Full Name:</label>
            <input type="text" id="patient_name" name="patient_name" required />
          </div>
          <div class="form-group">
            <label for="sex">Sex:</label>
            <div class="flex">
              <label
                ><input type="radio" name="sex" value="male" required />
                Male</label
              >
              <label
                ><input type="radio" name="sex" value="female" required />
                Female</label
              >
            </div>
          </div>
          <div class="form-group">
            <label for="date_of_birth">Date of Birth (DD/MM/YYYY):</label>
            <input
              type="date"
              id="date_of_birth"
              name="date_of_birth"
              placeholder="DD/MM/YYYY"
              required
            />
          </div>
        </div>

        <div class="section">
          <div class="form-group">
            <label for="age">Age:</label>
            <input type="number" id="age" name="age" min="0" max="7" required />
          </div>
          <div class="form-group">
            <label for="region">Region:</label>
            <input type="text" id="region" name="region" required />
          </div>
          <div class="form-group">
            <label for="subcity">Subcity:</label>
            <input type="text" id="subcity" name="subcity" required />
          </div>
          <div class="form-group">
            <label for="ketena">Ketena:</label>
            <input type="text" id="ketena" name="ketena" required />
          </div>
          <div class="form-group">
            <label for="kebele">Kebele:</label>
            <input type="text" id="kebele" name="kebele" required />
          </div>
          <div class="form-group">
            <label for="phone_number">Phone Number:</label>
            <input type="text" id="phone_number" value="+251" name="phone_number" required />
          </div>
        </div>
        <div class="submit" style="bottom: -10px;">
          <button type="SUBMIT" class="btn btn-primary">Register</button>
        </div>
      </form>
    </div>
  </body>
</html>
<?php
$_SESSION['status'] = "";
?>
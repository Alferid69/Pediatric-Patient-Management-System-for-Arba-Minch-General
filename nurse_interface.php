<?php
include("connection.php")
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Doctor Interface</title>
    <link rel="stylesheet" href="home_page.css" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
    />
  </head>
  <body>
    <nav class="navbar">
      <div class="container-fluid">
          <span class="navbar-brand">Pediatric Patient Management System</span>
          <ul class="nav navbar-nav navbar-right">
              <li>
                  <form action="logout.php" method="post">
                      <button type="submit" class="btn btn-danger">Logout</button>
                  </form>
              </li>
          </ul>
      </div>
    </nav>

    <div class="container mt-5">
      <div class="card" style="background-color: transparent;">
        <h4 style="color: red;">
        <?php if(isset($_SESSION['status'])){
          echo $_SESSION['status'];
        }
        ?>
        </h4>
        <h1 class="card-title text-center mb-5">Welcome, Nurse</h1>
        <div class="search-section mb-5">
          <h2 class="card-title mb-4">Search for a Patient</h2>
          <form action="nurse_search_patient.php" method="post">
            <div class="form-group">
              <input
                type="text"
                class="form-control"
                placeholder="Enter Medical Record Number"
                name="medical_record_number"
                required
              />
            </div>
            <div class="text-center">
              <button class="btn btn-primary" type="submit">Search</button>
            </div>
          </form>
        </div>
      </div>

      
    </div>
  </body>
</html>

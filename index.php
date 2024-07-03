<?php
include("connection.php");
// session_start();

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ARBAMINCH GENERAL HOSPITAL - Creative Login Page</title> <!-- Added hospital name -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    />
    <link rel="stylesheet" href="login_styles.css" />
  </head>
  <body style="flex-direction: column;">
    <header style="position: fixed; top: 0; width: 100%; display: flex;
    align-items: center; justify-content: center;">
      <h1 style="box-shadow: 0px 10px 20px rgba(0,0,0,0.5); color: white; font-size: 3.5rem;">ARBAMINCH GENERAL HOSPITAL</h1> <!-- Added hospital name -->
    </header>
    
    <div class="login-container">
      <h4 style="color: red;">
      <?php if(isset($_SESSION['status'])){
        echo $_SESSION['status'];
      }
      ?>
      </h4>
      <form action="login.php" method="post">
        <h2>Welcome Back</h2>
        <input type="text" name="username" placeholder="Username" required />
        <br />
        <input
          type="password"
          name="password"
          placeholder="Password"
          required
        />
        <br />
        <input type="submit" value="Login" />
      </form>
    </div>
    <script>
      // Change background image based on the time of day
      const currentTime = new Date().getHours();
      if (currentTime >= 6 && currentTime < 12) {
        document.body.style.backgroundImage =
          "url('https://source.unsplash.com/1600x900/?morning')";
      } else if (currentTime >= 12 && currentTime < 18) {
        document.body.style.backgroundImage =
          "url('https://source.unsplash.com/1600x900/?afternoon')";
      } else {
        document.body.style.backgroundImage =
          "url('https://source.unsplash.com/1600x900/?night')";
      }
    </script>
  </body>
</html>
<?php
$_SESSION['status'] = "";
?>
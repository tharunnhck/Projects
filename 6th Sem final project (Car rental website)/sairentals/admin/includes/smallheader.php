<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0) {  
    header('location:index.php');
    exit; // Ensure no further code execution
} else {
    $username = $_SESSION['alogin']; 
    $username = ucwords($username);// Capitalize username
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sai Rental | Admin Panel</title>
<link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
<style>
  /* Resetting some default styles */

  .brand {
    background-color: #F76D2B;
    color: #fff;
    display: flex;
    justify-content: space-between;
    align-items: center;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    height: 60px;
    padding: 0 20px; /* Added padding for space around the logo */
  }
  .brand a {
    font-size: 20px;
    text-decoration: none;
    color: #fff;
    display: flex;
    align-items: center;
    cursor: pointer; /* Add cursor pointer for clickable effect */
  }
  .brand a img {
    height: 40px;
    margin-right: 10px; /* Adjust margin for spacing */
  }
</style>
<script>
  // JavaScript function to close the current window
  function closeWindow() {
    window.close(); // Close the current window or tab
  }
</script>
</head>
<body>

<div class="brand clearfix">
  <a href="#" onclick="closeWindow()">
    <img src="img/logo.png" alt="Sai Rental Logo">
    Sai Rental
  </a>
</div>

</body>
</html>
<?php } ?>

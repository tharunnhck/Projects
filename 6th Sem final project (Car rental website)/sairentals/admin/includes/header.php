<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0) {  
    header('location:index.php');
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
    background-color: #F76D2B; /*  #007bff  Brand background color */
    color: #fff; /* Brand text color */
    display: flex;
    justify-content: space-between;
    align-items: center;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    height: 60px;
  }
  .brand a img {
    height: 40px;
    margin-right: 10px; /* Adjust margin for spacing */
  }
  .brand a {
  display: inline-block;
  position: relative;
  color: #333; /* Default text color */
  text-decoration: none; /* Remove underline */
  overflow: hidden; /* Hide overflowing elements */
  transition: color 0.3s ease, transform 0.3s ease; /* Smooth transitions */
}

.brand a::before {
  content: '';
  position: absolute;
  top: 100%;
  left: 0;
  width: 100%;
  height: 2px; /* Underline height */
  background-color: #ffcc00; /* Underline color */
  transform: scaleX(0); /* Start with no width */
  transform-origin: bottom left;
  transition: transform 0.3s ease; /* Smooth transition for underline */
}

.brand a::after {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: linear-gradient(135deg, #ffcc00, #ff6600); /* Gradient colors */
  opacity: 0;
  transition: opacity 0.3s ease; /* Smooth transition for opacity */
  z-index: -1; /* Behind the text */
}

.brand a:hover {
  color: #fff; /* Change text color on hover */
  transform: translateY(-2px); /* Move text up slightly */
}

.brand a:hover::before {
  transform: scaleX(1); /* Expand underline on hover */
}

.brand a:hover::after {
  opacity: 1; /* Show gradient overlay on hover */
}


/* Reset default styles */
.mystical-logo {
  border: none; /* Remove any border */
  box-shadow: none !important; /* Remove any box-shadow and ensure it's not overridden */
  outline: none; /* Remove any outline */
}

/* Define the mystical aura animation */
@keyframes mystical {
  0% {
    filter: hue-rotate(0deg);
    opacity: 1;
  }
  50% {
    filter: hue-rotate(360deg);
    opacity: 0.8;
  }
  100% {
    filter: hue-rotate(0deg);
    opacity: 1;
  }
}

/* Apply animation to the logo */
.mystical-logo {
  animation: mystical 20s ease-in-out infinite;
}




</style>
</head>
<body>


<div class="brand clearfix">
  <a style="font-size: 20px;text-decoration: none;color: #fff;display: flex;align-items: center;margin-left:38px;" href="dashboard.php">
  <img  src="img/logo.png" alt="Sai Rental Logo" class="mystical-logo">
    Sai Rental
  	</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
  <span class="menu-btn"><i class="fa fa-bars"></i></span>
  <ul class="ts-profile-nav">
    <li class="ts-account">
      <a href="#">
        <img src="img/logo.png" class="ts-avatar hidden-side" alt="Account Avatar">
        <?php echo $username; ?> <i class="fa fa-angle-down hidden-side"></i>
      </a>
      <ul>
        <li><a href="change-password.php">Change Password</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </li>
  </ul>

</div>

</body>
</html>
<?php } ?>
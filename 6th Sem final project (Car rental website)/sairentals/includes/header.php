<style>
/* Dropdown Menu Styling */
.dropdown-menu {
    background: linear-gradient(to bottom, #2e2e2e, #4a4a4a); /* Gradient background for depth */
    border: none;
    border-radius: 8px; /* Rounded corners for a modern look */
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.6); /* Soft shadow for depth */
    padding: 0;
    min-width: 200px; /* Adjusted minimum width for a more compact menu */
    overflow: hidden; /* Prevents overflow of content */
}

/* Individual Items */
.dropdown-menu .dropdown-item {
    padding: 8px 12px; /* Reduced padding for a smaller item */
    font-size: 13px; /* Slightly smaller font size */
    color: #dcdcdc; /* Light gray color for text */
    transition: background-color 0.3s ease, color 0.3s ease;
    border-bottom: 1px solid #555; /* Subtle border between items */
    display: flex;
    align-items: center;
}

/* Remove border from the last item */
.dropdown-menu .dropdown-item:last-child {
    border-bottom: none;
}

/* Hover Effect */
.dropdown-menu .dropdown-item:hover {
    background-color: rgba(255, 255, 255, 0.1); /* Slightly transparent white background on hover */
    color: #ffffff; /* White text color on hover */
}

/* Icon Styling */
.dropdown-menu .dropdown-item i {
    margin-right: 8px; /* Space between icon and text */
    font-size: 14px; /* Slightly smaller icon size to match the smaller text */
    color: #f0f0f0; /* Light color for icons */
}

/* Special Styling for 'Sign Out' */
.dropdown-menu .dropdown-item.text-danger {
    color: #ff6f6f; /* Light red color for Sign Out */
}

.dropdown-menu .dropdown-item.text-danger i {
    color: #ff6f6f; /* Red color for Sign Out icon */
}

.dropdown-menu .dropdown-item.text-danger:hover {
    background-color: rgba(255, 77, 77, 0.2); /* Light red background on hover */
    color: #ffffff; /* White text color on hover */
}

.dropdown-menu .dropdown-item.text-danger:hover i {
    color: #ffffff; /* White icon color on hover for Sign Out */
}

/* Ensure the input and button are part of the same form */
#header-search-form {
  display: flex;
}

/* Style the input field */
#header-search-form .form-control {
  border-radius: 25px; /* Adjust this value for more or less roundness */
  padding: 10px 15px;
  border: 1px solid #ddd;
  outline: none;
  flex: 1;
  color: black; /* Text color when typed */
}

/* Placeholder styling */
#header-search-form .form-control::placeholder {
  color: grey; /* Placeholder text color */
}

/* Style the submit button */
#header-search-form button {
  border-radius: 25px; /* Match the radius of the input field */
  border: none;
  padding: 10px 20px;
  cursor: pointer;
  margin-left: -4px; /* Adjust to remove the gap between input and button */
}


  </style>
<header>
  <div class="default-header">
    <div class="container">
      <div class="row">
        <div class="col-sm-3 col-md-2">
          <div class="logo"> <a href="index.php"><img src="assets/images/sai.png" alt="image"/></a> </div>
        </div>
        <div class="col-sm-9 col-md-10">
          <div class="header_info">
         <?php
         $sql = "SELECT EmailId,ContactNo from tblcontactusinfo";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
foreach ($results as $result) {
$email=$result->EmailId;
$contactno=$result->ContactNo;
}
?>   

            <div class="header_widgets">
              <div class="circle_icon"> <i class="fa fa-envelope" aria-hidden="true"></i> </div>
              <p class="uppercase_text">For Support Mail us : </p>
              <a href="mailto:<?php echo htmlentities($email);?>"><?php echo htmlentities($email);?></a> </div>
            <div class="header_widgets">
              <div class="circle_icon"> <i class="fa fa-phone" aria-hidden="true"></i> </div>
              <p class="uppercase_text">Service Helpline Call Us: </p>
              <a href="tel:<?php echo htmlentities($contactno);?>"><?php echo htmlentities($contactno);?></a> </div>
            <div class="social-follow">
            
            </div>
   <?php   if(strlen($_SESSION['login'])==0)
	{	
?>
 <div class="login_btn"> <a href="#loginform" class="btn btn-xs uppercase" data-toggle="modal" data-dismiss="modal">Login / Register</a> </div>
<?php }
else{ 

echo "Welcome To Sai Rentals";
 } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Navigation -->
  <nav id="navigation_bar" class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
        <button id="menu_slide" data-target="#navigation" aria-expanded="false" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      </div>
      <div class="header_wrap">
        <div class="user_login">
          <ul>
            <li class="dropdown"><a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle" aria-hidden="true"></i> 
<?php 
$email=$_SESSION['login'];
$sql ="SELECT FullName FROM tblusers WHERE EmailId=:email ";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
	{

	 echo htmlentities($result->FullName); }}?>
   <i class="fa fa-angle-down" aria-hidden="true"></i></a>
<!-- Dropdown Menu -->
<ul class="dropdown-menu">
    <?php if($_SESSION['login']) { ?>
        <li><a href="profile.php" class="dropdown-item"><i class="fa fa-user"></i> Profile Settings</a></li>
        <li><a href="update-password.php" class="dropdown-item"><i class="fa fa-lock"></i> Update Password</a></li>
        <li><a href="my-booking.php" class="dropdown-item"><i class="fa fa-calendar-check-o"></i> My Booking</a></li>
        <li><a href="post-testimonial.php" class="dropdown-item"><i class="fa fa-pencil"></i> Post a Testimonial</a></li>
        <li><a href="my-testimonials.php" class="dropdown-item"><i class="fa fa-star"></i> My Testimonial</a></li>
        <li><a href="logout.php" class="dropdown-item text-danger"><i class="fa fa-sign-out"></i> Sign Out</a></li>
    <?php } else { ?>
      <li style="color:white;">Guest</li>
        <li><a href="#loginform" data-toggle="modal" data-dismiss="modal" class="dropdown-item"><i class="fa fa-sign-in"></i> Sign In</a></li>
    <?php } ?>
</ul>


        </div>
        <div class="header_search">
          <div id="search_toggle"><i class="fa fa-search" aria-hidden="true"></i></div>
          <form action="search.php" method="post" id="header-search-form">
            <input type="text" placeholder="Search..." name="searchdata" class="form-control" required="true">
            <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
          </form>
        </div>
      </div>
      <div class="collapse navbar-collapse" id="navigation">
        <ul class="nav navbar-nav">
          <li><a href="index.php">Home</a>    </li>
          	 
          <li><a href="page.php?type=aboutus">About Us</a></li>
          <li><a href="car-listing.php">Car Listing</a>
          <li><a href="page.php?type=faqs">FAQ</a></li>
          <li><a href="contact-us.php">Contact Us</a></li>

        </ul>
      </div>
    </div>
  </nav>
  <!-- Navigation end --> 
  
</header>
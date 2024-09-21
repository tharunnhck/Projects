<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="theme-color" content="#3e454c">

    <title>Sai Rentals | Admin Dashboard</title>

    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Admin Style -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Favicon -->
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">

    <!-- Custom styles for panels -->
    <style>
        .stat-panel {
            background: #007bff;
            color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            padding: 20px;
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
            min-height: 200px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            position: relative;
            overflow: hidden;
            text-align: center;
            text-decoration: none; /* Added */
        }

        .stat-panel::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.7));
            z-index: 0;
            opacity: 0;
            transition: opacity 0.3s ease-in-out;
        }

        .stat-panel:hover::before {
            opacity: 1;
        }

        .stat-number {
            font-size: 40px; /* Adjust font size as needed */
            font-weight: bold;
            margin-top: 10px; /* Spacing between title and number */
        }

        .stat-title {
            font-size: 24px;
            text-transform: uppercase;
            margin-bottom: 10px; /* Spacing below title */
        }

        .stat-icon {
            font-size: 60px;
            color: rgba(255, 255, 255, 0.7);
            position: absolute;
            bottom: 20px;
            right: 20px;
            z-index: 1;
        }
    </style>
</head>

<body>

    <?php
    session_start();
    error_reporting(0);
    include('includes/config.php');

    // Redirect to login if session is not active
    if (strlen($_SESSION['alogin']) == 0) {
        header('location:index.php');
        exit(); // Ensure script stops execution after redirection
    } else {
        // Fetch statistics from database
        try {
            // Fetch number of registered users
            $stmt = $dbh->prepare("SELECT COUNT(id) AS total_users FROM tblusers");
            $stmt->execute();
            $regusers = $stmt->fetch(PDO::FETCH_ASSOC)['total_users'];

            // Fetch number of listed vehicles
            $stmt = $dbh->prepare("SELECT COUNT(id) AS total_vehicles FROM tblvehicles");
            $stmt->execute();
            $totalvehicle = $stmt->fetch(PDO::FETCH_ASSOC)['total_vehicles'];

            // Fetch number of bookings
            $stmt = $dbh->prepare("SELECT COUNT(id) AS total_bookings FROM tblbooking");
            $stmt->execute();
            $bookings = $stmt->fetch(PDO::FETCH_ASSOC)['total_bookings'];

            // Fetch number of listed brands
            $stmt = $dbh->prepare("SELECT COUNT(id) AS total_brands FROM tblbrands");
            $stmt->execute();
            $brands = $stmt->fetch(PDO::FETCH_ASSOC)['total_brands'];

            // Fetch number of subscribers
            $stmt = $dbh->prepare("SELECT COUNT(id) AS total_subscribers FROM tblsubscribers");
            $stmt->execute();
            $subscribers = $stmt->fetch(PDO::FETCH_ASSOC)['total_subscribers'];

            // Fetch number of contact queries
            $stmt = $dbh->prepare("SELECT COUNT(id) AS total_queries FROM tblcontactusquery");
            $stmt->execute();
            $queries = $stmt->fetch(PDO::FETCH_ASSOC)['total_queries'];

            // Fetch number of testimonials
            $stmt = $dbh->prepare("SELECT COUNT(id) AS total_testimonials FROM tbltestimonial");
            $stmt->execute();
            $testimonials = $stmt->fetch(PDO::FETCH_ASSOC)['total_testimonials'];
        } catch (PDOException $e) {
            // Handle database errors gracefully
            echo "Error: " . $e->getMessage();
            die();
        }
    ?>
    
    <?php include('includes/header.php'); ?>

    <div class="ts-main-content">
        <?php include('includes/leftbar.php'); ?>
        <div class="content-wrapper">
            <div class="container-fluid">

                <!-- Statistics panels -->
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-title">Dashboard</h2>

                        <div class="row">
                            <!-- Registered Users -->
                            <div class="col-md-3">
                                <a href="reg-users.php" class="stat-panel">
                                    <div class="stat-title">Registered Users</div>
                                    <div class="stat-number"><?php echo htmlentities($regusers); ?></div>
                                    <i class="fas fa-users stat-icon"></i>
                                </a>
                            </div>

                            <!-- Listed Vehicles -->
                            <div class="col-md-3">
                                <a href="manage-vehicles.php" class="stat-panel" style="background-color: #28a745;">
                                    <div class="stat-title">Listed Vehicles</div>
                                    <div class="stat-number"><?php echo htmlentities($totalvehicle); ?></div>
                                    <i class="fas fa-car stat-icon"></i>
                                </a>
                            </div>

                            <!-- Total Bookings -->
                            <div class="col-md-3">
                                <a href="all-bookings.php" class="stat-panel" style="background-color: #dc3545;">
                                    <div class="stat-title">Total Bookings</div>
                                    <div class="stat-number"><?php echo htmlentities($bookings); ?></div>
                                    <i class="fas fa-bookmark stat-icon"></i>
                                </a>
                            </div>

                            <!-- Listed Brands -->
                            <div class="col-md-3">
                                <a href="manage-brands.php" class="stat-panel" style="background-color: #ffc107;">
                                    <div class="stat-title">Listed Brands</div>
                                    <div class="stat-number"><?php echo htmlentities($brands); ?></div>
                                    <i class="fas fa-tags stat-icon"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
<br><br>
                <!-- Additional panels -->
                <div class="row mt-4">
                    <div class="col-md-12">
                        <div class="row">
                            <!-- Subscribers -->
                            <div class="col-md-3">
                                <a href="manage-subscribers.php" class="stat-panel" style="background-color: #007bff;">
                                    <div class="stat-title">Subscribers</div>
                                    <div class="stat-number"><?php echo htmlentities($subscribers); ?></div>
                                    <i class="fas fa-envelope-open-text stat-icon"></i>
                                </a>
                            </div>

                            <!-- Queries -->
                            <div class="col-md-3">
                                <a href="manage-conactusquery.php" class="stat-panel" style="background-color: #17a2b8;">
                                    <div class="stat-title">Queries</div>
                                    <div class="stat-number"><?php echo htmlentities($queries); ?></div>
                                    <i class="fas fa-question-circle stat-icon"></i>
                                </a>
                            </div>

                            <!-- Testimonials -->
                            <div class="col-md-3">
                                <a href="testimonials.php" class="stat-panel" style="background-color: #6c757d;">
                                    <div class="stat-title">Testimonials</div>
                                    <div class="stat-number"><?php echo htmlentities($testimonials); ?></div>
                                    <i class="fas fa-comments stat-icon"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <?php } ?>

	    <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap-select.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.dataTables.min.js"></script>
        <script src="js/dataTables.bootstrap.min.js"></script>
        <script src="js/Chart.min.js"></script>
        <script src="js/fileinput.js"></script>
        <script src="js/chartData.js"></script>
        <script src="js/main.js"></script>

</body>

</html>

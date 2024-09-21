<?php
session_start();
error_reporting(0);
include('includes/config.php');

if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
    exit();
}

$monthNumber = date('m'); // Default to current month
$totalPrice = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['month'])) {
    // Extract the month from the form input
    $monthInput = $_POST['month'];
    
    // Convert the date to a timestamp and then format as a month number
    $monthNumber = date('m', strtotime($monthInput));
}

try {
    $status = 1; // Set the status value here
    $sql = "SELECT tblusers.*, tblbrands.BrandName, tblvehicles.VehiclesTitle, tblbooking.FromDate, tblbooking.ToDate,
            tblbooking.message, tblbooking.VehicleId as vid, tblbooking.Status, tblbooking.PostingDate, tblbooking.id,
            tblbooking.BookingNumber, DATEDIFF(tblbooking.ToDate, tblbooking.FromDate) as totalnodays, tblvehicles.PricePerDay
            FROM tblbooking
            JOIN tblvehicles ON tblvehicles.id = tblbooking.VehicleId
            JOIN tblusers ON tblusers.EmailId = tblbooking.userEmail
            JOIN tblbrands ON tblbrands.id = tblvehicles.VehiclesBrand
            WHERE month(tblbooking.ToDate) = :monthNumber AND tblbooking.Status = :status";
    
    $query = $dbh->prepare($sql);
    $query->bindParam(':monthNumber', $monthNumber, PDO::PARAM_STR);
    $query->bindParam(':status', $status, PDO::PARAM_INT);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);

    // Calculate total price
    foreach ($results as $result) {
        $totalPrice += $result->totalnodays * $result->PricePerDay;
    }

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    die(); // Stop execution on database error
}

?>

<!doctype html>
<html lang="en" class="no-js">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="theme-color" content="#3e454c">

    <title>Sai Rentals | Confirmed Bookings</title>

    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- Sandstone Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Bootstrap Datatables -->
    <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
    <!-- Bootstrap social button library -->
    <link rel="stylesheet" href="css/bootstrap-social.css">
    <!-- Bootstrap select -->
    <link rel="stylesheet" href="css/bootstrap-select.css">
    <!-- Bootstrap file input -->
    <link rel="stylesheet" href="css/fileinput.min.css">
    <!-- Awesome Bootstrap checkbox -->
    <link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
    <!-- Admin Stye -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="img/logo.png" type=x-icon>
    <style>
        .errorWrap {
            padding: 10px;
            margin: 0 0 20px 0;
            background: #fff;
            border-left: 4px solid #dd3d36;
            -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
        }

        .succWrap {
            padding: 10px;
            margin: 0 0 20px 0;
            background: #fff;
            border-left: 4px solid #5cb85c;
            -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
        }
    </style>

</head>

<body>
    <?php include('includes/header.php'); ?>
    <div class="ts-main-content">
        <?php include('includes/leftbar.php'); ?>
        <div class="content-wrapper">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12">

                        <h2 class="page-title">Monthly Report</h2>

                        <div class="panel panel-default">
                            <div class="panel-heading">Monthly Report</div>
                            <div class="panel-body">

                                <form action="" method="POST" class="form-inline">
                                    <label for="month">Choose a month:</label>
                                    <input type="month" id="month" name="month" class="form-control" required>&nbsp&nbsp
                                    <button type="submit" class="btn btn-primary ml-2">Generate Report</button>
                                </form>
                                <br>

                                <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['month'])) : ?>
                                <div>
                                    <p>Booking Info for <?php echo date('F Y', strtotime($monthInput)); ?></p>
                                </div>

                                <!-- Zero Configuration Table -->
                                <div class="table-responsive">
                                    <table id="zctb"
                                        class="display table table-striped table-bordered table-hover"
                                        cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Booking No.</th>
                                                <th>Vehicle</th>
                                                <th>Total Cost</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $cnt = 1;
                                            foreach ($results as $result) {
                                            ?>
                                            <tr>
                                                <td><?php echo htmlentities($cnt); ?></td>
                                                <td><?php echo htmlentities($result->BookingNumber); ?></td>
                                                <td><a
                                                        href="edit-vehicle.php?id=<?php echo htmlentities($result->vid); ?>"><?php echo htmlentities($result->BrandName); ?>
                                                        , <?php echo htmlentities($result->VehiclesTitle); ?></a></td>
                                                <td><?php echo htmlentities($result->totalnodays * $result->PricePerDay); ?></td>
                                                <td><a href="bookig-details.php?bid=<?php echo htmlentities($result->id); ?>"
                                                        target="_blank" class="btn btn-primary">View</a></td>
                                            </tr>
                                            <?php
                                                $cnt++;
                                            }
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th colspan="3">TOTAL</th>
                                                <td><?php echo $totalPrice; ?></td>
                                                <td></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <?php endif; ?>

                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Loading Scripts -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>

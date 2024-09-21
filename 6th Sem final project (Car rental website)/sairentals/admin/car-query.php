<?php
session_start();
error_reporting(E_ALL);
include('includes/config.php');

if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
    exit();
}

$selectedCar = "";
$selectedYear = date('Y'); // Default to current year

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $selectedCar = $_POST['car'];
    $selectedYear = $_POST['year'];

    try {
        // Retrieve bookings for the selected car and year
        $status = 1; // Set the status value here
        $sql = "SELECT tblusers.*, tblbrands.BrandName, tblvehicles.VehiclesTitle, tblbooking.FromDate, tblbooking.ToDate,
                tblbooking.message, tblbooking.VehicleId as vid, tblbooking.Status, tblbooking.PostingDate, tblbooking.id,
                tblbooking.BookingNumber, DATEDIFF(tblbooking.ToDate, tblbooking.FromDate) as totalnodays, tblvehicles.PricePerDay
                FROM tblbooking
                JOIN tblvehicles ON tblvehicles.id = tblbooking.VehicleId
                JOIN tblusers ON tblusers.EmailId = tblbooking.userEmail
                JOIN tblbrands ON tblbrands.id = tblvehicles.VehiclesBrand
                WHERE tblvehicles.id = :carId AND YEAR(tblbooking.PostingDate) = :selectedYear AND tblbooking.Status = :status";

        $query = $dbh->prepare($sql);
        $query->bindParam(':carId', $selectedCar, PDO::PARAM_INT);
        $query->bindParam(':selectedYear', $selectedYear, PDO::PARAM_INT);
        $query->bindParam(':status', $status, PDO::PARAM_INT);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        die(); // Stop execution on database error
    }
}

// Fetch cars for dropdown
try {
    $sqlCars = "SELECT id, VehiclesTitle FROM tblvehicles";
    $stmtCars = $dbh->prepare($sqlCars);
    $stmtCars->execute();
    $cars = $stmtCars->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error fetching cars: " . $e->getMessage();
    die();
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

    <title>Sai Rentals | Car Bookings</title>

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
<?php include('includes/header.php');?>

        <div class="ts-main-content">
            <?php include('includes/leftbar.php');?>
        <div class="content-wrapper">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12">

                        <h2 class="page-title">Car Bookings Query</h2>

                        <div class="panel panel-default">
                            <div class="panel-heading">Select Car and Year</div>
                            <div class="panel-body">

                                <form action="" method="POST">
                                    <div class="form-group">
                                        <label for="car">Select Car:</label>
                                        <select class="form-control" class="btn dropdown-toggle btn-default" id="car" name="car" required>
                                            <option value="">Select Car</option>
                                            <?php foreach ($cars as $car) : ?>
                                            <option value="<?php echo $car['id']; ?>" <?php echo ($selectedCar == $car['id']) ? 'selected' : ''; ?>>
                                                <?php echo $car['VehiclesTitle']; ?>
                                            </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="year">Select Year:</label>
                                        <input type="number" class="form-control" id="year" name="year"
                                            value="<?php echo $selectedYear; ?>" min="1900" max="<?php echo date('Y'); ?>"
                                            required>
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-primary">Show Bookings</button>
                                </form>

                            </div>
                        </div>

                        <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) : ?>
                        <div class="panel panel-default">
                            <div class="panel-heading">Bookings Info</div>
                            <div class="panel-body">

                                <table id="zctb"
                                    class="display table table-striped table-bordered table-hover" cellspacing="0"
                                    width="100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Booking No.</th>
                                            <th>Customer Name</th>
                                            <th>From Date</th>
                                            <th>To Date</th>
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
                                            <td><?php echo htmlentities($result->FullName); ?></td>
                                            <td><?php echo htmlentities($result->FromDate); ?></td>
                                            <td><?php echo htmlentities($result->ToDate); ?></td>
                                            <td><?php echo htmlentities($result->totalnodays * $result->PricePerDay); ?></td>
                                            <td><a href="bookig-details.php?bid=<?php echo htmlentities($result->id);?>" target="_blank" class="btn btn-primary"> View</a></td>
                                        </tr>
                                        <?php
                                            $cnt++;
                                        }
                                        ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                        <?php endif; ?>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
    <script>
        $(document).ready(function () {
            $('#zctb').DataTable();
        });
    </script>
</body>

</html>

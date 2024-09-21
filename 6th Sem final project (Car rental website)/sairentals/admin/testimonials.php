<?php
session_start();
error_reporting(0);
include('includes/config.php');

if(strlen($_SESSION['alogin']) == 0) {  
    header('location:index.php');
    exit();
}

$msg = '';

if(isset($_REQUEST['eid'])) {
    $eid = intval($_GET['eid']);
    $status = 0;
    $sql = "UPDATE tbltestimonial SET status=:status WHERE id=:eid";
    $query = $dbh->prepare($sql);
    $query->bindParam(':status', $status, PDO::PARAM_INT);
    $query->bindParam(':eid', $eid, PDO::PARAM_INT);
    if($query->execute()) {
        $msg = "Testimonial successfully deactivated.";
    } else {
        $error = "Error in deactivating testimonial.";
    }
}

if(isset($_REQUEST['aeid'])) {
    $aeid = intval($_GET['aeid']);

    // Count active testimonials excluding the current one
    $sql_count_active = "SELECT COUNT(*) AS active_count FROM tbltestimonial WHERE status = 1 AND id != :aeid";
    $query_count_active = $dbh->prepare($sql_count_active);
    $query_count_active->bindParam(':aeid', $aeid, PDO::PARAM_INT);
    $query_count_active->execute();
    $active_count = $query_count_active->fetch(PDO::FETCH_ASSOC)['active_count'];

    if($active_count < 4) {
        $status = 1;
        $sql = "UPDATE tbltestimonial SET status=:status WHERE id=:aeid";
        $query = $dbh->prepare($sql);
        $query->bindParam(':status', $status, PDO::PARAM_INT);
        $query->bindParam(':aeid', $aeid, PDO::PARAM_INT);
        if($query->execute()) {
            $msg = "Testimonial successfully activated.";
        } else {
            $error = "Error in activating testimonial.";
        }
    } else {
        $error = "Cannot activate testimonial. Maximum 4 testimonials can be active at a time.";
    }
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
    <title>Sai Rentals | Admin Manage Testimonials</title>

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
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <style>
        .errorWrap {
            padding: 10px;
            margin: 0 0 20px 0;
            background: #fff;
            border-left: 4px solid #dd3d36;
            -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
            box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
        }
        .succWrap {
            padding: 10px;
            margin: 0 0 20px 0;
            background: #fff;
            border-left: 4px solid #5cb85c;
            -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
            box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
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
                        <h2 class="page-title">Manage Testimonials</h2>
                        <div class="panel panel-default">
                            <div class="panel-heading">User Testimonials</div>
                            <div class="panel-body">
                                <?php 
                                if(isset($error) && !empty($error)) {
                                    echo '<div class="errorWrap"><strong>ERROR</strong>: '.htmlentities($error).'</div>';
                                } elseif(isset($msg) && !empty($msg)) {
                                    echo '<div class="succWrap"><strong>SUCCESS</strong>: '.htmlentities($msg).'</div>';
                                }
                                ?>
                                <table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Testimonial</th>
                                            <th>Posting Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $sql = "SELECT tblusers.FullName, tbltestimonial.UserEmail, tbltestimonial.Testimonial, tbltestimonial.PostingDate, tbltestimonial.status, tbltestimonial.id 
                                                FROM tbltestimonial 
                                                JOIN tblusers ON tblusers.Emailid = tbltestimonial.UserEmail";
                                        $query = $dbh->prepare($sql);
                                        $query->execute();
                                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                                        $cnt = 1;
                                        foreach($results as $result) {
                                        ?>
                                        <tr>
                                            <td><?php echo htmlentities($cnt);?></td>
                                            <td><?php echo htmlentities($result->FullName);?></td>
                                            <td><?php echo htmlentities($result->UserEmail);?></td>
                                            <td><?php echo htmlentities($result->Testimonial);?></td>
                                            <td><?php echo htmlentities($result->PostingDate);?></td>
                                            <td>
                                                <?php if($result->status == "" || $result->status == 0) { ?>
                                                    <a href="testimonials.php?aeid=<?php echo htmlentities($result->id);?>" onclick="return confirm('Do you really want to Activate')" class="btn btn-primary">Activate</a>
                                                <?php } else { ?>
                                                    <a href="testimonials.php?eid=<?php echo htmlentities($result->id);?>" onclick="return confirm('Do you really want to Inactivate')"  class="btn btn-danger">Deactivate</a>

                                                <?php } ?>
                                            </td>
                                        </tr>
                                        <?php 
                                        $cnt++;
                                        } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
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
</body>
</html>

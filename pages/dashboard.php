
<?php
require_once('../config/config.php');

session_start();

if ($_SESSION["verified"] === 1) :

    $stmt = $db->prepare("SELECT * FROM transactions WHERE user_id = " . $_SESSION['user_id'] . " ORDER BY created_at DESC LIMIT 10");
    $stmt->execute();
    $recentTransactions = $stmt->fetchAll(PDO::FETCH_ASSOC);

endif;



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Profile</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="../assets/img/logo2.png" rel="icon">
    <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="../assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
    <!-- ======= Header ======= -->
    <?php include('../components/header.php') ?>


    <!-- ======= Header ======= -->
    <style>
        .dashboard-card {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 20px;
            margin: 10px 0;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .card-title {
            font-size: 18px;
            font-weight: bold;
        }

        .card-value {
            font-size: 24px;
            color: #28a745;
        }

        .recent-transactions {
            max-height: 300px;
            overflow-y: auto;
        }
    </style>

    <!-- ======= Sidebar ======= -->
    <?php include("../components/sidebar.php") ?>

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section profile">
                <div class="row">
                    <div class="col-md-3">
                        <div class="dashboard-card">
                            <div class="card-title">Total Amount Paid (All Years)</div>
                            <div class="card-value">₱<?php echo 22; ?></div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="dashboard-card">
                            <div class="card-title">Total Amount Paid (This Year)</div>
                            <div class="card-value">₱<?php echo 22; ?></div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="dashboard-card">
                            <div class="card-title">Total Transactions</div>
                            <div class="card-value"><?php echo 22; ?></div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="dashboard-card">
                            <div class="card-title">Average Transaction Amount</div>
                            <div class="card-value">₱<?php echo 22; ?></div>
                        </div>
                    </div>
                </div>

                <h2 class="mt-5">Recent Transactions</h2>
                <div class="recent-transactions">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Transaction ID</th>
                                <th>Amount</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($_SESSION["verified"] === 1) :
                            
                            foreach ($recentTransactions as $transaction) : ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($transaction['created_at']); ?></td>
                                    <td><?php echo htmlspecialchars($transaction['transaction_code']); ?></td>
                                    <td>₱<?php echo number_format($transaction['amount'] / 100, 2); ?></td>
                                    <td><?php echo htmlspecialchars($transaction['status']); ?></td>
                                </tr>
                            <?php endforeach; 
                        
                            else: ?>
                                <tr>
                                    <td colspan="4" class="text-center">No transactions yet</td>
                                </tr>
                        
                         <?php endif;?>
                        </tbody>
                    </table>
                </div>
        </section>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; <strong><span></span></strong>All Rights Reserved 2023
        </div>

    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/chart.js/chart.umd.js"></script>
    <script src="../assets/vendor/echarts/echarts.min.js"></script>
    <script src="../assets/vendor/quill/quill.min.js"></script>
    <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="../assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="../assets/js/main.js"></script>

</body>

</html>
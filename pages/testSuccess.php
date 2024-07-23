<?php
require_once('../config/config.php');

session_start();

    try {

        // Get user ID from session
        $user_id = $_SESSION['user_id'];
        $transactionID = isset($_GET['transactionID']) ? $_GET['transactionID'] : header('Location: dashboard.php');
        $amount = isset($_GET['amount']) ? $_GET['amount'] : header('Location: dashboard.php');
        $name = isset($_GET['name']) ? $_GET['name'] : header('Location: dashboard.php');

        // Query the most recent transaction for the user
        $stmt = $db->prepare("SELECT * FROM transactions WHERE user_id = :user_id ORDER BY created_at DESC LIMIT 1");
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();
        $transaction = $stmt->fetch(PDO::FETCH_ASSOC);

        // Check if the transaction code matches
        if ($transaction['transaction_code'] === $transactionID) {
        
                $stmt = $db->prepare("UPDATE `transactions` SET `status`='APPROVED', `amount`=:amount WHERE `transaction_code`= :transactionid");
                $stmt->bindParam(':transactionid', $transactionID, PDO::PARAM_STR);
                $stmt->bindParam(':amount', $amount, PDO::PARAM_INT);


            if ($stmt->execute()) {
                
            } else {
                echo "Error inserting new transaction.";
        }
        } else {
            echo "Transaction already exists.";
        }

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }


    



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
            <h2>Payment Successful</h2>
                <p>Thank you for your payment. Your transaction has been completed successfully.</p>
                <h3>Receipt</h3>
                <div>
                    <p>Transaction ID: <?php echo htmlspecialchars($_GET['transactionID']); ?></p>
                    <p>Transaction Name: <?php echo htmlspecialchars($name); ?></p>
                    <p>Transaction Amount: <?php echo htmlspecialchars($_GET['amount']); ?></p>
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

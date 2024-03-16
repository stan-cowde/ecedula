<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Online Cedula Application</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="../assets/img/e.png" rel="icon">
    <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

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

</head>

<body>

    <!-- ======= Header ======= -->
    <?php include('../components/header.php') ?>

    <!-- ======= Sidebar ======= -->
    <?php include("../components/sidebar.php") ?>
    <!-- End Sidebar-->

    <!--Form Element--><!--main/pagetitle-->

    <main id="maintwo" class="maintwo">
        <div class="container">
            <header>Community Tax Certificate</header>

            <form action="#">
                <div class="form first">
                    <div class="details personal">
                        <div class="details ID">
                            <span class="title">Family Details</span>

                            <div class="fields">
                                <div class="input-field">
                                    <label>Father Name</label>
                                    <input type="text" placeholder="Enter father name" required>
                                </div>

                                <div class="input-field">
                                    <label>Mother Name</label>
                                    <input type="text" placeholder="Enter mother name" required>
                                </div>

                                <div class="input-field">
                                    <label>Guardian Name</label>
                                    <input type="text" placeholder="Enter guardian name (optional)">
                                </div>

                                <div class="input-field">
                                    <label>Spouse Name</label>
                                    <input type="text" placeholder="Enter spouse name">
                                </div>

                                <div class="input-field">
                                    <label>Issued Date</label>
                                    <input type="date" placeholder="Enter issued date" required>
                                </div>

                                <div class="input-field">
                                    <label>Expiry Date</label>
                                    <input type="date" placeholder="Enter expiry date" required>
                                </div>
                            </div>

                            <div class="buttons">
                                <a href="step_form_3.php">
                                    <div class="backBtn">
                                        <i class="bi bi-arrow-right-circle"></i>
                                        <span class="btnText">Back</span>
                                    </div>
                                </a>
                                <a href="step_form_4.php">
                                    <button class="nextBtn">
                                        <span class="btnText">Fisnish</span>
                                        <i class="bi bi-arrow-right-circle"></i>
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
            </form>
        </div>

        <script src="../assets/js/script.js"></script>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; <strong><span></span></strong>All Rights Reserved 2023
        </div>
        <div class="credits">

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
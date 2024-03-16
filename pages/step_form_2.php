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
                            <span class="title">Identity Details</span>

                            <div class="fields">
                                <div class="input-field">
                                    <label>Valid ID</label>
                                    <input type="file" placeholder="Enter ID Type " required>
                                </div>

                                <div class="input-field">
                                    <label>ID Number</label>
                                    <input type="number" placeholder="Enter ID number" required>
                                </div>

                                <div class="input-field">
                                    <label>Occupation</label>
                                    <input type="text" placeholder="Enter Occupation" required>
                                </div>

                                <div class="input-field">
                                    <label>TIN Number (optional)</label>
                                    <input type="text" placeholder="Enter TIN Number">
                                </div>

                                <div class="input-field">
                                    <label>Place of Birth</label>
                                    <input type="text" placeholder="Enter Place of Birth" required>
                                </div>

                                <div class="input-field">
                                    <label>ICR NO. (if an alien)</label>
                                    <input type="text" placeholder="Enter ICR" required>
                                </div>

                                <div class="input-field">
                                    <label>Gross Monthly Income (for employed)</label>
                                    <input type="number" placeholder="Enter Monthly Income" required>
                                    <select name="annual_income" id="annual_income">
                                        <option value="income">5,000 - 10,000</option>
                                        <option value="income">10,000 - 15,000</option>
                                        <option value="income">15,000 - 20,000</option>
                                        <option value="income">20,000 or more</option>
                                    </select>
                                </div>
                            </div>

                            <div class="buttons">
                                <a href="step_form_1.php">
                                    <div class="backBtn">
                                        <i class="bi bi-arrow-right-circle"></i>
                                        <span class="btnText">Back</span>
                                    </div>
                                </a>
                                <a href="step_form_3.php">
                                    <button class="nextBtn">
                                        <span class="btnText">Next</span>
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
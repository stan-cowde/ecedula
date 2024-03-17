<?php
require_once('../config/config.php');

session_start();
$user_id = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $father_name = $_POST['father_name'];
    $mother_name = $_POST['mother_name'];
    $guardian_name = $_POST['guardian_name'];
    $spouse_name = $_POST['spouse_name'];
    $issued_date = $_POST['issued_date'];
    $expiry_date = $_POST['expiry_date'];

    $stmt = $db->prepare("SELECT user_id FROM family_details WHERE user_id = :user_id");
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();
    $family_details = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($family_details) {
        $stmt = $db->prepare("UPDATE family_details SET
                                    father_name = :father_name,
                                    mother_name = :mother_name,
                                    guardian_name = :guardian_name,
                                    spouse_name = :spouse_name,
                                    issued_date = :issued_date,
                                    expiry_date = :expiry_date
                                WHERE user_id = :user_id");
    } else {
        $stmt = $db->prepare("INSERT INTO family_details 
                                    (user_id, father_name, mother_name, guardian_name, spouse_name, issued_date, expiry_date) 
                                VALUES 
                                    (:user_id, :father_name, :mother_name, :guardian_name, :spouse_name, :issued_date, :expiry_date)");
    }

    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':father_name', $father_name);
    $stmt->bindParam(':mother_name', $mother_name);
    $stmt->bindParam(':guardian_name', $guardian_name);
    $stmt->bindParam(':spouse_name', $spouse_name);
    $stmt->bindParam(':issued_date', $issued_date);
    $stmt->bindParam(':expiry_date', $expiry_date);

    $stmt->execute();

    header("Location: step_form_4.php");
} else {
    $stmt = $db->prepare("SELECT * FROM family_details WHERE user_id = :user_id");
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();
    $family_details = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($family_details) {
        $father_name = $family_details['father_name'];
        $mother_name = $family_details['mother_name'];
        $guardian_name = $family_details['guardian_name'];
        $spouse_name = $family_details['spouse_name'];
        $issued_date = $family_details['issued_date'];
        $expiry_date = $family_details['expiry_date'];
    }
}
?>
?>

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

            <form action="step_form_4.php" method="post">
                <div class="form first">
                    <div class="details personal">
                        <div class="details ID">
                            <span class="title">Family Details</span>

                            <div class="fields">
                                <div class="input-field">
                                    <label>Father Name</label>
                                    <input name="father_name" type="text" placeholder="Enter father name" value="<?php echo $father_name; ?>" required>
                                </div>

                                <div class="input-field">
                                    <label>Mother Name</label>
                                    <input name="mother_name" type="text" placeholder="Enter mother name" value="<?php echo $mother_name; ?>" required>
                                </div>

                                <div class="input-field">
                                    <label>Guardian Name</label>
                                    <input name="guardian_name" type="text" placeholder="Enter guardian name (optional)" value="<?php echo $guardian_name; ?>">
                                </div>

                                <div class="input-field">
                                    <label>Spouse Name</label>
                                    <input name="spouse_name" type="text" placeholder="Enter spouse name" value="<?php echo $spouse_name; ?>">
                                </div>

                                <div class="input-field">
                                    <label>Issued Date</label>
                                    <input name="issued_date" type="date" placeholder="Enter issued date" value="<?php echo $issued_date; ?>" required>
                                </div>

                                <div class="input-field">
                                    <label>Expiry Date</label>
                                    <input name="expiry_date" type="date" placeholder="Enter expiry date" value="<?php echo $expiry_date; ?>" required>
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
<?php
require_once('../config/config.php');

session_start();
$user_id = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $valid_id = $_POST['valid_id'];
    $id_number = $_POST['id_number'];
    $occupation = $_POST['occupation'];
    $place_of_birth = $_POST['place_of_birth'];
    $tin = $_POST['tin'];
    $icr = $_POST['icr'];
    $monthly_income = $_POST['monthly_income'];

    $stmt = $db->prepare("SELECT user_id FROM identity_details WHERE user_id = :user_id");
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();
    $identity_details = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($identity_details) {
        $stmt = $db->prepare("UPDATE identity_details SET
                                    valid_id = :valid_id,
                                    id_number = :id_number,
                                    occupation = :occupation,
                                    place_of_birth = :place_of_birth,
                                    tin = :tin,
                                    icr = :icr,
                                    monthly_income = :monthly_income
                                WHERE user_id = :user_id");
    } else {
        $stmt = $db->prepare("INSERT INTO identity_details 
                                    (user_id, valid_id, id_number, occupation, place_of_birth, tin, icr, monthly_income) 
                                VALUES 
                                    (:user_id, :valid_id, :id_number, :occupation, :place_of_birth, :tin, :icr, :monthly_income)");
    }

    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':valid_id', $valid_id);
    $stmt->bindParam(':id_number', $id_number);
    $stmt->bindParam(':occupation', $occupation);
    $stmt->bindParam(':place_of_birth', $place_of_birth);
    $stmt->bindParam(':tin', $tin);
    $stmt->bindParam(':icr', $icr);
    $stmt->bindParam(':monthly_income', $monthly_income);

    $stmt->execute();

    header("Location: step_form_3.php");
} else {
    $stmt = $db->prepare("SELECT * FROM identity_details WHERE user_id = :user_id");
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();
    $identity_details = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($identity_details) {
        $valid_id = $identity_details['valid_id'];
        $id_number = $identity_details['id_number'];
        $occupation = $identity_details['occupation'];
        $place_of_birth = $identity_details['place_of_birth'];
        $tin = $identity_details['tin'];
        $icr = $identity_details['icr'];
        $monthly_income = $identity_details['monthly_income'];
    }
}
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

            <form action="step_form_2.php" method="post">
                <div class="form first">
                    <div class="details personal">
                        <div class="details ID">
                            <span class="title">Identity Details</span>

                            <div class="fields">
                                <div class="input-field">
                                    <label>Valid ID</label>
                                    <input name="valid_id" type="file" placeholder="Enter ID Type" value="123">
                                </div>

                                <div class="input-field">
                                    <label>ID Number</label>
                                    <input name="id_number" type="number" placeholder="Enter ID number" value="<?php echo $id_number; ?>" required>
                                </div>

                                <div class="input-field">
                                    <label>Occupation</label>
                                    <input name="occupation" type="text" placeholder="Enter Occupation" value="<?php echo $occupation; ?>" required>
                                </div>

                                <div class="input-field">
                                    <label>TIN Number (optional)</label>
                                    <input name="tin" type="text" placeholder="Enter TIN Number" value="<?php echo $tin; ?>">
                                </div>

                                <div class="input-field">
                                    <label>Place of Birth</label>
                                    <input name="place_of_birth" type="text" value="<?php echo $place_of_birth; ?>" required>
                                </div>

                                <div class="input-field">
                                    <label>ICR NO. (if an alien)</label>
                                    <input name="icr" type="text" placeholder="Enter ICR" value="<?php echo $icr; ?>" required>
                                </div>

                                <div class="input-field">
                                    <label>Gross Monthly Income (for employed)</label>
                                    <select name="monthly_income" id="annual_income">
                                        <option value="low" <?php if ($monthly_income === 'low') echo 'selected'; ?>>5,000 - 10,000</option>
                                        <option value="poor" <?php if ($monthly_income === 'poor') echo 'selected'; ?>>10,000 - 15,000</option>
                                        <option value="middle" <?php if ($monthly_income === 'middle') echo 'selected'; ?>>15,000 - 20,000</option>
                                        <option value="high" <?php if ($monthly_income === 'high') echo 'selected'; ?>>20,000 or more</option>
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
                                <button type="submit" class="nextBtn">
                                    <span class="btnText">Next</span>
                                    <i class="bi bi-arrow-right-circle"></i>
                                </button>
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
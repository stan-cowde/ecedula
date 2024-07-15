<?php
require_once('../config/config.php');

session_start();
$user_id = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $address = $_POST['address'];
    $nationality = $_POST['nationality'];
    $municipality = $_POST['municipality'];
    $barangay = $_POST['barangay'];
    $block_number = $_POST['block_number'];
    $street = $_POST['street'];

    $stmt = $db->prepare("SELECT user_id FROM address_details WHERE user_id = :user_id");
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();
    $address_details = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($address_details) {
        $stmt = $db->prepare("UPDATE address_details SET
                                    address = :address,
                                    nationality = :nationality,
                                    municipality = :municipality,
                                    barangay = :barangay,
                                    block_number = :block_number,
                                    street = :street
                                WHERE user_id = :user_id");
    } else {
        $stmt = $db->prepare("INSERT INTO address_details 
                                    (user_id, address, nationality, municipality, barangay, block_number, street) 
                                VALUES 
                                    (:user_id, :address, :nationality, :municipality, :barangay, :block_number, :street)");
    }

    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':address', $address);
    $stmt->bindParam(':nationality', $nationality);
    $stmt->bindParam(':municipality', $municipality);
    $stmt->bindParam(':barangay', $barangay);
    $stmt->bindParam(':block_number', $block_number);
    $stmt->bindParam(':street', $street);

    $stmt->execute();

    header("Location: step_form_4.php");
} else {
    $stmt = $db->prepare("SELECT * FROM address_details WHERE user_id = :user_id");
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();
    $address_details = $stmt->fetch(PDO::FETCH_ASSOC);

    $address = "";
    $nationality = "";
    $municipality = "";
    $barangay = "";
    $block_number = "";
    $street = "";

    if ($address_details) {
        $address = $address_details['address'];
        $nationality = $address_details['nationality'];
        $municipality = $address_details['municipality'];
        $barangay = $address_details['barangay'];
        $block_number = $address_details['block_number'];
        $street = $address_details['street'];
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

            <form action="step_form_3.php" method="post">
                <div class="form first">
                    <div class="details personal">
                        <!--step 3-->
                        <div class="details address">
                            <span class="title">Address Details</span>

                            <div class="fields">
                                <div class="input-field">
                                    <label>Address</label>
                                    <input type="text" placeholder="Enter your address" name="address" value="<?php echo $address; ?>" required>
                                </div>

                                <div class="input-field">
                                    <label>Citizenship</label>
                                    <input type="text" placeholder="Enter Nationality" name="nationality" value="<?php echo $nationality; ?>" required>
                                </div>

                                <div class="input-field">
                                    <label>Municipality</label>
                                    <input type="text" placeholder="Enter Municipality" name="municipality" value="<?php echo $municipality; ?>" required>
                                </div>

                                <div class="input-field">
                                    <label>Barangay</label>
                                    <input type="text" placeholder="Enter your Barangay" name="barangay" value="<?php echo $barangay; ?>" required>
                                </div>

                                <div class="input-field">
                                    <label>Block Number</label>
                                    <input type="number" placeholder="Enter Block Number" name="block_number" value="<?php echo $block_number; ?>" required>
                                </div>

                                <div class="input-field">
                                    <label>Street</label>
                                    <input type="text" placeholder="Enter your Street" name="street" value="<?php echo $street; ?>" required>
                                </div>

                                <div class="buttons column-gap-3" style="justify-content: space-between;">
                                <a href="step_form_2.php">
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
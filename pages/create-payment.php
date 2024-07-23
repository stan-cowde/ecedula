<?php
require_once ('../config/config.php');

session_start();

if (!$_SESSION['user_id']){
    header('Location: ../index.php');
    exit;
}

if ($_SESSION["verified"] === 0) :

    header("location: dashboard.php");
    exit;

endif;

$year = date("Y");

$query = "SELECT 
                personal_details.*, 
                address_details.* 
            FROM 
                personal_details
            JOIN 
                address_details 
            ON 
                personal_details.user_id = address_details.user_id
            WHERE 
                personal_details.user_id = :id";

$stmt = $db->prepare($query);
$stmt->bindParam(':id', $_SESSION['user_id']);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

$name = $result['last_name'] . ', ' . $result['first_name'];
$address = $result['street'] . ', '. $result['block_number'] . ', '. $result['barangay'] . ', '. $result['municipality'] . ', '. $result['address'];


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
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.5.2/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.5.2/dist/sweetalert2.min.js"></script>

    <!-- Template Main CSS File -->
    <link href="../assets/css/style.css" rel="stylesheet">

</head>

<body>

    <!-- ======= Header ======= -->
    <?php include ('../components/header.php') ?>

    <!-- ======= Sidebar ======= -->
    <?php include ("../components/sidebar.php") ?>
    <!-- End Sidebar-->

    <!--Form Element--><!--main/pagetitle-->

    <main id="maintwo" class="maintwo">
        <div class="container">
            <header>Cedula (Community Tax Certificate) Form</header>
            <hr>
            <form action="submit_cedula.php" method="POST">
                <div class="form-floating form-group">
                    <select class="form-select form-select-sm" id="floatingSelect" name="barangay" aria-label="Select barangay">
                        <option>Select Brangay</option>
                        <option value="Tres De Mayo" selected>Tres De Mayo</option>
                    </select>
                    <label for="floatingSelect">What barangay are you paying?</label>
                </div>
            <div class="form-group">
                <label for="fullName">Full Name (Surname, Firstname Middlename)</label>
                <input type="text" class="form-control" id="fullName" name="fullName" placeholder="Full Name" value="<?= $name ?>" disabled>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="Address" value="<?= $address ?>" required>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="tin">Tax Identification No. (TIN)</label>
                    <input type="text" class="form-control" id="tin" name="tin" placeholder="TIN">
                </div>
                <div class="form-group col-md-3">
                    <label for="height">Height (cm)</label>
                    <input type="number" class="form-control" id="height" name="height" placeholder="Height" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="weight">Weight (kg)</label>
                    <input type="number" class="form-control" id="weight" name="weight" placeholder="Weight" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="citizenship">Citizenship</label>
                    <input type="text" class="form-control" id="citizenship" value="<?= $result['citizenship'] ?>" disabled required>
                </div>
                <div class="form-group col-md-6">
                    <label for="icrNo">I.C.R No. (If an Alien)</label>
                    <input type="text" class="form-control" id="icrNo" name="icrNo" placeholder="ICR No.">
                </div>
            </div>
            <div class="form-group">
                <label for="placeOfBirth">Place of Birth</label>
                <input type="text" class="form-control" id="placeOfBirth" name="placeOfBirth" placeholder="Place of Birth" value="<?= $result['municipality'] ?>" required>
            </div>
            <div class="form-group">
                <label for="dateOfBirth">Date of Birth (mm/dd/yyyy): </label>
                <input type="date" class="form-control" id="dateOfBirth" name="placeOfBirth" value="<?= $result['date_of_birth'] ?>" disabled>
            </div>
            <div class="form-group">
                <label for="profession">Profession or Occupation</label>
                <input type="text" class="form-control" id="profession" name="profession" placeholder="Profession or Occupation">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="gender">Gender</label>
                    <select class="form-control" id="gender" name="gender" required>
                        <option value="MALE">MALE</option>
                        <option value="FEMALE">FEMALE</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="civilStatus">Civil Status</label>
                    <select class="form-control" id="civilStatus" name="civilStatus" required>
                        <option value="SINGLE">SINGLE</option>
                        <option value="MARRIED">MARRIED</option>
                        <option value="WIDOWED">WIDOWED</option>
                        <option value="LEGALLY SEPARATED">LEGALLY SEPARATED</option>
                        <option value="DIVORCED">DIVORCED</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
            <label for="annualIncome">Annual Income</label>
            <div class="input-group mb-3">
                    <span class="input-group-text">₱</span>
                    <input type="text" class="form-control" name="annualIncome" aria-label="Dollar amount (with dot and two decimal places)">
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        </div>


    </main><!-- End #main -->

    <script src="../assets/js/script.js"></script>

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; <strong><span></span></strong>All Rights Reserved 2023
        </div>
        <div class="credits">

        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->    
    <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/chart.js/chart.umd.js"></script>
    <script src="../assets/vendor/echarts/echarts.min.js"></script>
    <script src="../assets/vendor/quill/quill.min.js"></script>
    <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="../assets/vendor/php-email-form/validate.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Template Main JS File -->
    <script src="../assets/js/main.js"></script>

    <script src="
https://cdn.jsdelivr.net/npm/sweetalert2@11.12.3/dist/sweetalert2.all.min.js
"></script>


    <!-- Script -->
    <script>
        
    </script>


</body>

</html>
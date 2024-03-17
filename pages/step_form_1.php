<?php
require_once('../config/config.php');

session_start();
$user_id = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $middle_name = $_POST['middle_name'];
    $citizenship = $_POST['citizenship'];
    $date_of_birth = $_POST['date_of_birth'];
    $gender = $_POST['gender'];
    $weight = $_POST['weight'];
    $height = $_POST['height'];
    $civil_status = $_POST['civil_status'];

    $stmt = $db->prepare("SELECT user_id FROM personal_details WHERE user_id = :user_id");
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();
    $personal_details = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($personal_details) {
        $stmt = $db->prepare("UPDATE personal_details SET
                                first_name = :first_name,
                                last_name = :last_name,
                                middle_name = :middle_name,
                                citizenship = :citizenship,
                                date_of_birth = :date_of_birth,
                                gender = :gender,
                                weight = :weight,
                                height = :height,
                                civil_status = :civil_status
                            WHERE user_id = :user_id");
    } else {
        $stmt = $db->prepare("INSERT INTO personal_details 
                                (user_id, first_name, last_name, middle_name, citizenship, date_of_birth, gender, weight, height, civil_status) 
                            VALUES 
                                (:user_id, :first_name, :last_name, :middle_name, :citizenship, :date_of_birth, :gender, :weight, :height, :civil_status)");
    }

    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':first_name', $first_name);
    $stmt->bindParam(':last_name', $last_name);
    $stmt->bindParam(':middle_name', $middle_name);
    $stmt->bindParam(':citizenship', $citizenship);
    $stmt->bindParam(':date_of_birth', $date_of_birth);
    $stmt->bindParam(':gender', $gender);
    $stmt->bindParam(':weight', $weight);
    $stmt->bindParam(':height', $height);
    $stmt->bindParam(':civil_status', $civil_status);

    $stmt->execute();

    header("Location: step_form_2.php");
} else {
    $stmt = $db->prepare("SELECT * FROM personal_details WHERE user_id = :user_id");
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();
    $personal_details = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($personal_details) {
        $first_name = $personal_details['first_name'];
        $last_name = $personal_details['last_name'];
        $middle_name = $personal_details['middle_name'];
        $citizenship = $personal_details['citizenship'];
        $date_of_birth = $personal_details['date_of_birth'];
        $gender = $personal_details['gender'];
        $weight = $personal_details['weight'];
        $height = $personal_details['height'];
        $civil_status = $personal_details['civil_status'];
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

            <form action="step_form_1.php" method="post">
                <div class="form first">
                    <div class="details personal">
                        <span class="title">Personal Details</span>

                        <div class="fields">
                            <div class="input-field">
                                <label>Last Name</label>
                                <input name="last_name" type="text" placeholder="Enter your Last name" value="<?php echo $last_name; ?>" required>
                            </div>

                            <div class="input-field">
                                <label>First Name</label>
                                <input name="first_name" type="text" placeholder="Enter First name" value="<?php echo $first_name; ?>" required>
                            </div>

                            <div class="input-field">
                                <label>Middle Name</label>
                                <input name="middle_name" type="text" placeholder="Enter Middle Name" value="<?php echo $middle_name; ?>">
                            </div>

                            <div class="input-field">
                                <label>Gender</label>
                                <select required name="gender" id="gender">
                                    <option value="" disabled hidden>Choose a gender</option>
                                    <option value="male" <?php if ($gender === 'male') echo 'selected'; ?>>Male</option>
                                    <option value="female" <?php if ($gender === 'female') echo 'selected'; ?>>Female</option>
                                </select>
                            </div>

                            <div class="input-field">
                                <label>Citizenship</label>
                                <input name="citizenship" type="text" placeholder="Enter your Citizenship" value="<?php echo $citizenship; ?>" required>
                            </div>

                            <div class="input-field">
                                <label>Date of Birth</label>
                                <input name="date_of_birth" type="date" placeholder="Enter birth date" value="<?php echo $date_of_birth; ?>" required>
                            </div>

                            <div class="input-field">
                                <label>Civil Status</label>
                                <input name="civil_status" type="text" placeholder="Enter Civil Status" value="<?php echo $civil_status; ?>" required>
                            </div>

                            <div class="input-field">
                                <label>Height</label>
                                <input name="height" type="text" placeholder="Enter your height" value="<?php echo $height; ?>" required>
                            </div>

                            <div class="input-field">
                                <label>Weight</label>
                                <input name="weight" type="text" placeholder="Enter your weight" value="<?php echo $weight; ?>" required>
                            </div>
                        </div>


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
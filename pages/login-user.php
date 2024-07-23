<?php

require_once('../config/config.php');

session_start();

if (isset($_SESSION['user_id'])){
    header('Location: dashboard.php');
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["username"]) && isset($_POST["password"]) && !empty($_POST["username"]) && !empty($_POST["password"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $stmt = $db->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            
            if (intval($user['role']) === 1){
                    $_SESSION["user_id"] = $user['id'];
                    $_SESSION["username"] = $username;
                    $_SESSION["verified"] = $user['verified'];
                    header("Location: profile.php");
                    exit;
            }

            else if (intval($user['role']) === 2){
                    $_SESSION["user_id"] = $user['id'];
                    $_SESSION["username"] = $username;
                    $_SESSION["verified"] = $user['verified'];
                    header("Location: ../admin/index.php");
                    exit;
            }

            else if (intval($user['role']) === 3){
                $_SESSION["user_id"] = $user['id'];
                $_SESSION["username"] = $username;
                $_SESSION["verified"] = $user['verified'];
                header("Location: ../admin/index.php");
                exit;
            }



        } else {
            $message = "Invalid username or password";
        }
    } else {
        $message = "Please enter username and password";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Login</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="../assets/img/E.png" rel="icon">
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
    <link href="../assets/css/login.css" rel="stylesheet">
</head>

<body>
    <main>


    <?php if (isset($_SESSION['message']) === true) : ?>

        <div class="toast-container top-0 end-0 p-3">
        <div id="welcomeToast" data-example-toggle="toast" class="toast text-bg-success" role="alert">
        <div class="toast-body">
            <div class="d-flex">
            <span><i class="fa-solid fa-circle-check fa-lg"></i></span>
            <div class="d-flex flex-grow-1 align-items-center justify-content-center">
                <span class="fw-semibold">Account Created</span>
                🎉
            </div>
            <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
        </div>
        </div>

    <?php
        endif; 
    ?>


        <div class="container">
            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <div class="d-flex justify-content-center py-4">
                                <a href="../index.php" class="logo d-flex align-items-center w-auto">
                                    <img src="../assets/img/E.png" alt="">
                                    <span class="d-none d-lg-block">eCedula</span>
                                </a>
                            </div>
                            <div class="tagline">
                                <p>Community Tax Certificate.</p>
                            </div>
                            <!-- End Logo -->

                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                                        <p class="text-center small">Enter your username & password to login</p>
                                    </div>

                                    <form action="login-user.php" method="post" class="row g-3 needs-validation" novalidate>

                                        <div class="col-12">
                                            <label for="yourUsername" class="form-label">Username</label>
                                            <div class="input-group has-validation">
                                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                                <input type="text" name="username" class="form-control" id="yourUsername" required>
                                                <div class="invalid-feedback">Please enter your username.</div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label for="yourPassword" class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control" id="yourPassword" required>
                                            <div class="invalid-feedback">Please enter your password!</div>
                                        </div>


                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                                                <label class="form-check-label" for="rememberMe">Remember me</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" type="submit">Login</button> <!--butangan ug MATA nga icon-->
                                        </div>

                                        <?php if (isset($message)) { ?>
                                            <div class="alert alert-danger"><?php echo $message; ?></div>
                                        <?php } ?>

                                        <div class="col-12">
                                            <p class="small mb-0">Don't have account? <a href="register-user.php">Create an account</a></p>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </section>

        </div>
    </main><!-- End #main -->

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


     <script>
            let message = <?= isset($_SESSION['message']) ? $_SESSION['message'] : false; ?>; 

            // Get the toast element
            const toastEl = document.getElementById('welcomeToast');

            // Initialize the toast (Bootstrap's way of activating it)
            const toast = new bootstrap.Toast(toastEl);

            // Auto-show if the message is true
            if (message) {
             toast.show();
            }

            // Auto-hide
            setTimeout(() => {
            toast.hide();
            }, 3000); 

     </script>

     <?php 
        unset($_SESSION['message']);    
     ?>
    
</body>

</html>
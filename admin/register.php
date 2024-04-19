<?php
require_once('../config/config.php');

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  if (empty($firstname) || empty($lastname) || empty($email) || empty($password)) {
    $message = 'All fields are required.';
  } else {

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $checkEmailStmt = $db->prepare("SELECT * FROM admins WHERE email = ?");
    $checkEmailStmt->execute([$email]);
    $existingEmail = $checkEmailStmt->fetch();

    if ($existingEmail) {
      $message = 'Email already exists.';
    } else {
      $sql = "INSERT INTO admins (firstname, lastname, email, password ) VALUES(?,?,?,?)";
      $stmtinsert = $db->prepare($sql);
      $result = $stmtinsert->execute([$firstname, $lastname, $email, $hashedPassword]);

      if ($result) {
        header("Location: login.php");
        exit;
      } else {
        $message = 'There were errors while saving the data.';
      }
    }
  }
}

include "includes/header.php";
?>

<div class="container">

  <!-- Outer Row -->
  <div class="row justify-content-center">

    <div class="col-xl-6 col-lg-6 col-md-6">

      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row">
            <div class="col-lg-12">
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">Register</h1>
                </div>

                <form class="user" action="register.php" method="POST">

                  <div class="form-group">
                    <input type="text" name="firstname" class="form-control form-control-user" placeholder="Enter First Name">
                  </div>
                  <div class="form-group">
                    <input type="text" name="lastname" class="form-control form-control-user" placeholder="Enter Last Name">
                  </div>

                  <div class="form-group">
                    <input type="email" name="email" class="form-control form-control-user" placeholder="Enter Email Address...">
                  </div>

                  <div class="form-group">
                    <input type="password" name="password" class="form-control form-control-user" placeholder="Password">
                  </div>

                  <button type="submit" name="login_btn" class="btn btn-primary btn-user btn-block" id="register" name="create"> Register </button>
                  <hr>
                </form>

                <?php if (isset($message)) { ?>
                  <div class="alert alert-danger small"><?php echo $message; ?></div>
                <?php } ?>



              </div>
            </div>
          </div>
        </div>
      </div>

  

</div>


<?php include "includes/scripts.php";
?>
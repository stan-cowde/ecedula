<?php 

session_start();
require_once '../config/config.php';

$id = $_SESSION['user_id'];

try {
    // Prepare and sanitize inputs
    $fullName = filter_var($_POST['fullName'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $barangay = filter_var($_POST['barangay'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $address = filter_var($_POST['address'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $tin = isset($_POST['tin']) ? filter_var($_POST['tin'], FILTER_SANITIZE_FULL_SPECIAL_CHARS) : NULL;
    $height = floatval($_POST['height']);
    $weight = floatval($_POST['weight']);
    $citizenship = filter_var($_POST['citizenship'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $icr_no = isset($_POST['icrNo']) ? filter_var($_POST['icrNo'], FILTER_SANITIZE_FULL_SPECIAL_CHARS) : NULL;
    $place_of_birth = filter_var($_POST['placeOfBirth'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $profession = isset($_POST['profession']) ? filter_var($_POST['profession'], FILTER_SANITIZE_FULL_SPECIAL_CHARS) : NULL;
    $gender = filter_var($_POST['gender'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $civil_status = filter_var($_POST['civilStatus'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $annual_income = floatval($_POST['annualIncome']);
    $cedula_number = generateCedulaNumber();

    // Validate required fields
    if (empty($barangay) || empty($address) || empty($height) || empty($weight) || empty($place_of_birth) || empty($gender) || empty($civil_status)) {
        die("Please fill in all required fields.");
    }

    // Prepare and execute SQL statement
    $sql = "INSERT INTO cedula_form (user_id, cedula_number, citizenship, fullName, barangay, address, tin, height, weight, icr_no, place_of_birth, profession, gender, civil_status, annual_income) 
            VALUES (:user_id, :cedula_number, :citizenship, :fullName, :barangay, :address, :tin, :height, :weight, :icr_no, :place_of_birth, :profession, :gender, :civil_status, :annual_income)";

    $stmt = $db->prepare($sql);
    $stmt->bindParam(':user_id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':citizenship', $citizenship, PDO::PARAM_STR);
    $stmt->bindParam(':cedula_number', $cedula_number, PDO::PARAM_STR);
    $stmt->bindParam(':fullName', $fullName, PDO::PARAM_STR);
    $stmt->bindParam(':barangay', $barangay, PDO::PARAM_STR);
    $stmt->bindParam(':address', $address, PDO::PARAM_STR);
    $stmt->bindParam(':tin', $tin, PDO::PARAM_STR);
    $stmt->bindParam(':height', $height, PDO::PARAM_STR);
    $stmt->bindParam(':weight', $weight, PDO::PARAM_STR);
    $stmt->bindParam(':icr_no', $icr_no, PDO::PARAM_STR);
    $stmt->bindParam(':place_of_birth', $place_of_birth, PDO::PARAM_STR);
    $stmt->bindParam(':profession', $profession, PDO::PARAM_STR);
    $stmt->bindParam(':gender', $gender, PDO::PARAM_STR);
    $stmt->bindParam(':civil_status', $civil_status, PDO::PARAM_STR);
    $stmt->bindParam(':annual_income', $annual_income, PDO::PARAM_STR);

    if ($stmt->execute()) {
        echo "Form submitted successfully!";
        header("Location: paymongoCheckoutPage.php?amount=" . $annual_income);
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $db->errorInfo()[2];
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}



///////////////////////[For functions]///////
function generateCedulaNumber()
{
    return "TDM" . date("Y") . "-" . uniqid();
}
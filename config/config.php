<?php

$db_user = "root";
$db_pass = "";
$db_name = "useraccounts";

$db = new PDO('mysql:host=localhost;dbname=' . $db_name . ';charset=utf8', $db_user, $db_pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


//helper for csrf validation
function validateCsrfToken($token) {
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}


function totalYearsPaid($user_id){

    global $db;

    $query = "SELECT SUM(amount) as total_years FROM transactions WHERE user_id = :user_id AND status = 'APPROVED'";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
    return $result['total_years'];

}


function totalPaidByCurrentYear($user_id)
{
    global $db;

    $query = "SELECT SUM(amount) as total_paid FROM transactions WHERE user_id = :user_id AND status = 'APPROVED' AND YEAR(created_at) = YEAR(NOW())";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
    return $result['total_paid'];


}
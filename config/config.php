<?php

$db_user = "root";
$db_pass = "";
$db_name = "useraccounts";

$db = new PDO('mysql:host=localhost;dbname=' . $db_name . ';charset=utf8', $db_user, $db_pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


/*
 * List of Variables
 */

$currentYear = date("Y");


//helper for csrf validation
function validateCsrfToken($token) {
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}


/*
 *
 * Note !!!!!
 * This functions is for users only
 */

#for total years paid by applicant
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



/*
 *
 * Note !!!!!
 * This functions is for admin only
 * Like showing analytics or something
 * Basta mao na
 */


#for total applicants
function totalApplicantsActiveThisYear($currentYear = 0){
    global $db;
    global $currentYear;

    try {
        $query = "SELECT COUNT(id) as applicants_active 
                        FROM users WHERE verified = 0
                            AND role = 1
                              AND YEAR(created_at) = :current_year;";


        $stmt = $db->prepare($query);
        $stmt->bindParam(':current_year', $currentYear, PDO::PARAM_INT);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result['applicants_active'];


    } catch (PDOException $e){
        return "Error: " . $e->getMessage();
    }
}

#for total Revenue this year
  function totalRevenueFromPaymentsThisYear($currentYear = 0)
    {

        global $db;
        global $currentYear;

        $query = "SELECT SUM(amount) as total_paid FROM transactions WHERE status = 'APPROVED' AND YEAR(created_at) = :current_year";
        $stmt = $db->prepare($query);
        $stmt->bindParam(":current_year", $currentYear, PDO::PARAM_INT);

        try {

            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return $result['total_paid'];

        }
            catch (PDOException $e){
                return "Error: " . $e->getMessage();
        }

    }

#for total Revenue this year
function totalActiveTaxPayersThisYear($currentYear = 0)
{

    global $db;
    global $currentYear;

    $query = "SELECT count(id) as total_paid 
                FROM transactions 
                    WHERE status = 'APPROVED' 
                        AND amount > 0 
                              AND YEAR(created_at) = :current_year";
    $stmt = $db->prepare($query);
    $stmt->bindParam(":current_year", $currentYear, PDO::PARAM_INT);

    try {

        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result['total_paid'];

    }
    catch (PDOException $e){
        return "Error: " . $e->getMessage();
    }

}

#for total applicants
function totalActiveStaffThisYear($currentYear = 0){
    global $db;
    global $currentYear;

    $query = "SELECT COUNT(id) as staff_active 
                        FROM users WHERE verified = 1
                            AND role = 2
                              AND YEAR(created_at) = :current_year;";


    $stmt = $db->prepare($query);
    $stmt->bindParam(':current_year', $currentYear, PDO::PARAM_INT);

    try {

        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result['staff_active'];


    } catch (PDOException $e){
        return "Error: " . $e->getMessage();
    }
}

#for get Me
function getMonthlyRevenue($currentYear = 0){
    global $db;

    $monthlyRevenue = array_fill_keys(range(1, 12), 0);

    try {
        $query = "SELECT MONTH(created_at) as month, SUM(amount) as total 
                  FROM transactions 
                  WHERE YEAR(created_at) = :year 
                  AND status = 'APPROVED'
                  GROUP BY MONTH(created_at)";

        $stmt = $db->prepare($query);
        $stmt->bindParam(':year', $currentYear, PDO::PARAM_INT);
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $monthlyRevenue[$row['month']] = $row['total'];
        }

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    return array_values($monthlyRevenue);
}



<?php 

require_once '../database.php';

header('Content-Type: application/json');

$input = json_decode(file_get_contents('php://input'), true);

if (isset($input['id'])) {
    $userId = $input['id'];

    try {
        // Query to fetch user details
        $query = "SELECT * FROM users WHERE id = :id";
        $stmt = $db->prepare($query);
        $stmt->bindValue(':id', $userId, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($row) > 0) {
            $user = $row[0];
            echo json_encode($user);
        } else {
            echo json_encode(['error' => 'No user found.']);
        }
    } catch (PDOException $e) {
        echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['error' => 'Invalid request.']);
}

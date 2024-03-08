<?php
require_once '../Model/db.php';
if (isset($_GET['date'])) {
    $query = "SELECT DATE_FORMAT(ApptTime, '%k:%i') as ApptTime FROM customers WHERE DATE(ApptTime) = :date";// %k:%i removes leading zero, matching our JS times
    $stmt = $db->prepare($query);
    $stmt->execute([':date' => $_GET['date']]);
    $bookedTimes = $stmt->fetchAll(PDO::FETCH_COLUMN);
    echo json_encode($bookedTimes); 
} else {
    echo json_encode([]);
}
?>
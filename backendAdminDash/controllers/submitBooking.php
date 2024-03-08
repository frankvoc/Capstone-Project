<?php
require_once '../Model/db.php';

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$phone = $_POST['phone']; //pre "cleaned" phone #
$jobDescription = $_POST['jobDescription'];
$selectedDate = $_POST['selectedDate'];
$selectedTimeSlot = $_POST['selectedTimeSlot'];
//same logic used in form, replacing $phone with clean digits only
$phoneDigitsOnly = preg_replace('/\D/', '', $phone);
//also checking before we move into DB
if (strlen($phoneDigitsOnly) !== 10) {
    die("Error: Phone number must contain exactly 10 digits.");
}
//combining date and time into 1 $apptTime
$apptTime = date('Y-m-d H:i:s', strtotime("$selectedDate $selectedTimeSlot"));
try {
    $query = "INSERT INTO customers (FirstName, LastName, ApptTime, Email, PhoneNum, JobDesc) VALUES (:firstName, :lastName, :apptTime, :email, :phone, :jobDescription)";
    $stmt = $db->prepare($query);
    $stmt->execute([
        ':firstName' => $firstName,
        ':lastName' => $lastName,
        ':apptTime' => $apptTime,
        ':email' => $email,
        ':phone' => $phoneDigitsOnly,
        ':jobDescription' => $jobDescription,
    ]);
    echo "success";
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>

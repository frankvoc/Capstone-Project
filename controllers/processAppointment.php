<?php

include '../model/db.php';
if ($_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest') {
    //AJAX request
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $jobDescription = $_POST['jobDescription'];
    $apptTime = $_POST['apptTime'];

    //start of statement
    $stmt = $pdo->prepare("INSERT INTO customers (FirstName, LastName, Email, PhoneNum, JobDesc, ApptTime) VALUES (?, ?, ?, ?, ?, ?)");
    
    //execute or deny request
    if ($stmt->execute([$firstName, $lastName, $email, $phone, $jobDescription, $apptTime])) {
        echo json_encode(['status' => 'success', 'message' => 'Appointment booked successfully.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to book the appointment.']);
    }
} else {
    //error message
    http_response_code(403);
    echo "Forbidden";
}
?>
<?php
require_once '../Model/db.php';
use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\Exception; 
require '../phpmailer/src/Exception.php'; 
require '../phpmailer/src/PHPMailer.php';
require '../phpmailer/src/SMTP.php'; 

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

    // Email sending part
    $mail = new PHPMailer(true); 
    $mail->isSMTP(); 
    $mail->Host = 'smtp.gmail.com'; 
    $mail->SMTPAuth = true; 
    $mail->Username = 'dannycalexandre@gmail.com'; 
    $mail->Password = 'bmtowlhurolxdcic'; 
    $mail->SMTPSecure = "ssl"; 
    $mail->Port = 465; 

    $mail->setFrom('dannycalexandre@gmail.com'); 
    $mail->addAddress($email); 
    $mail->addAddress('dannycalexandre@gmail.com');

    $mail->isHTML(true); 

    $mail->Subject = 'Your Appointment Confirmation'; 
    $mail->Body = 'Dear ' . $firstName . ',<br><br>Your appointment has been successfully scheduled.<br><br>Appointment Details:<br>Date: ' . $selectedDate . '<br>Time: ' . $selectedTimeSlot . '<br><br>Thank you!'; 

    $mail->send(); 

    echo "success";
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>

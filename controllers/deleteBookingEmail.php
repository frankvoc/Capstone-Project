<?php
require_once '../Model/db.php';
use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\Exception; 

require 'phpmailer/src/Exception.php'; 
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php'; 

if(isset($_POST["deleteCustomer"])){ 
    $Customer_ID = filter_input(INPUT_POST, 'Customer_ID');
    $email = deleteCustomer($Customer_ID);
    if ($email) { // If email is retrieved successfully
        // Your email sending code goes here
        // Ensure $email contains a valid email address before sending the email
          // Create a new PHPMailer instance
        $mail = new PHPMailer(true); 

        try {
            // SMTP configuration
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
            // Email content
            $mail->isHTML(true); 
            $mail->Subject = 'Your Appointment has been cancelled'; 
            $mail->Body = 'For more information, please contact us at 123-456-7890.'; 

            // Send email
            $mail->send(); 

            echo "Email sent successfully!";
        } catch (Exception $e) {
            echo "Email sending failed. Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "Error: Customer's email not found or data was not deleted.";
    }

}
?> 
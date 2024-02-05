<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get data from form  
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $message = isset($_POST['message']) ? $_POST['message'] : '';
    
    $to = "wingo6590@gmail.com";
    $subject = "This is the subject line";
    
    // The following text will be sent
    $txt = "Name = " . $name . "\r\n  Email = " . $email . "\r\n Message = " . $message;
    
    $headers = "From: noreply@demosite.com" . "\r\n" .
               "CC: somebodyelse@example.com";

    if($email) {
        mail($to, $subject, $txt, $headers);
        // Redirect to thank you page
        header("Location: last.html");
        exit;
    }
}
?>
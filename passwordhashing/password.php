<?php
require 'model/db.php';

//replace values below with corresponding email and password
$email = "Tom@email.com"; 
$plainTextPassword = "Duck"; //plain text--> hashed password

$hashedPassword = password_hash($plainTextPassword, PASSWORD_DEFAULT);

//SQL statement to update the users password
$sql = "UPDATE adminlogin SET adminpassword = :hashedPassword WHERE adminemail = :email";
$stmt = $pdo->prepare($sql);
$stmt->execute(['hashedPassword' => $hashedPassword, 'email' => $email]);

echo "Password updated successfully.";
?>
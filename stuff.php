
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include (__DIR__ . '/Model/model_clients.php');

$error = "";


if(isset($_GET['action'])){
  $action = filter_input(INPUT_GET, 'action');
  $id = filter_input(INPUT_GET, 'Customer_ID');

  if($action == "Update"){
      $Customer = getCustomer($id);
      $FirstName = $Customer['FirstName'];
      $LastName = $Customer['LastName'];
  }else{
      $FirstName = "";
      $LastName = "";
  }

}elseif (isset($_POST['update_customer'])){
  $action = filter_input(INPUT_POST, 'action');
  $id = filter_input(INPUT_GET, 'Customer_ID');
  $FirstName = filter_input(INPUT_POST, 'FirstName');
  $LastName = filter_input(INPUT_POST, 'LastName');

  updateCustomer($Customer_ID, $FirstName, $LastName);
  header('Location: adminDashboard.php');

}elseif (isset($_POST['Add_customer'])){
  $action = filter_input(INPUT_POST, 'action');
  $FirstName = filter_input(INPUT_POST, 'FirstName');
  $LastName = filter_input(INPUT_POST, 'LastName');
  
  AddCustomer($FirstName, $LastName);
  header('Location: adminDashboard.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Appointment</title>
</head>
<body>

<h2><?= $action; ?> Edit Customer</h2>
<form name="customer" method="post" action="edit_App.php">
<div class="wrapper">
            <input type="hidden" name="Customer_ID" value="<?= $id; ?>" />
            <div class="label">
                <label>First Name:</label>
            </div>
            <div>
                <input type="text" name="FirstName" value="<?= $FirstName; ?>" />
            </div>
            <div class="label">
                <label>Last Name:</label>
            </div>
            <div>
                <input type="text" name="LastName" value="<?= $LastName; ?>" />
            </div>
            <div>
                &nbsp;
            </div>
            <div>
                <!-- WE CAN USE OUR 'ACTION' VALUE FROM THE GET RESULT TO MANIPULATE THE FORM! -->
                <input type="submit" name="<?= $action; ?>" value="<?= $action; ?> Appointment Information" />
            </div>
           
        </div>






    }elseif (isset($_POST['Add_team'])){
        $action = filter_input(INPUT_POST, 'action');
        $FirstName = filter_input(INPUT_POST, 'FirstName');
        $LastName = filter_input(INPUT_POST, 'LastName');
        $ApptTime = filter_input(INPUT_POST, 'ApptTime');
        $Stat = filter_input(INPUT_POST, 'Stat');
        $Email = filter_input(INPUT_POST, 'Email');
        $PhoneNum = filter_input(INPUT_POST, 'PhoneNum');
        $JobDesc = filter_input(INPUT_POST, 'JobDesc');
        
        addCustomer($Customer_ID, $FirstName, $LastName, $ApptTime, $Stat,  $Email, $PhoneNum, $JobDesc);
        header('Location: adminDashboard.php');
    }
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NFL Teams</title>
</head>
<body>
    

<?php 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    include __DIR__ . '/Model/model_clients.php';
    
    $error = "";


    //IF COMING FROM A GET REQUEST, ASSIGN OUR ACTION AND ID!
    if(isset($_GET['action'])){
        $action = filter_input(INPUT_GET, 'action');
        $Customer_ID = filter_input(INPUT_GET, 'Customer_ID');

        if($action == "Update"){
            $customer = getCustomer($Customer_ID);
            $FirstName = $customer["FirstName"];
            $LastName = $customer['LastName'];
            $ApptTime = $customer['ApptTime'];
            $Stat = $customer['Stat'];
            $Email = $customer['Email']; 
            $PhoneNum = $customer["PhoneNum"];
            $JobDesc = $customer["JobDesc"]; 
        }else{
            $FirstName = "";
            $LastName = "";
            $ApptTime = ""; 
            $Stat = ""; 
            $Email = ""; 
            $PhoneNum = "";
            $JobDesc = ""; 
        }

        //UPDATE TEAM WAS SUBMITTED IN FORM -> GRAB SUBMITTED VALUES AND PASS TO THE updateTeam() METHOD!
    }elseif (isset($_POST['Update_Customer'])){
        $action = filter_input(INPUT_POST, 'action');
        $Customer_ID = filter_input(INPUT_POST, 'Customer_ID');
        $FirstName = filter_input(INPUT_POST, 'FirstName');
        $LastName = filter_input(INPUT_POST, 'LastName');
        $ApptTime = filter_input(INPUT_POST, 'ApptTime');
        $Stat = filter_input(INPUT_POST, 'Stat');
        $Email = filter_input(INPUT_POST, 'Email');
        $PhoneNum = filter_input(INPUT_POST, 'PhoneNum');
        $JobDesc = filter_input(INPUT_POST, 'JobDesc');


        updateCustomer($Customer_ID, $FirstName, $LastName, $ApptTime, $Stat,  $Email, $PhoneNum, $JobDesc);
        header('Location: adminDashboard.php');

        //ADD TEAM WAS SUBMITTED IN FORM -> GRAB SUBMITTED VALUES AND PASS TO THE addTeam() METHOD!
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

?>

    <style type="text/css">
       .wrapper {
            display: grid;
            grid-template-columns: 180px 400px;
        }
        .label {
            text-align: right;
            padding-right: 10px;
            margin-bottom: 5px;
        }
        label {
           font-weight: bold;
        }
        input[type=text] {width: 200px;}
        .error {color: red;}
        div {margin-top: 5px;}
    </style>

    <!-- ADD TEAM FORM -->
    <h2><?= $action; ?> NFL Team</h2>

    <form name="customer" method="post" action="edit_App.php">
        
        <!--FORM-->
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

            <div class="label">
                <label>Appoitment Time:</label>
            </div>
            <div>
                <input type="datetime" name="ApptTime" value="<?= $ApptTime; ?>" />
            </div>

            <div class="label">
                <label>Status:</label>
            </div>
            <div>
                <input type="text" name="Status" value="<?= $Stat; ?>" />
            </div>

            <div class="label">
                <label>Email:</label>
            </div>
            <div>
                <input type="text" name="Email" value="<?= $Email; ?>" />
            </div>

            <div class="label">
                <label>Phone Number:</label>
            </div>
            <div>
                <input type="text" name="PhoneNum" value="<?= $PhoneNum; ?>" />
            </div>

            <div class="label">
                <label>Job Description:</label>
            </div>
            <div>
                <input type="text" name="JobDesc" value="<?= $JobDesc; ?>" />
            </div>



            <div>
                &nbsp;
            </div>
            <div>
                <!-- WE CAN USE OUR 'ACTION' VALUE FROM THE GET RESULT TO MANIPULATE THE FORM! -->
                <input type="submit" name="Update_Customer" value = "Update Information" />
            </div>
           
        </div>

       
    </form>
    <p>
       
    </p>


    </body>
</html>
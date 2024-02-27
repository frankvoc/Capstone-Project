<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Info</title>
</head>
<body>
    

<?php 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    include (__DIR__ . '/Model/model_clients.php');


    //IF COMING FROM A GET REQUEST, ASSIGN OUR ACTION AND ID!
    if(isset($_GET['action'])){
        $action = filter_input(INPUT_GET, 'action');
        $Customer_ID = filter_input(INPUT_GET, 'Customer_ID');

        if($action == "Update"){
            $cust = getCustomers($Customer_ID);
            $FirstName = $cust["FirstName"];
            $LastName = $cust['LastName'];
            $ApptTime = $cust["ApptTime"];
            $Stat = $cust["Stat"];
            $Email = $cust["Email"];
            $PhoneNum = $cust["PhoneNum"];
            $JobDesc = $cust["JobDesc"];
        }else{
            $FirstName = "";
            $LastName = "";
        }

        //UPDATE TEAM WAS SUBMITTED IN FORM -> GRAB SUBMITTED VALUES AND PASS TO THE updateTeam() METHOD!
    }elseif (isset($_POST['updateCustomer'])){
        $action = filter_input(INPUT_GET, 'action');
        $Customer_ID = filter_input(INPUT_GET, 'Customer_ID');
        $FirstName = filter_input(INPUT_POST,'FirstName');
        $LastName =  filter_input(INPUT_POST,'LastName');
        $ApptTime = filter_input(INPUT_POST,'ApptTime');
        $Stat = filter_input(INPUT_POST,'Stat');
        $Email = filter_input(INPUT_POST,'Email');
        $PhoneNum = filter_input(INPUT_POST,'PhoneNum');
        $JobDesc = filter_input(INPUT_POST,'JobDesc');

        updateCustomer($Customer_ID, $FirstName, $LastName, $ApptTime, $Stat, $Email, $PhoneNum, $JobDesc);
        header('Location: adminDashboard.php');
    }elseif (isset($_POST['Add_team'])){
        $action = filter_input(INPUT_GET, 'action');
        $Customer_ID = filter_input(INPUT_GET, 'Customer_ID');
        $FirstName = filter_input(INPUT_POST,'FirstName');
        $LastName =  filter_input(INPUT_POST,'LastName');
        $ApptTime = filter_input(INPUT_POST,'ApptTime');
        $Stat = filter_input(INPUT_POST,'Stat');
        $Email = filter_input(INPUT_POST,'Email');
        $PhoneNum = filter_input(INPUT_POST,'PhoneNum');
        $JobDesc = filter_input(INPUT_POST,'JobDesc');
        
        addTeam($Customer_ID, $FirstName, $LastName, $ApptTime, $Stat, $Email, $PhoneNum, $JobDesc);
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
    <h2><?= $action; ?> Appointment</h2>

    <form name="client" method="post" action="editClient.php">
        
        <!--FORM-->
        <div class="wrapper">
            <input type="hidden" name="Customer_ID" value="<?= $Customer_ID; ?>" />
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
                <input type="submit" name="<?= $action; ?>_client" value="<?= $action; ?> Team Information" />
            </div>
           
        </div>

       
    </form>

    </body>
</html>
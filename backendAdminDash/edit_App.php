
<?php
    include (__DIR__ . '/Model/model_clients.php');
    session_start();

    if(isset($_POST['deleteCustomer'])){
        $Customer_ID = filter_input(INPUT_POST, 'Customer_ID');
        deleteCustomer($id);
    }

    $customers = getCustomers();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Appointment Editor</title>
</head>
<body>


<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
   
    $error = "";
    $action = "";


    if(isset($_GET['Customer_ID'])){
        $Customer_ID = filter_input(INPUT_GET, 'Customer_ID', FILTER_SANITIZE_NUMBER_INT);
            $customer = getCustomer($Customer_ID);
            $FirstName = $customer["FirstName"];
            $LastName = $customer['LastName'];
        }
        else{
            $FirstName = "";
            $LastName = "";
        }

       
    if (isset($_POST['updateCustomer'])){
        $Customer_ID = filter_input(INPUT_POST, 'Customer_ID');
        $FirstName = filter_input(INPUT_POST, 'FirstName');
        $LastName = filter_input(INPUT_POST, 'LastName');
       
        updateCustomer($Customer_ID, $FirstName, $LastName);
        header('Location: adminDashboard.php');

 
    }if (isset($_POST['addCustomer'])){
        $FirstName = filter_input(INPUT_POST, 'FirstName');
        $LastName = filter_input(INPUT_POST, 'LastName');
       
        addCustomer($Customer_ID, $FirstName, $LastName);
        header('Location: adminDashboard.php');
    }
?>

<style type="text/css">
       .wrapper {
            display: grid;
            grid-template-columns: 180px 500px;
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
        html {
            height: 100%;
        }
        body {
            margin:0;
            padding:0;
            font-family: sans-serif;
            background: linear-gradient(#141e30, #243b55);
        }
        #nav-item{
            background: #fff;
       padding-left: 16px;
       padding-right: 16px;
       border-bottom: 1px solid #dfe3e8;
       border-radius: 0;
        }
        <style>
        body {
        font-family: sans-serif;
        background: linear-gradient(#141e30, #243b55);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
        margin: 0;
    }
    form {
        max-width: 400px;
        margin: 20px auto;
    }
    h2, label {
        color: white;
        text-align: center;
        display: block;
        margin-bottom: 5px;
    }
    input {
        width: 100%;
        padding: 8px;
        margin-bottom: 15px;
        box-sizing: border-box;
    }
    input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        cursor: pointer;
    }
    input[type="submit"]:hover {
        background-color: #45a049;
    }
    ul.error-message {
        list-style-type: none;
        margin: 0;
        padding: 0;
        color: red;
    }
    </style>
       
    </style>



<h2>Edit Appointment</h2>




<form name="customers" method="post" action="editApp.php?Customer_ID=<?= $Customer_ID; ?>">
    <!-- FORM -->

    <div class="wrapper">
        <input type="hidden" name="Customer_ID" value="<?= $Customer_ID; ?>" />
        <div class="label">
            <label>First Name</label>
        </div>

        <div>
            <input type="text" name="FirstName" value="<?= $FirstName; ?>" />
        </div>
        <div class="label">
            <label>Last Name</label>
        </div>
        <div>
            <input type="text" name="LastName" value="<?= $LastName; ?>" />
        </div>

        <div>
            &nbsp;
        </div>

        <div>
           
            <input type="submit" name="updateCustomer" value="Update Appointment Information" />
        </div>

        <div>
            <a href="adminDashboard.php"><input type="button" value="View Inventory"></a>
        </div>
       
    </div>

</form>
   
</body>
</html>
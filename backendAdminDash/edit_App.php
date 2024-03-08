

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
    }elseif (isset($_POST['Add_Customer'])){
            $action = filter_input(INPUT_POST, 'action');
            $FirstName = filter_input(INPUT_POST, 'FirstName');
            $LastName = filter_input(INPUT_POST, 'LastName');
            $ApptTime = filter_input(INPUT_POST, 'ApptTime');
            $Stat = filter_input(INPUT_POST, 'Stat');
            $Email = filter_input(INPUT_POST, 'Email');
            $PhoneNum = filter_input(INPUT_POST, 'PhoneNum');
            $JobDesc = filter_input(INPUT_POST, 'JobDesc');
            
            addCustomer($FirstName, $LastName, $ApptTime, $Stat,  $Email, $PhoneNum, $JobDesc);
            header('Location: adminDashboard.php');
        }


?>

<!DOCTYPE html>
<html lang="en">
<head>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Le couturier</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Island+Moments&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Italiana&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Jacques+Francois&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="edit.css"> 
  <link rel="stylesheet" href="assets/css/styles.css">
</head>
<main> 
    <title>Edit Appoitment</title>
</head>
<body>
<header> 
          <img src="img\Le-Couturier-new 1.png" alt="logo"> 
          <div id ="ltwo">
            <a href="Services.php">
              <button class="bg-white hover:bg-gray-100 text-#152266-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow" style=" color:#152266">
                  Our Services 
                </button></a>
                <a href="adminLogin.php">
                <button class="bg-white hover:bg-gray-100 text-#152266-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow" style=" color: #152266">
                  Sign In 
                </button>
                </a>
                <a href="appointmentPage.php">
                  <button class="bg-white hover:bg-gray-100 text-#152266-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow" style=" color: #152266">
                    Appointments
                  </button>
                  </a>
          </div>
  
</header>
    

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
    <button class="col-sm-offset-1 col-sm-10"><p></p></div>
    <form id="form" name="customer" method="post" action="edit_App.php">
        
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
                <input type="text" name="Stat" value="<?= $Stat; ?>" />
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
        </div>   
    <div id=buttons> 

        <a href="adminDashboard.php"><button class="bg-white hover:bg-gray-100 text-#152266-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow" style=" color: #152266 ">Back</a> 
        <button type="submit" name="Update_Customer" value="update" class="bg-white hover:bg-gray-100 text-#152266-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow" style=" color: #152266">
                  Update Appointment
        </button>
    </div> 
    </form>

    </body>

    </main>
</html>
<?php

//global $db originates from /db.php
include (__DIR__ . '/db.php');
function isPostRequest() {
    return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST' );
}


function login($email, $pass) {
    global $db; 
    $result = [];

    // SQL statement to fetch the admin user
    $stmt = $db->prepare("SELECT * FROM adminlogin WHERE adminemail = :email and adminpassword :pass");
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':pass', $pass);

    if ($stmt->execute() && $stmt->rowCount() > 0) {
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    return $result;
}

function getCustomers($timeFrame = null) {
    global $db;
    $results = [];
    
    // Base SQL statement
    $sql = "SELECT Customer_ID, FirstName, LastName, ApptTime, Stat, Email, PhoneNum, JobDesc FROM customers";
    
    // Determine the time frame condition
    $dateCondition = "";
    switch ($timeFrame) {
        case 'today':
            $dateCondition = " WHERE DATE(ApptTime) = CURDATE()";
            break;
        case 'thisWeek':
            $dateCondition = " WHERE YEARWEEK(ApptTime, 1) = YEARWEEK(CURDATE(), 1)";
            break;
        case 'thisMonth':
            $dateCondition = " WHERE MONTH(ApptTime) = MONTH(CURDATE()) AND YEAR(ApptTime) = YEAR(CURDATE())";
            break;
    }
    
    $sql .= $dateCondition . " ORDER BY Customer_ID ASC";
    
    $stmt = $db->prepare($sql);
    
    if ($stmt->execute() && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    return $results;
}


function addCustomer ($FirstName, $LastName, $ApptTime, $Stat, $Email, $PhoneNum, $JobDesc){
    //grab $db object - 
    //needs global scope since object is coming from outside the function
    global $db;

    //initialize return dataset
    $results = [];

    //prepare our SQL statement
    $sql = "INSERT INTO customers SET FirstName = :t, LastName = :l,ApptTime = :m, Stat = :b, Email = a, PhoneNum = o, JobDesc = x ";
    $stmt = $db->prepare("INSERT INTO Customers SET FirstName = :t, LastName = :l, ApptTime = :m, Stat = :b, Email = a, PhoneNum = o, JobDesc = x");

    //bind our variables
    $binds = array(
        ":t" => $FirstName,
        ":l" => $LastName,
        ":m" => $ApptTime,
        ":b" => $Stat,
        ":a" => $Email,
        ":o" => $PhoneNum,
        ":x" => $JobDesc
    );

    //if our SQL statement reutrns results, populate our results array
    if($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $results = 'Data Added';
    }

    //return our results
    return ($results);
}

function deleteCustomer ($Customer_ID){
    //grab $db object - 
    //needs global scope since object is coming from outside the function
    global $db;

    $results = "Data was not deleted."; 
    $stmt = $db->prepare("SELECT Email FROM customers WHERE Customer_ID = :Customer_ID");
    $stmt->bindValue(':Customer_ID', $Customer_ID);
    $stmt->execute();
    $email = $stmt->fetchColumn(); // Fetch the email associated with the customer


    $stmt = $db->prepare("DELETE FROM customers WHERE Customer_ID = :Customer_ID");

    $stmt->bindValue(':Customer_ID', $Customer_ID);

    if($stmt->execute() && $stmt->rowCount() > 0) {
        $results = $email; 
    }

    return ($results);
}

function updateCustomer ($Customer_ID, $FirstName, $LastName, $ApptTime, $Stat, $Email, $PhoneNum, $JobDesc){
    //grab $db object - 
    //needs global scope since object is coming from outside the function
    global $db;

    //initialize return dataset
    $results = "";

    //prepare our SQL statement
    $sql = "UPDATE customers SET FirstName = :t, LastName = :l, ApptTime= :m, Stat = :b, Email = :a, PhoneNum = :o, JobDesc = :x WHERE Customer_ID = :Customer_ID";
    $stmt = $db->prepare($sql);

    $stmt->bindValue(':Customer_ID', $Customer_ID);
    $stmt->bindValue(':t', $FirstName);
    $stmt->bindValue(':l', $LastName);
    $stmt->bindValue(':m', $ApptTime);
    $stmt->bindValue(':b', $Stat);
    $stmt->bindValue(':a', $Email);
    $stmt->bindValue(':o', $PhoneNum);
    $stmt->bindValue(':x', $JobDesc);

    //if our SQL statement reutrns results, populate our results array
    if($stmt->execute() && $stmt->rowCount() > 0) {
        $results = 'Data Updated';
    }

    //return our results
    return ($results);
}

function getCustomer($Customer_ID){

    global $db;

    $results = [];

    $stmt = $db->prepare("SELECT * FROM customers WHERE Customer_ID = :Customer_ID");
    $stmt->bindValue(':Customer_ID', $Customer_ID);

    if($stmt->execute() && $stmt->rowCount() > 0) {
        $results = $stmt->fetch(PDO::FETCH_ASSOC);
    }

    return ($results);
}


function searchCustomer ($FirstName, $LastName) {
    global $db;
    $binds = array();

    $sql =  "SELECT * FROM  customers WHERE 0=0";

    if ($FirstName != "") {
        $sql .= " AND FirstName LIKE :FirstName";
        $binds['FirstName'] = '%'.$FirstName.'%';
    }

    if ($LastName != "") {
        $sql .= " AND LastName LIKE :LastName";
        $binds['LastName'] = '%'.$LastName.'%';
    }

    $sql .= " ORDER BY FirstName";

    $results = array();

    $stmt = $db->prepare($sql);

    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
         
    return ($results);
}
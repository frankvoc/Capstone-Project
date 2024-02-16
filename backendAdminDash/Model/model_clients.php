<?php

//global $db originates from /db.php
include (__DIR__ . '/db.php');
// var_dump($db);
// exit;


function getCustomer() {
    //grab $db object = 
    //needs global scope since object is coming from outside the function
    global $db;

    //initialize return dataset
    $results = [];

    //prepare our SQL statement
    $stmt = $db->prepare("SELECT Customer_ID, FirstName, LastName, ApptTime, Stat, Email, PhoneNum, JobDesc FROM customers ORDER BY LastName ASC");

    //if our SQL statement reutrns results, populate our results array
    if($stmt->execute() && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //return our results
    return ($results);

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
        ":b" => $Stat
        ":a" => $Email
        ":o" => $PhoneNum
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
    $stmt = $db->prepare("DELETE FROM customer WHERE id = :id");

    $stmt->bindValue(':id', $id);

    if($stmt->execute() && $stmt->rowCount() > 0) {
        $results = "Data was deleted.";
    }

    return ($results);
}

function updateCustomer ($Customer_ID, $FirstName, $LastName, $ApptTime, $Stat){
    //grab $db object - 
    //needs global scope since object is coming from outside the function
    global $db;

    //initialize return dataset
    $results = [];

    //prepare our SQL statement
    $sql = "UPDATE customers SET FirstName = :t, LastName = :l, ApptTime= :m, Stat = :b, Email = a, PhoneNum = o, JobDesc = x WHERE Customer_ID = :id";
    $stmt = $db->prepare($sql);

    $stmt->bindValue(':id', $Customer_ID);
    $stmt->bindValue(':t', $FirstName);
    $stmt->bindValue(':l', $LastName);
    $stmt->bindValue(':m', $ApptTime);
    $stmt->bindValue(':b', $Stat);
    $stmt->bindValue(':a', $Email);
    $stmt->bindValue(':o', $PhoneNum);
    $stmt->bindValue(':x', $JobDesc);

    //if our SQL statement reutrns results, populate our results array
    if($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $results = 'Data Updated';
    }

    //return our results
    return ($results);
}

function getCustomer ($Customer_ID){

    global $db;

    $results = [];

    $stmt = $db->prepare("SELECT * FROM customer WHERE Customer_ID = :id");
    $stmt->bindValue(':id', $id);

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
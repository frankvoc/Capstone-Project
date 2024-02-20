<?php

$config = parse_ini_file('dbconfig.ini');

$db = new PDO(
    "mysql:host=" . $config['servername'] . 
    ";port=" . $config['port'] . 
    ";dbname=" . $config['dbname'], 
    $config['username'], 
    $config['password']);


$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);



try{
    //establish connection
    $dsn = "mysql:host={$config['servername']};port={$config['port']};dbname={$config['dbname']}";
    $pdo = new PDO($dsn, $config['username'], $config['password']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e){
    die("Could not connect: " . $e->getMessage());
}
var_dump($dsn)
?>
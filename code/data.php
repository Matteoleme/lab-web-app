<?php

$query_string = $_SERVER["QUERY_STRING"];
parse_str($query_string,$query);
$barcode_value = $query["barcode"]; 

//create a PHP object
$productObj = new stdClass();
$productObj->productList = array();

//connect database

$db_connection = new mysqli('lab-web-app_db_1', 'user', 'password', 'db');

if($db_connection->connect_error){
    die("connection failed: " . $db_connection->connect_error);
    }

//SELECT

$result = $db_connection->query("SELECT * 
FROM `item` 
WHERE `barcode` = '" . $barcode_value . "'");
if ($result){
    foreach ($result as $row) {
        $item = new stdClass();
        $item->name = $row["name"];
        $item->barcode = $row["barcode"];
        $item->img_url = $row["img_url"];
        $productObj->productList[] = $item;
    }
}

$productJson = json_encode($productObj);

// return the string to the client
header('Content-Type: application/json');
echo $productJson;
//1. create a static PHP object

//2. create object from MySQL SELECT

//last: custom select depending
//on HTTP GET query

//convert it to JSON

#echo "{\"productList\": []}";

?>
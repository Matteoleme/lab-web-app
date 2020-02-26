<?php

//create a PHP object
$productObj = new stdClass();
$productObj->productList = array(new stdClass(),new stdClass());
$productObj->productList[0]->product = "Arduino";
$productObj->productList[0]->price  = 7;
$productObj->productList[1]->product = "Raspberry";
$productObj->productList[1]->price  = 15;

$productJson = json_encode($productObj);

echo $productJson;
//1. create a static PHP object

//2. create object from MySQL SELECT

//last: custom select depending
//on HTTP GET query

//convert it to JSON

#echo "{\"productList\": []}";

?>
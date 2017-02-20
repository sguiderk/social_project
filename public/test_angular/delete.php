<?php

$id = $_GET['id'];
$con = mysql_connect("localhost","root","root");
mysql_select_db("dbAngular");
$sql = "DELETE FROM `dbAngular`.`product` WHERE `product`.`id` ='$id'";
$result = mysql_query($sql);
?>


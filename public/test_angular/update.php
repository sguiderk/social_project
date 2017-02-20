<?php
$data = json_decode(file_get_contents("php://input"));
$id = $data->id;
$name = $data->name;
$company = $data->company;
$con = mysql_connect("localhost","root","root");
mysql_select_db("dbAngular");
$sql = "UPDATE  `dbAngular`.`product` SET  `name` =  '$name',`company` =  '$company' WHERE  `product`.`id` ='$id'";
$result = mysql_query($sql);
?>
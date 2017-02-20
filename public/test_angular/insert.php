<?php
$data = json_decode(file_get_contents("php://input"));
$name = $data->name;
$company = $data->company;
$con = mysql_connect("localhost","root","root");
mysql_select_db("dbAngular");
$sql = "insert into product (name,company) values('$name','$company')";
$result = mysql_query($sql);
?>
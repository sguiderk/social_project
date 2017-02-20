<?php

class Application_Model_Registre
{

public function createUser($array)
{
	$dbTableUser = new  Application_Model_DbTable_User;
	$dbTableUser->insert($array);
}

public function Viewall()
{
	$dbTableUser = new  Application_Model_DbTable_User;
	$dbTableUser->insert($array);
}




}


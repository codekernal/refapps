<?php

$database_cred = array();

if($_SERVER['SERVER_NAME'] == 'vegatechnologies.net')
{
	$web_url = 'http://vegatechnologies.net/refapps/';
	$doc_root = $_SERVER["DOCUMENT_ROOT"]."/refapps/";	
	$database_cred['host'] = 'localhost';
	$database_cred['user'] = 'iqbal89_refapps';
	$database_cred['password'] = 'skyisthelimit';		
	$database_cred['database'] = 'iqbal89_refapps';		
	$fbapp_key = '569437429805231';
	$fbapp_secret = '8992c95b51fb9df6de26bd3d6e8eddb5';	
}
else
{
    $web_url = 'http://localhost/refapps/';
	$doc_root = $_SERVER["DOCUMENT_ROOT"]."/refapps/";
	$database_cred['host'] = 'localhost';
	$database_cred['user'] = 'root';
	$database_cred['password'] = '';
	$database_cred['database'] = 'refapps';
	$fbapp_key = '510521435721725';
	$fbapp_secret = '09cec61ce35f58c0a41815c514330ddd';		
}

//$mysqli = new mysqli($database_cred['host'],$database_cred['user'],$database_cred['password'],$database_cred['database']);




?>
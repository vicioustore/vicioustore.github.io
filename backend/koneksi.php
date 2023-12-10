<?php 
	define('DB_SERVER','localhost');
	define('DB_USER','root');
	define('DB_PASS' ,'');
	define('DB_NAME', 'dbennergy');
	
	$conn = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
	session_start();
	
	//unset($_SESSION['ennergysolutions']);
?>
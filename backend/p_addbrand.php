<?php 
	include_once "koneksi.php";
	if ($_POST)
	{
		$desc = str_replace("'","`",$_POST['desc']);
		mysqli_query($conn,"insert into tblbrand values(null,'', '$_POST[brand]','$desc')");
		echo '<script>alert("brand success added to list !");</script>';
		echo "<script>window.location.href='list-brand.php';</script>";
	}
	else
	{
		echo"<script>window.history.back();</script>";	
	}
?>
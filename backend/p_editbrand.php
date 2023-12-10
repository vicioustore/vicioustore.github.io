<?php 
	include_once "koneksi.php";
	if ($_POST)
	{
		$desc = str_replace("'","`",$_POST['desc']);
		mysqli_query($conn,"update tblbrand set brand='$_POST[brand]', description='$desc' where idbrand=$_POST[idb]");
		echo '<script>alert("brand edit success !");</script>';
		echo "<script>window.location.href='list-brand.php';</script>";
	}
	else
	{
		echo"<script>window.history.back();</script>";	
	}
?>
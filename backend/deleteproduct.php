<?php
	require_once "koneksi.php";
	
	if (isset($_GET['p'])&&$_GET['p']!="")
	{
		mysqli_query($conn,"delete from tblproduct where idproduct=$_GET[p]");
		echo '<script>alert("product deleted !");</script>';
		echo "<script>window.history.back();</script>";
	}
	else
	{
		echo"<script>window.history.back();</script>";		
	}
?>
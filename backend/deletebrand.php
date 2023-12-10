<?php
	require_once "koneksi.php";
	
	if (isset($_GET['b'])&&$_GET['b']!="")
	{
		mysqli_query($conn,"delete from tblbrand where idbrand=$_GET[b]");
		echo '<script>alert("brand deleted !");</script>';
		echo "<script>window.history.back();</script>";
	}
	else
	{
		echo"<script>window.history.back();</script>";		
	}
?>
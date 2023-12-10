<?php
	require_once "koneksi.php";
	
	if (isset($_GET['s'])&&$_GET['s']!="")
	{
		mysqli_query($conn,"delete from tblslide where idslide=$_GET[s]");
		echo '<script>alert("slide show deleted !");</script>';
		echo "<script>window.history.back();</script>";
	}
	else
	{
		echo"<script>window.history.back();</script>";		
	}
?>
<?php
session_start();
	if ($_POST)
	{
		if ($_POST['user']=="adennergy")
		{
			if ($_POST['pass']=="EnnergyS")
			{
				$_SESSION['ad'] = "ADMIN ENNERGY SOLUTIONS";
				//echo "<pre>";print_r($_SESSION);
				//die;
				echo"<script>alert('Login success !');</script>";	
				echo"<script>window.location.href='admin.php';</script>";
			}
			else
			{
				echo"<script>alert('Wrong username or password !');</script>";	
				echo"<script>window.history.back();</script>";
			}
		}
		else
		{
			echo"<script>alert('Wrong username or password !');</script>";	
			echo"<script>window.history.back();</script>";	
		}
	}
	else
	{
		echo"<script>window.history.back();</script>";	
	}
?>
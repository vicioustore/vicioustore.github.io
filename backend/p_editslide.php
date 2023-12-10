<?php 
	include_once "koneksi.php";
	if ($_POST)
	{
		if($_FILES['gambar']['size']>0 && $_FILES['gambar']['name'])
		{
		if(!($_FILES['gambar']['type']=='image/png' || $_FILES['gambar']['type']=='image/jpeg'))
		{
			Print '<script>alert("slide show image must png or jpeg !");</script>';
			Print '<script>window.history.back();</script>';
		}else{
			$filename=$_FILES['gambar']['name'];
			$direktori="../public/images/banner/$filename";
			$move = move_uploaded_file($_FILES['gambar']['tmp_name'], $direktori);
			if($move)
			{
				mysqli_query($conn,"update tblslide set gambar= '$filename',idbrand=$_POST[brand] where idslide=$_POST[ids]");
				Print '<script>alert("editing slide show success !");</script>';
				Print "<script>window.location.href='list-slideshow.php';</script>";
			}
			else
			{
				Print '<script>alert("error while saving please try again !");</script>';
				Print "<script>window.history.back();</script>";
			}
		}
		}
		else
		{
			mysqli_query($conn,"update tblslide set idbrand=$_POST[brand] where idslide=$_POST[ids]");
			Print '<script>alert("editing slide show success !");</script>';
			Print "<script>window.location.href='list-slideshow.php';</script>";
		}
	}
	else
	{
		echo"<script>window.history.back();</script>";	
	}
?>
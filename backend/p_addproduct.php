<?php 
	include_once "koneksi.php";
	if ($_POST)
	{
		if($_FILES['gambar']['size']>0 && $_FILES['gambar']['name'])
		{
		if(!($_FILES['gambar']['type']=='image/png' || $_FILES['gambar']['type']=='image/jpeg'))
		{
			Print '<script>alert("product image must png or jpeg !");</script>';
			Print '<script>window.history.back();</script>';
		}else{
			$filename=$_FILES['gambar']['name'];
			$direktori="../public/images/$filename";
			$move = move_uploaded_file($_FILES['gambar']['tmp_name'], $direktori);
			if($move)
			{
				$desc = str_replace("'","`",$_POST['desc']);
				$spec = str_replace("'","`",$_POST['spec']);
				mysqli_query($conn,"insert into tblproduct values(null,$_POST[brand], '$_POST[product]',$_POST[harga], '$desc', '$spec', '$filename', $_POST[jenis])");
				Print '<script>alert("product success added to list !");</script>';
				Print "<script>window.location.href='list-product.php?q=all';</script>";
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
			Print '<script>alert("product image must png or jpeg !");</script>';
			Print '<script>window.history.back();</script>';
		}
	}
	else
	{
		echo"<script>window.history.back();</script>";	
	}
?>
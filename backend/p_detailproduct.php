<?php
include_once("koneksi.php");
//add item in shopping cart
if(isset($_POST["type"]))
{
	if ($_POST["type"]=='add')
	{
   	 	$kp = $_POST['idp']; 
  
 		if($_SERVER["REQUEST_METHOD"] == "POST")
 		{
			$image =$_FILES["gambar_barang"]["name"];
			$uploadedfile = $_FILES['gambar_barang']['tmp_name'];
			if ($image) 
			{
			
				$filename = stripslashes($_FILES['gambar_barang']['name']);
			
				if(!($_FILES['gambar_barang']['type']=='image/png' || $_FILES['gambar_barang']['type']=='image/jpeg'))
				{
					?><script>alert("images must .jpg/.png !");</script>
			  		<script>window.history.back();</script><?php
 				}
 				else
 				{
					$filename=$_FILES['gambar_barang']['name'];
					$direktori="../public/images/$filename";
					$move = move_uploaded_file($_FILES['gambar_barang']['tmp_name'], $direktori);
					if($move)
					{
						mysqli_query($conn,"insert into tbldetailproduct values(NULL,'$kp','$filename')");
						?><script>alert("images added !");</script>
						<script>window.history.back();</script><?php
					}
					else
					{
						?><script>alert("error adding images please try again !");</script>
						<script>window.history.back();</script><?php
					}
				}
			}
			else
			{
				?><script>window.history.back();</script><?php
			}
		}
		else
		{
			?><script>alert("please select images !");</script>
			<script>window.history.back();</script><?php
		}
	}
	else
	{
		$kp = $_POST['idg'];
		if($_SERVER["REQUEST_METHOD"] == "POST")
 		{
			$image =$_FILES[$kp]["name"];
			$uploadedfile = $_FILES[$kp]['tmp_name'];
			if ($image) 
			{
			
				$filename = stripslashes($_FILES[$kp]['name']);
			
				if(!($_FILES[$kp]['type']=='image/png' || $_FILES[$kp]['type']=='image/jpeg'))
				{
					?><script>alert("images must .jpg/.png !");</script>
			  		<script>window.history.back();</script><?php
 				}
 				else
 				{
					$filename=$_FILES[$kp]['name'];
					$direktori="../public/images/$filename";
					$move = move_uploaded_file($_FILES[$kp]['tmp_name'], $direktori);
					if($move)
					{
						mysqli_query($conn,"update tbldetailproduct set gambar='$filename' where iddetail=$kp");
						if ($_POST['gbrlama']!="")
						{
							$gambarlama=$_POST['gbrlama'];
							$dir = "../public/images/$gambarlama";
							unlink($dir);	
						}
						?><script>alert("images edited !");</script>
						<script>window.history.back();</script><?php
					}
					else
					{
						?><script>alert("error editing images please try again !");</script>
						<script>window.history.back();</script><?php
					}
				}
			}
			else
			{
				?><script>window.history.back();</script><?php
			}
		}
		else
		{
			?><script>alert("please select images !");</script>
			<script>window.history.back();</script><?php
		}
	}
}
else
{
	?><script>window.history.back();</script><?php
}
?>
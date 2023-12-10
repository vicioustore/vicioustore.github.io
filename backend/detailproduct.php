<?php
include_once "koneksi.php";
if (isset($_SESSION['ad']) && $_SESSION['ad'] != "") {
} else {
	header("location:login-admin.php");
}

if (isset($_GET['p']) && $_GET['p'] != "") {
	$query1 = mysqli_query($conn, "select * from tblproduct where idproduct = " . $_GET['p']);
	if (mysqli_num_rows($query1) == 0) {
		echo '<script>window.history.back();</script>';
	} else {
		$data1 = mysqli_fetch_array($query1, MYSQLI_ASSOC);
		$r = mysqli_query($conn, "select * from tbldetailproduct where idproduct = " . $_GET['p']);
		$id = $_GET['p'];
	}
} else {
	echo '<script>window.history.back();</script>';
}
?>
<!DOCTYPE html>
<html>

<head>
	<title>Ennergy Solutions</title>
	<link rel="stylesheet" type="text/css"
		href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../data/stylesheets/carousel.css">
	<link rel="stylesheet" type="text/css" href="../data/stylesheets/index.css">
</head>

<body onload="initialize();">

	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
					aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="admin.php">Vicioustore</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="admin.php">Home</a></li>
					<li><a href="list-slideshow.php">Slide Show</a></li>
					<li><a href="list-product.php?q=all">Product</a></li>
					<li><a href="list-brand.php">Brand</a></li>
					<li><a href="logout.php">Log Out</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</nav>

	<div class="row"></div>
	<div class="row">

		<div class="col-lg-12">
			<section class="panel">
				<h3 style="margin-bottom:30px;">Detail Images
					<?php echo $data1['namaproduct']; ?>
				</h3>
				<div class="table-responsive">

					<table class="table table-striped table-advance table-hover">
						<tbody>
							<tr>
								<th><i class="fa fa-picture-o"></i> Product Images</th>
								<th><i class="fa fa-cog"></i> Action</th>
							</tr>
							<?php
							while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
								?>
								<form method="post" name="<?php echo $row['iddetail']; ?>f" action="p_detailproduct.php"
									enctype="multipart/form-data">
									<input type="hidden" name="idg" value="<?php echo $row['iddetail']; ?>">
									<input type="hidden" name="idp" value="<?php echo $id; ?>">
									<input type="hidden" name="type" value="edit">
									<input type="hidden" id="gbrlama" name="gbrlama" value="<?php echo $row['gambar']; ?>">
									<tr>
										<td><img id="<?php echo $row['iddetail']; ?>i"
												src="../public/images/<?php echo $row['gambar']; ?>" border="1" width="88"
												height="88" class="img-brand"></td>
										<td>
											<div class="btn-group">
												<h4 style="margin:0px">Edit Images</h4><br /><input type="file"
													class="input-file" name="<?php echo $row['iddetail']; ?>"
													accept="image/jpeg" id="<?php echo $row['iddetail']; ?>"
													onchange="previews(<?php echo $row['iddetail']; ?>)">
											</div>
										</td>
									</tr>
								</form>
							<?php
							}
							?>
						</tbody>
					</table>

					<h3>Add Product Images</h3>

					<table class="table table-striped table-advance table-hover">
						<tbody>
							<tr>
								<th><i class="fa fa-picture-o"></i> Product Images</th>
								<th><i class="fa fa-cog"></i> Action</th>
							</tr>
							<form method="post" action="p_detailproduct.php" enctype="multipart/form-data">
								<input type="hidden" name="idp" value="<?php echo $id; ?>">
								<input type="hidden" name="type" value="add">
								<tr>
									<td>
										<img id="imgpreview" src="" width='88' height="88" class="img-brand"
											align='center'>
									</td>
									<td>
										<input type="file" name="gambar_barang" class="input-file" accept="image/jpeg"
											id="upload" onchange="preview()" style="margin-bottom:10px;"> <input
											type="submit" class="btn btn-primary" value="Add">
									</td>
								</tr>
						</tbody>
					</table>
				</div>
			</section>
		</div>

	</div><!--/.row-->


	<footer class="row footer">
		<div class="container">
			<div class="col-md-4">
				<h2>Vicioustore</h2>
				<p>Vicioustore - Destinasi Utama Hiburan Anda! Temukan berbagai layanan kami mulai dari
					streaming sampai dengan top up, semua dengan harga yang sangat murah!</p>
			</div>
			<div class="col-md-12">
				<p class="copyright">Copyright &copy; Vicioustore</p>
			</div>
		</div>
	</footer>

	<script src="https://code.jquery.com/jquery-3.1.1.js"
		integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA=" crossorigin="anonymous"></script>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
		integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
		crossorigin="anonymous"></script>

	<script type="text/javascript" src="../data/script/carousel.js"></script>

	<script type="text/javascript" src="../data/script/map.js"></script>

	<script async defer
		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC7uzsMDdIp423S4B3qVdux_eQjfw1IoAE&callback=initMap">
		</script>

	<script type="text/javascript">
		function previews(k) {
			var oFReader = new FileReader();
			oFReader.readAsDataURL(document.getElementById(k).files[0]);

			oFReader.onload = function (oFREvent) {
				document.getElementById(k + 'i').src = oFREvent.target.result;
			};
			document.forms[k + 'f'].submit();
		};
		function preview() {
			var oFReader = new FileReader();
			oFReader.readAsDataURL(document.getElementById("upload").files[0]);

			oFReader.onload = function (oFREvent) {
				document.getElementById("imgpreview").src = oFREvent.target.result;
			};
		};
	</script>
</body>

</html>
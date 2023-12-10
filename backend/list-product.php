<?php
include_once "koneksi.php";
if (isset($_SESSION['ad']) && $_SESSION['ad'] != "") {
} else {
	header("location:login-admin.php");
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
	<?php
	$jenisbrand = "";
	if (isset($_GET['q'])) {
		if ($_GET['q'] == "") {
			echo "<script>location.replace('list-product.php?q=all');</script>";
		}
		$id = $_GET['q'];
		if ($id == "all") {
			$r = "SELECT tblproduct.*, tblbrand.brand,tbljenis.jenisbarang FROM tblproduct,tblbrand,tbljenis WHERE tblproduct.idbrand = tblbrand.idbrand and tblproduct.idjenis = tbljenis.idjenis";
		} else {
			$r = "SELECT tblproduct.*, tblbrand.brand,tbljenis.jenisbarang FROM tblproduct,tblbrand,tbljenis WHERE tblproduct.idbrand = tblbrand.idbrand and tblproduct.idjenis = tbljenis.idjenis and tblproduct.namaproduct like '%$id%'";
		}
	} else {
		$r = "SELECT tblproduct.*, tblbrand.brand,tbljenis.jenisbarang FROM tblproduct,tblbrand,tbljenis WHERE tblproduct.idbrand = tblbrand.idbrand and tblproduct.idjenis = tbljenis.idjenis";
	}
	if (isset($_GET['s']) && $_GET['s'] != "") {
		$od = $_GET['s'];
		if ($od == "nameaz") {
			$r .= " order by tblproduct.namaproduct asc";
		} else if ($od == "nameza") {
			$r .= " order by tblproduct.namaproduct desc";
		} else if ($od == "pricelh") {
			$r .= " order by tblproduct.harga asc";
		} else if ($od == "pricehl") {
			$r .= " order by tblproduct.harga desc";
		}
	}
	if (mysqli_num_rows(mysqli_query($conn, $r)) == 0) {
		$found = 0;
	} else {
		$found = mysqli_num_rows(mysqli_query($conn, $r));
		if (isset($_GET['p']) && $_GET['p'] != "") {
			$ke = (($_GET['p'] - 1) * 20);
		} else {
			$ke = 0;
		}
		$r .= " limit $ke,20";
		$hasil_kondisi = mysqli_query($conn, $r);
		$jmlpage = (($found - ($found % 20)) / 20);
		if ($found % 20 != 0) {
			$jmlpage = $jmlpage + 1;
		}
	}
	?>
	<div class="container">
		<div class="row sort">
			<div class="col-md-2">
				<button type="button" class="btn btn-default btn-danger"
					onClick="window.location.href='addproduct.php'">
					<i class="fa fa-plus-circle" aria-hidden="true"></i> New Product
				</button>
			</div>
			<div class="col-md-1 sort-btn">
				<div class="btn-group sort-btn-button">
					<button type="button" class=" btn-block btn btn-default btn-info dropdown-toggle"
						data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Sort By <span class="caret"></span>
					</button>
					<ul class="dropdown-menu">
						<li><a href="list-product.php?q=<?php echo $_GET['q']; ?>&s=nameaz">Product Name A-Z</a></li>
						<li><a href="list-product.php?q=<?php echo $_GET['q']; ?>&s=nameza">Product Name Z-A</a></li>
						<li><a href="list-product.php?q=<?php echo $_GET['q']; ?>&s=pricelh">Product Price Low-High</a>
						</li>
						<li><a href="list-product.php?q=<?php echo $_GET['q']; ?>&s=pricehl">Product Price High-Low</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="col-md-9">
				<form class="form-inline form-sort" action="list-product.php" method="get">
					<input type="text" class="form-control search-width" name="q" placeholder="Search...">
					<button type="submit" class="btn btn-default btn-danger">
						<i class="fa fa-search" aria-hidden="true"></i>
					</button>
				</form>
			</div>
		</div>
	</div>
	<div class="row"></div>
	<div class="container all-product">
		<?php
		if ($found == 0) {
		} else {
			while ($data = mysqli_fetch_array($hasil_kondisi, MYSQLI_ASSOC)) {
				?>
				<div class="col-md-3 col-sm-6">
					<div class="thumbnail">
						<img src="../public/images/<?php echo $data['gambar']; ?>" alt="...">
						<div class="caption">
							<h3>
								<?php echo $data['namaproduct']; ?>
							</h3>
							<p class="price">Rp.
								<?php echo number_format($data['harga'], 0, ".", ","); ?>
							</p>
							<p><a href="editproduct.php?p=<?php echo $data['idproduct']; ?>" class="btn btn-primary btn-info"
									role="button"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a> | <a
									href="deleteproduct.php?p=<?php echo $data['idproduct']; ?>" class="btn btn-primary btn-info"
									role="button" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"
										aria-hidden="true"></i> Delete</a></p>
						</div>
					</div>
				</div>
				<?php
			}
		}
		?>
	</div>
	<div class="container">
		<div class="col-md-12 product-index">
			<nav aria-label="Page navigation">
				<ul class="pagination">
					<?php
					if ($found != 0) {
						if (isset($_GET['s']) && $_GET['s'] != "") {
							$q = "q=" . $_GET['q'] . "&s=" . $_GET['s'];
						} else {
							$q = "q=" . $_GET['q'];
						}
						?>
						<li><a href="<?php echo 'list-product.php?' . $q . '&p=1'; ?>">&laquo;</a></li>
						<?php
						if (isset($_GET['p']) && $_GET['p'] != "" && $_GET['p'] == 0) {
							$_GET['p'] = 1;
						}
						if (isset($_GET['p']) && $_GET['p'] != "" && $_GET['p'] != 1) {
							$pagel = intval($_GET['p']) - 1;
							?>
							<li><a href="<?php echo 'list-product.php?' . $q . '&p=' . $pagel; ?>">&lsaquo;</a></li>
							<?php
						}
						if ($jmlpage > 5) {
							if (isset($_GET['p']) && $_GET['p'] != "" && intval($_GET['p']) > 3) {
								if ((intval($_GET['p']) + 2) > $jmlpage) {
									$pagea = $jmlpage;
								} else {
									$pagea = (intval($_GET['p']) + 2);
								}
								for ($j = (intval($_GET['p']) - 2); $j <= $pagea; $j++) {
									if (isset($_GET['p']) && $_GET['p'] != "") {
										if ($j == $_GET['p']) {
											?>
											<li><a style="background:#999; border:1px solid #999"
													href="<?php echo 'list-product.php?' . $q . '&p=' . $j; ?>">
													<?php echo $j; ?>
												</a></li>
											<?php
										} else {
											?>
											<li><a href="<?php echo 'list-product.php?' . $q . '&p=' . $j; ?>">
													<?php echo $j; ?>
												</a></li>
										<?php
										}
									} else {
										if ($j == 1) {
											?>
											<li><a style="background:#999; border:1px solid #999"
													href="<?php echo 'list-product.php?' . $q . '&p=' . $j; ?>">
													<?php echo $j; ?>
												</a></li>
											<?php
										} else {
											?>
											<li><a href="<?php echo 'list-product.php?' . $q . '&p=' . $j; ?>">
													<?php echo $j; ?>
												</a></li>
											<?php
										}
									}
								}

							} else {
								for ($j = 1; $j <= 5; $j++) {
									if (isset($_GET['p']) && $_GET['p'] != "") {
										if ($j == $_GET['p']) {
											?>
											<li><a style="background:#999; border:1px solid #999"
													href="<?php echo 'list-product.php?' . $q . '&p=' . $j; ?>">
													<?php echo $j; ?>
												</a></li>
											<?php
										} else {
											?>
											<li><a href="<?php echo 'list-product.php?' . $q . '&p=' . $j; ?>">
													<?php echo $j; ?>
												</a></li>
										<?php
										}
									} else {
										if ($j == 1) {
											?>
											<li><a style="background:#999; border:1px solid #999"
													href="<?php echo 'list-product.php?' . $q . '&p=' . $j; ?>">
													<?php echo $j; ?>
												</a></li>
											<?php
										} else {
											?>
											<li><a href="<?php echo 'list-product.php?' . $q . '&p=' . $j; ?>">
													<?php echo $j; ?>
												</a></li>
											<?php
										}
									}
								}
							}
						} else {
							for ($j = 1; $j <= $jmlpage; $j++) {
								if (isset($_GET['p']) && $_GET['p'] != "") {
									if ($j == $_GET['p']) {
										?>
										<li><a style="background:#999; border:1px solid #999"
												href="<?php echo 'list-product.php?' . $q . '&p=' . $j; ?>">
												<?php echo $j; ?>
											</a></li>
										<?php
									} else {
										?>
										<li><a href="<?php echo 'list-product.php?' . $q . '&p=' . $j; ?>">
												<?php echo $j; ?>
											</a></li>
									<?php
									}
								} else {
									if ($j == 1) {
										?>
										<li><a style="background:#999; border:1px solid #999"
												href="<?php echo 'list-product.php?' . $q . '&p=' . $j; ?>">
												<?php echo $j; ?>
											</a></li>
										<?php
									} else {
										?>
										<li><a href="<?php echo 'list-product.php?' . $q . '&p=' . $j; ?>">
												<?php echo $j; ?>
											</a></li>
										<?php
									}
								}
							}
						}
						if (isset($_GET['p']) && $_GET['p'] != "" && $_GET['p'] != $jmlpage) {
							$page = intval($_GET['p']) + 1;
							?>
							<li><a href="<?php echo 'list-product.php?' . $q . '&p=' . $page; ?>">&rsaquo;</a></li>
							<?php
						} else {
							if ($jmlpage == 1) {

							} else {
								if (isset($_GET['p']) && $_GET['p'] != "" && $_GET['p'] == $jmlpage) {
								} else {
									?>
									<li><a href="<?php echo 'list-product.php?' . $q . '&p=2'; ?>">&rsaquo;</a></li>
									<?php
								}
							}
						}
						?>
						<li><a href="<?php echo 'list-product.php?' . $q . '&p=' . $jmlpage; ?>"> &raquo; </a></li>
						<?php
						if (isset($_GET['p']) && $_GET['p'] != "") {
							?>
							<font
								style="border:1px solid #fff; color:#888;padding: 4px 12px;line-height: 1.5em; display: inline-block; vertical-align:middle;">
								Page
								<?php echo $_GET['p']; ?> of
								<?php echo $jmlpage; ?>
							</font>
							<?php
						} else {
							?>
							<font
								style="border:1px solid #fff; color:#888;padding: 4px 12px;line-height: 1.5em; display: inline-block; vertical-align:middle;">
								Page 1 of
								<?php echo $jmlpage; ?>
							</font>
							<?php
						}
					}
					?>
				</ul>
			</nav>
		</div>
	</div>
	</div>


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
</body>

</html>
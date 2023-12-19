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
  <div class="container">
    <h1 class="text-center">Edit Product</h1>
    <form action="p_editproduct.php" method="post" enctype="multipart/form-data">
      <input type="hidden" name="idp" value="<?php echo $data1['idproduct']; ?>" />
      <div class="input-group" style="margin-bottom:10px">
        <span class="input-group-addon"><i class="fa fa-product-hunt"></i> Product</span>
        <input id="product" type="text" class="form-control" name="product" value="<?php echo $data1['namaproduct']; ?>"
          required placeholder="Enter product">
      </div>
      <div class="input-group" style="margin-bottom:10px">
        <span class="input-group-addon"><i class="fa fa-tags"></i> Brand</span>
        <select name="brand" class="form-control">
          <?php
          $query = mysqli_query($conn, "Select * from tblbrand");

          while ($data = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
            ?>
            <option <?php if ($data['idbrand'] == $data1['idbrand'])
              echo "selected"; ?>
              value="<?php echo $data['idbrand']; ?>">
              <?php echo $data['brand']; ?>
            </option>
            <?php
          }
          ?>
        </select>
      </div>
      <div class="input-group" style="margin-bottom:10px">
        <span class="input-group-addon"><i class="fa fa-money"></i> Price</span>
        <input id="harga" type="number" class="form-control" name="harga" value="<?php echo $data1['harga']; ?>" required
          placeholder="Enter product price">
      </div>
      <div class="input-group" style="margin-bottom:10px">
        <span class="input-group-addon"><i class="fa fa-image"></i> Product Image</span>
        <input type="submit" class="btn btn-primary pull-right" value="Edit Product" />
        <input type="button" style="margin-right:10px;" class="btn btn-primary pull-right"
          onClick="window.location.href='detailproduct.php?p=<?php echo $_GET['p']; ?>'" value="Detail Product Images" />
        <img id="imgpreview" src="../public/images/<?php echo $data1['gambar']; ?>" width='200' height="200"
          class="img-brand" align='center'>
        <input type="file" style="margin-top:5px;" id="upload" name="gambar" accept="image/jpeg" onChange="preview()">
      </div>
    </form>
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

  <script src="https://code.jquery.com/jquery-3.1.1.js" integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA="
    crossorigin="anonymous"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
    integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
    crossorigin="anonymous"></script>

  <script type="text/javascript" src="../data/script/carousel.js"></script>

  <script type="text/javascript" src="../data/script/map.js"></script>

  <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC7uzsMDdIp423S4B3qVdux_eQjfw1IoAE&callback=initMap">
    </script>

  <script>
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
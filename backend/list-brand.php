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
  <div class="container">
    <button type="button" style="margin-bottom:15px;" class="btn btn-default btn-danger"
      onClick="window.location.href='addbrand.php'">
      <i class="fa fa-plus-circle" aria-hidden="true"></i> New Brand
    </button>
    <br />
    <table class="table table-hover">
      <thead id="table-header">
        <tr>
          <th>No.</th>
          <th>Brand</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $hasil_kondisi = mysqli_query($conn, "select * from tblbrand");
        $i = 0;
        while ($row = mysqli_fetch_array($hasil_kondisi, MYSQLI_ASSOC)) {
          $i++;
          ?>
          <tr>
            <td>
              <?php echo $i; ?>
            </td>
            <td>
              <?php echo $row['brand']; ?>
            </td>
            <td><a href="editbrand.php?b=<?php echo $row['idbrand']; ?>" class="btn btn-primary btn-info" role="button"><i
                  class="fa fa-pencil" aria-hidden="true"></i> Edit</a> | <a
                href="deletebrand.php?b=<?php echo $row['idbrand']; ?>" class="btn btn-primary btn-info" role="button"
                onclick="return confirm('Are you sure?')"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a></td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
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
</body>

</html>
<?php 
	include_once "koneksi.php";
	if(isset($_SESSION['ad'])&&$_SESSION['ad']!="")
	{
		header("location:admin.php");	
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Ennergy Solutions</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../data/stylesheets/carousel.css">
	<link rel="stylesheet" type="text/css" href="../data/stylesheets/index.css">
</head>
<body onload="initialize();">

			<div class="row business-info">
				<div class="container">
					<h1 class="mainTitle">Login Admin</h1>
					<div class="col-md-offset-3 col-md-6 text-center">
						<form class="form-horizontal" method="post" action="p_login.php">
                          <div class="form-group">
                            <label class="control-label col-sm-2" for="email">Username</label>
                            <label class="control-label col-sm-1" for="email">:</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="user" required id="email" placeholder="Enter username">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-sm-2" for="pwd">Password</label>
                            <label class="control-label col-sm-1" for="pwd">:</label>
                            <div class="col-sm-9"> 
                              <input type="password" class="form-control" name="pass" required id="pwd" placeholder="Enter password">
                            </div>
                          </div>
                          <div class="form-group"> 
                            <div class="col-sm-offset-3 col-sm-10 text-left">
                              <button type="submit" class="btn btn-default">Login</button>
                            </div>
                          </div>
                        </form>
					</div>
				</div>
			</div>
<script
  src="https://code.jquery.com/jquery-3.1.1.js"
  integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA="
  crossorigin="anonymous"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script type="text/javascript" src="../data/script/carousel.js"></script>

<script type="text/javascript" src="../data/script/map.js"></script>

<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC7uzsMDdIp423S4B3qVdux_eQjfw1IoAE&callback=initMap">
</script>
</body>
</html>
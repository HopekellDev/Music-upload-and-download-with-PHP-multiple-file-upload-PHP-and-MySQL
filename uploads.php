<!DOCTYPE html>
<html>
<head>
	<!-- Responsive meta tag-->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Multi File Upload, Add to databaase and view in PHP and MySQL</title>

	<!--Style sheets-->
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="assets/css/styles.css">


	<!--Font icons-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
</head>
<body>

	<!--Navigation bar-->
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <div class="container-fluid">
	    <a class="navbar-brand" href="http://HopekellDev.info">HopekellDev.info</a>
	    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	      <span class="navbar-toggler-icon"></span>
	    </button>
	    <div class="collapse navbar-collapse" id="navbarSupportedContent">
	      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
	        <li class="nav-item">
	          <a class="nav-link active" aria-current="page" href="./">Home</a>
	        </li>
	        <li class="nav-item dropdown">
	          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
	            Categories
	          </a>
	          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
	            <li><a class="dropdown-item" href="https://hopekelldev.info/category/html/" target="blank">HTML</a></li>
	            <li><a class="dropdown-item" href="https://hopekelldev.info/category/css/" target="blank">CSS</a></li>
	            <li><a class="dropdown-item" href="https://hopekelldev.info/category/javascript/" target="blank">Javascript</a></li>
	            <li><a class="dropdown-item" href="https://hopekelldev.info/category/php/" target="blank">PHP</a></li>
	            <li><a class="dropdown-item" href="https://hopekelldev.info/category/bootstrap/" target="blank">Bootstrap</a></li>
	            <li><a class="dropdown-item" href="https://hopekelldev.info/category/laravel/" target="blank">Laravel</a></li>
	            <li><a class="dropdown-item" href="https://hopekelldev.info/category/wordpress/" target="blank">Wordpress</a></li>
	          </ul>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link" href="upload.php" tabindex="-1" aria-disabled="true">Upload Files</a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link" href="uploads.php" tabindex="-1" aria-disabled="true">View Uploads</a>
	        </li>
	      </ul>
	      <form class="d-flex">
	        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
	        <button class="btn btn-outline-success" type="submit">Search</button>
	      </form>
	    </div>
	  </div>
	</nav>

	<!--Main Container-->
	<div class="container">
		<div class="card">
			<center><h3 class="text-primary">Uploads</h3></center>
			<hr />
			<div class="row">
				<?php
				include "database.php";
				$sql = "SELECT * FROM tbl_songs ORDER BY songID DESC Limit 20";
				$result = $conn->query($sql);
				include"function.time-ago.php";
				if ($result->num_rows > 0) {
				// output data of each row
			 	while($row = $result->fetch_assoc()) {
			 		$timeago=get_timeago(strtotime($row['songDate']));
			 		?>
				<div class="col-md-3 raised">

					<a href="download.php?music=<?php echo $row['songID'];?>" style="text-decoration: none;" class="text-center" >
						<img src="uploads/cover/<?php echo $row['songCover'];?>" width="100%" height="250px">
						<h5><?php echo $row['songName'];?></h5>
						<p><i class="fa fa-eye"></i> <?php echo $row['songViews'];?> | Uploaded <?php echo $timeago;?></p>
					</a>
				</div>
				<?php
					}
				} else {
					?>
					<div class="col-md-12">
						<center><p>No song in database</p></center>
					</div>
					<?php
				}
				?>
			</div>
		</div>
	</div>

<!-- Core javascript files-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>

<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
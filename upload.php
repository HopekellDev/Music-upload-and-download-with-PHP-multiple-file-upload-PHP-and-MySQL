<!DOCTYPE html>
<html>
<head>
	<!-- Responsive meta tag-->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Multi File Upload, Add to databaase and view in PHP and MySQL</title>

	<!--Style sheets-->
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">

	<!--Custom styles-->


	<!--Font icons-->
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
		<div class="upload" style="">
			<h3 class="text-primary" align="center">Upload Files</h3>
			<hr />
			<?php
			if (isset($_GET['success'])) {
				# code...
				?>
				<div class="alert alert-success">Music have been uploaded!</div>
				<?php
			}elseif (isset($_GET['error'])) {
				# code...
				?>
				<div class="alert alert-danger">Music failed to upload!</div>
				<?php
			}else{

			}
			?>
			<form method="post" action="action.php" enctype="multipart/form-data">
				<div class="row">
					<div class="col-md-12">
						<label>Song name</label>
						<div class="input-group mb-3">
							<span class="input-group-text" id="basic-addon1"><i class="fa fa-music"></i></span>
							<input type="text" class="form-control" placeholder="Enter song name" aria-label="Enter song name" aria-describedby="basic-addon1" name="song_name" required>
						</div>
					</div>
					<div class="col-md-6">
						<label>Song File <small><b>(MP3, AVI, ACC)</b></small></label>
						<div class="input-group mb-3">
							<span class="input-group-text" id="basic-addon1"><i class="fa fa-upload"></i></span>
							<input type="file" class="form-control" placeholder="Enter song name" aria-label="Enter song name" aria-describedby="basic-addon1" name="song_file" accept="audio/*" required>
						</div>
					</div>
					<div class="col-md-6">
						<label>Cover art <small><b>(JPG, PNG, BMP)</b></small></label>
						<div class="input-group mb-3">
							<span class="input-group-text" id="basic-addon1"><i class="fa fa-image"></i></span>
							<input type="file" class="form-control" placeholder="Enter song name" aria-label="Enter song name" aria-describedby="basic-addon1" name="cover_art" accept="image/*" required>
						</div>
					</div>
					<div class="col-md-6">
						<label>Song Artiste</label>
						<div class="input-group mb-3">
							<span class="input-group-text" id="basic-addon1"><i class="fa fa-microphone"></i></span>
							<input type="text" class="form-control" placeholder="Enter artiste name" aria-label="Enter artiste name" aria-describedby="basic-addon1" name="artise_name" required>
						</div>
					</div>
					<div class="col-md-6">
						<label>Select song category</label>
						<div class="input-group mb-3">
							<span class="input-group-text" id="basic-addon1"><i class="fa fa-list"></i></span>
							<select class="form-control" name="category" required>
								<option value="">--Select Categories--</option>
								<option value="Blues Test">Blues Test</option>
							</select>
						</div>
					</div>
					<div class="col-md-12">
						<label>Uploader [No Email here]</label>
						<div class="input-group mb-3">
							<span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
							<input type="text" class="form-control" placeholder="Enter your name((EG John Doe) [*No Email Address]" aria-label="Enter song name" aria-describedby="basic-addon1" name="song_uploader" required>
						</div>
					</div>
					<div class="col-md-12">
						<div class="orm-group">
							<label class="alert alert-info" style="width: 100%">
								<b><input type="checkbox" name="Terms" value="yes" required> Pleas agree to the below terms</b><br>
								*I have read and accepted all Website rules and regulations<br>
								*You should not add email address or phone to song name or file, else song will be deleted from our website
							</label>
						</div>
					</div>
					<div class="col-md-6">
						<button type="submit" class="btn btn btn-primary" name="btn-upload">Upload now</button>
					</div>
				</div>
			</form>
		</div>
		
	</div>

<!-- Core javascript files-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>

<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
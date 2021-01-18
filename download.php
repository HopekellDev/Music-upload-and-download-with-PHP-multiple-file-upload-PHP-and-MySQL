
<?php
include "database.php";


//Download handler
if (isset($_POST['btn-download'])) {
	$id = $_POST['music'];
	$sql = "SELECT * FROM tbl_songs WHERE songID='$id'"; //Get music details from database
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();

		//Increase downloads (Counter)
		$sql = "UPDATE tbl_songs SET songDownloads=songDownloads+1 WHERE songID='$id'";
		$conn->query($sql);# downloads

		//Forec PHP file download
		$file_name = $row['songFile'];
		$file_url = 'uploads/audio/' . $file_name;
		header('Content-Type: application/octet-stream');
		header("Content-Transfer-Encoding: Binary"); 
		header("Content-disposition: attachment; filename=\"".$file_name."\""); 

		if (readfile($file_url)){
			?>
			<script>
				window.location.href='download.php?music=<?php echo $id;?>';
			</script>
			<?php
		}
		exit;#File download
	}
}

//Add like on button click
if (isset($_POST['btn-like'])) {
	$id = $_POST['music'];
	$sql = "UPDATE tbl_songs SET songLike=songLike+1 WHERE songID='$id'";
	if ($conn->query($sql) === TRUE) {
			?>
			<script>
				window.location.href='download.php?music=<?php echo $id;?>';
			</script>
			<?php
	}
}

//Add dislike on button click
if (isset($_POST['btn-dislike'])) {
	$id = $_POST['music'];
	$sql = "UPDATE tbl_songs SET songDislikes=songDislikes+1 WHERE songID='$id'";
	if ($conn->query($sql) === TRUE) {
			?>
			<script>
				window.location.href='download.php?music=<?php echo $id;?>';
			</script>
			<?php
	}
}
if (isset($_GET['music'])){
	$id = $_GET['music'];
	$sql = "SELECT * FROM tbl_songs WHERE songID='$id'";
	$result = $conn->query($sql);
	include"function.time-ago.php";
	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();

		$view = "UPDATE tbl_songs SET songViews=songViews+1 WHERE songID='$id'";
		$conn->query($view);
	}else{

	}

}
?>

<!DOCTYPE html>
<html>
<head>
	<!-- Responsive meta tag-->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Download <?php echo $row['songName'];?> || Multi File Upload, Add to databaase and view in PHP and MySQL</title>

	<!--Style sheets-->
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="assets/css/styles.css">


	<!--Font icons-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">

	<!-- Jplayer-->
	<link href="jplayer/dist/skin/blue.monday/css/jplayer.blue.monday.min.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="jplayer/lib/jquery.min.js"></script>
	<script type="text/javascript" src="jplayer/dist/jplayer/jquery.jplayer.min.js"></script>
	<script type="text/javascript">
	//<![CDATA[
	$(document).ready(function(){

		$("#jquery_jplayer_1").jPlayer({
			ready: function (event) {
				$(this).jPlayer("setMedia", {
					title: "<?php echo $row['songName'].' - '.$row['songArtist'];?>",
					m4a: "uploads/audio/<?php echo $row['songFile'];?>",
					oga: "uploads/audio/<?php echo $row['songFile'];?>"
				});
			},
			swfPath: "jplayer/dist/jplayer",
			supplied: "m4a, oga",
			wmode: "window",
			useStateClassSkin: true,
			autoBlur: false,
			smoothPlayBar: true,
			keyEnabled: true,
			remainingDuration: true,
			toggleDuration: true
		});
	});
	//]]>
	</script>
	<script type="text/javascript">
		$(function () {
		  $('[data-toggle="tooltip"]').tooltip()
		})
	</script>
	<script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=6005a45cd6f99f0018f9aba3&product=sop' async='async'></script>
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
			<center><h3 class="text-primary">Download Notice [<?php echo $row['songName']." by ".$row['songArtist'];?>] </h3></center>
			<hr />
			<div class="row">
				<div class="col-md-6 col-lg-6 col-sm-12">
					<img src="uploads/cover/<?php echo $row['songCover'];?>" width="100%">
					<div id="jquery_jplayer_1" class="jp-jplayer"></div>
					<div id="jp_container_1" class="jp-audio" role="application" aria-label="media player">
						<div class="jp-type-single">
							<div class="jp-gui jp-interface">
								<div class="jp-controls">
									<button class="jp-play" role="button" tabindex="0">play</button>
									<button class="jp-stop" role="button" tabindex="0">stop</button>
								</div>
								<div class="jp-progress">
									<div class="jp-seek-bar">
										<div class="jp-play-bar"></div>
									</div>
								</div>
								<div class="jp-volume-controls">
									<button class="jp-mute" role="button" tabindex="0">mute</button>
									<button class="jp-volume-max" role="button" tabindex="0">max volume</button>
									<div class="jp-volume-bar">
										<div class="jp-volume-bar-value"></div>
									</div>
								</div>
								<div class="jp-time-holder">
									<div class="jp-current-time" role="timer" aria-label="time">&nbsp;</div>
									<div class="jp-duration" role="timer" aria-label="duration">&nbsp;</div>
									<div class="jp-toggles">
										<button class="jp-repeat" role="button" tabindex="0">repeat</button>
									</div>
								</div>
							</div>
							<div class="jp-details">
								<div class="jp-title" aria-label="title">&nbsp;</div>
							</div>
							<div class="jp-no-solution">
								<span>Update Required</span>
								To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-6 col-sm-12">
					<h4 class="text-muted">Song Details</h4>
					<hr />
					<p><b>Name: </b><span style="float: right;"><?php echo $row['songName'];?></span></p>
					<p><b>Artist: </b><span style="float: right;"><?php echo $row['songArtist'];?></span></p>
					<p><b>Upload date: </b><span style="float: right;"><?php echo $row['songDate'];?></span></p>
					<p><b>Uploader: </b><span style="float: right;"><?php echo $row['songUploader'];?></span></p>
					<p><b>Views: </b><span style="float: right;"> <?php echo number_format($row['songViews'],0,'.',',');?></span></p>
					<p><b>Likes: </b><span style="float: right;"> <?php echo number_format($row['songLike'],0,'.',',');?></span></p>
					<p><b>Dislikes: </b><span style="float: right;"> <?php echo number_format($row['songDislikes'],0,'.',',');?></span></p>
					<hr />
					<center>
						<form method="post" class="justify-content-center">
							<button type="submit" name="btn-like" class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="Like"><i class="fa fa-thumbs-up"></i> | <?php echo number_format($row['songLike'],0,'.',',');?></button>

							<button type="submit" name="btn-dislike" class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="Dislike"><i class="fa fa-thumbs-down"></i> | <?php echo number_format($row['songDislikes'],0,'.',',');?></button>

							<input type="hidden" name="music" value="<?php echo $row['songID'];?>">
							<button type="submit" class="btn btn-success" name="btn-download" title="Download <?php echo $row['songName'];?>"><i class="fa fa-download"></i> | <?php echo number_format($row['songDownloads'],0,'.',',');?></button>
						</form>
					</center>
					<br>
					<p align="center">Share song</p>
					<!-- ShareThis BEGIN --><div class="sharethis-inline-share-buttons"></div><!-- ShareThis END -->
				</div>
			</div>
		</div>
	</div>
<script>
	$(function () {
	  $('[data-toggle="tooltip"]').tooltip()
	})
</script>
<!-- Core javascript files-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>

<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
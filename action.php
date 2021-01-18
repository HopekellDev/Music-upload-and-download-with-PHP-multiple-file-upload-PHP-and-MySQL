<?php
include "database.php";
if(isset($_POST['btn-upload']))
{    
	$song_name	=	$_POST["song_name"];
	$artise_name=	$_POST["artise_name"];
	$category	=	$_POST["category"];
	$song_uploader= $_POST["song_uploader"];
	//Song File
	$song_file = "realsoundz_com_".rand(1000,100000)."_".$_FILES['song_file']['name'];
	$song_file_loc = $_FILES['song_file']['tmp_name'];

	//Song Size
	$song_size = $_FILES['song_file']['size'];
	$song_type = $_FILES['song_file']['type'];

	//Corver File
	$cover_file = $song_file."_".$_FILES['cover_art']['name'];
	$cover_file_loc = $_FILES['cover_art']['tmp_name'];

	//song Folder
	$mfolder="uploads/audio/";

	//Corver Folder
	$afolder="uploads/cover/";

	// new song_file size in KB
	$new_size = $song_size/1024;  

	// make song_file name in lower case
	$new_song_name = strtolower($song_file);

	// make cover_file name in lower case
	$new_covername = strtolower($cover_file);

	// remove spaces in song file
	$final_song=str_replace(' ','_',$new_song_name);

	// remove spaces in song file
	$final_cover=str_replace(' ','_',$new_covername);

	//Current date
	$date = date("Y-m-d H:i:s");

	//Upload files now
	if(move_uploaded_file($song_file_loc,$mfolder.$final_song) AND move_uploaded_file($cover_file_loc, $afolder.$final_cover))
	{
		$sql = "INSERT INTO tbl_songs (songName, songCat, songArtist, songUploader, songCover, songFile, songSize, songDate)
		VALUES ('$song_name', '$category', '$artise_name', '$song_uploader', '$final_cover', '$final_song', '$new_size', '$date');";
		if ($conn->query($sql) === TRUE) {
			?>
			<script>
				alert("Song uploaded...")
				window.location.href="upload.php?success";
			</script>
			<?php
		} else {
			?>
			<script>
				alert("Song upload failed...")
				window.location.href="upload.php?danger";
			</script>
			<?php
			echo "Error: ".$conn->error;
		}
		  
	}
}
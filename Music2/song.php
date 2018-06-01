<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
<link rel="icon" type="image/png" href="resources/icon1.png">
<title>Muzika : Music Store</title>

<!--jquery 3.1.1-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<!--Bootstrap v3.3.7 css-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!--Latest minified bootstrap javascript-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!--Font for Muzika title-->
<link href="https://fonts.googleapis.com/css?family=Clicker+Script" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css?family=Gloria+Hallelujah" rel="stylesheet"> 
<!--Core CSS-->
<link href="css/stylesheet.css" rel="stylesheet">
<link href="css/about.css" rel="stylesheet">

</head>


<body>
<div id="songloader" align="center">
	<img src="" id="songimage">
	<button type="button" class="close close-it" onclick="closesong()">&times;</button>
	<br><br>
	<div class="songcaption"><span id="songmovetitle"></span></div><br>
	<audio controls id="myaudio">
		<source type="audio/mp3" id="songsource" src=""></source>
		  Your browser does not support embedded audio players
	</audio>
</div>


<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container-fluid text-center">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#heads">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="index.php"><img src="resources/acoustic-guitar.svg" style="height:100px; width:100px ;"></a><div id="muzika"><b>Muzika</b></div>
		</div>
		<div class="collapse navbar-collapse" id="heads">
			<ul class="nav navbar-nav navbar-right">
				<li>
					<?php
					if(isset($_SESSION["user"])){
						echo '<a href="admin.php"><button class="btn btn-success btn-lg "><span class="glyphicon glyphicon-cog"></span> <b>Dashboard' ; 
					}
					else{
						echo '<a href="#"><button class="btn btn-warning btn-lg " data-toggle="modal" data-target="#login-modal"><span class="glyphicon glyphicon-log-in"></span> <b>Log in';	 
					}
					?>
				
					</b></button></a>
				</li>
				<li>
					<a href="about.php"><button class="btn btn-warning btn-lg "><span class="glyphicon glyphicon-user"></span> <b>About</b></button></a>
				</li>
			</ul>
		</div>
	</div>
</nav>



<?php
 include('upload.php');
 $result=mysqli_query($con,"SELECT*FROM videos");
 while($row=$result->fetch_array()){
echo "<div id=\"video_player_box\"> 
  <video id=\"video\" width=\"300\" height=\"200\" controls>
  <source src='videos/".$row['name']."'>
    Your browser does not support the video tag.
</video>

</div>";
?>

	




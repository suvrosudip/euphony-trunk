<html>
<head>
    <title> Euphony </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- Boostrap CDN -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-theme.min.css">
	<script type="text/javascript" src="js/jquery-1.12.0.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="dist/id3-minimized.js" type="text/javascript"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="js/driver.js"> </script>
  
		
</head>

<body>
    <center> <img src="images/logo.png" /> </center>
	
    <div id="content">
		<center>
		<h1> Last known GPS Coordinates </h1>
		<h2> 
			<?php
				// get contents of a file into a string
				$filename = "config/gpsInfo.txt";
				$handle = fopen($filename, "r");
				$contents = fread($handle, filesize($filename));
				echo '<a href="https://www.google.com/maps?q='.$contents.'"> '.$contents.'</a>';
				fclose($handle);
			?>		
		</h2>
		
		<h1> Change WiFi Password </h1>
		
		<center>
     
	</div>
	
</body>
</html>
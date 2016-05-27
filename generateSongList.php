<html>
<head>
<script type="text/javascript" src="js/jquery-1.12.0.min.js"></script>
</head>
<body>
<div class="container" id="songsListContainer" style="font-color: #FFFFFF;">	       
<table id="songsList" class="table" style="border-style: none;">

<tbody>
	<?php
		set_time_limit(0);
		error_reporting(0);
		$str = file_get_contents('config/songsList.json');
		$json = json_decode($str, true); // decode the JSON into an associative array
		$i = 2;
		for($i; $i<count($json); $i++) {
			if ($i % 10 == 0) {
				
			}
			else {
				
				echo '<a href="#image'.$i.'" onclick="updateSource('.$i.'); loadID3tags();"><tr id="'.$i.'0" onClick="highlightSong('.$i.'0)">';
				echo '<td><a href="#image'.$i.'" onclick="updateSource('.$i.'); loadID3tags();"><img name="image'.$i.'" id="'.$i.'" data-value="sdcard/'.$json[$i]['songFileName'].'" width="45" height="50" src="'.$json[$i]['albumArt'].'"></ouput></a></td>';
				
				echo '<td><a href="#image'.$i.'" onclick="updateSource('.$i.'); loadID3tags();"><p class="truncate">'.htmlentities(!empty($json[$i]['songTitle']) ? implode('', $json[$i]['songTitle'])         : chr(160)).'<br/>';
				echo ''.htmlentities(!empty($json[$i]['artistName']) ? implode('<br>', $json[$i]['artistName'])         : chr(160)).'<br/></td></tr></a>';
			}
			
			
			/*echo '<td><a href="#image'.$i.'" onclick="updateSource('.$i.'); loadID3tags();"><p class="truncate">'.htmlentities(!empty($json[$i]['songTitle']) ? implode('</p><br>', $json[$i]['songTitle'])         : chr(160)).'<br/>';
			echo ''.htmlentities(!empty($json[$i]['artistName']) ? implode('<br>', $json[$i]['artistName'])         : chr(160)).'<br/></td></tr></a>';*/
		}
	?>
</tbody>
</div>
</table>
</div>
</body>
</html>
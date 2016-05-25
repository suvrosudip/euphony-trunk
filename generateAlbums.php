<html>
<head>
</head>
<body>
<div class="container" style="font-color: #FFFFFF;">	       

	<?php
		$str = file_get_contents('config/songsList.json');
		$json = json_decode($str, true); // decode the JSON into an associative array
		$artists=array();
		
		
		// Obtain a list of columns
		foreach ($json as $key => $row) {
			$albumName[$key]  = $row['albumName'];
			
		}

		// Sort the data with volume descending, edition ascending
		// Add $data as the last parameter, to sort by the common key
		array_multisort($albumName, SORT_ASC, $json);
		
			
		for($i=1; $i<count($json); $i++) {
			if ($i==1)
			{
				echo '<div class="accordion-toggle" style="color: #fff;"> <div data-toggle="collapse" data-target="#div'.$i.'">
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img width="75" height="75" src="'.$json[$i]['albumArt'].'"> <br/>						
						<h2 class="truncateAlbums">&nbsp;&nbsp;&nbsp;'.htmlentities(!empty($json[$i]['albumName']) ? implode('<br>', $json[$i]['albumName']) : chr(160)).'<br/><br/>';
						echo '</h2></div>';
						echo '<div id="div'.$i.'" class="collapse"><table class="table">';
						
						echo '<a href="#image'.$i.'" onclick="updateSource('.$i.'); loadID3tags();"><tr id="'.$i.'0" onClick="highlightSong('.$i.'0)">';
					echo '<td><a href="#image'.$i.'" onclick="updateSource('.$i.'); loadID3tags();"><img name="image'.$i.'" id="'.$i.'" data-value="sdcard/'.$json[$i]['songFileName'].'" width="45" height="50" src="'.$json[$i]['albumArt'].'"></ouput></a></td>';
					echo '<td><a href="#image'.$i.'" onclick="updateSource('.$i.'); loadID3tags();"><p class="truncate">'.htmlentities(!empty($json[$i]['songTitle']) ? implode('</p><br>', $json[$i]['songTitle'])         : chr(160)).'<br/>';
					echo ''.htmlentities(!empty($json[$i]['artistName']) ? implode('<br>', $json[$i]['artistName'])         : chr(160)).'<br/></td></tr></a></td></tr>';
			}
			else {
						
				if ($json[$i]['albumName']!=$json[$i-1]['albumName'])
				{
						
						echo '</table></div>';
						echo '<div class="accordion-toggle" style="color: #fff;"> <div data-toggle="collapse" data-target="#div'.$i.'">
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img width="75" height="75" src="'.$json[$i]['albumArt'].'"> <br/>
						
						<h2 class="truncateAlbums">&nbsp;&nbsp;&nbsp;'.htmlentities(!empty($json[$i]['albumName']) ? implode('<br>', $json[$i]['albumName']) : chr(160)).'<br/><br/>';
						echo '</h2></div>';
						echo '<div id="div'.$i.'" class="collapse"><table class="table" id="songsList">';
						
						echo '<a href="#image'.$i.'" onclick="updateSource('.$i.'); loadID3tags();"><tr id="'.$i.'0" onClick="highlightSong('.$i.'0)">';
					echo '<td><a href="#image'.$i.'" onclick="updateSource('.$i.'); loadID3tags();"><img name="image'.$i.'" id="'.$i.'" data-value="sdcard/'.$json[$i]['songFileName'].'" width="45" height="50" src="'.$json[$i]['albumArt'].'"></ouput></a></td>';
					echo '<td><a href="#image'.$i.'" onclick="updateSource('.$i.'); loadID3tags();"><p class="truncate">'.htmlentities(!empty($json[$i]['songTitle']) ? implode('</p><br>', $json[$i]['songTitle'])         : chr(160)).'<br/>';
					echo ''.htmlentities(!empty($json[$i]['artistName']) ? implode('<br>', $json[$i]['artistName'])         : chr(160)).'<br/></td></tr></a></td></tr>';
					
				}
				else
				{
					echo '<a href="#image'.$i.'" onclick="updateSource('.$i.'); loadID3tags();"><tr id="'.$i.'0" onClick="highlightSong('.$i.'0)">';
					echo '<td><a href="#image'.$i.'" onclick="updateSource('.$i.'); loadID3tags();"><img name="image'.$i.'" id="'.$i.'" data-value="sdcard/'.$json[$i]['songFileName'].'" width="45" height="50" src="'.$json[$i]['albumArt'].'"></ouput></a></td>';
					echo '<td><a href="#image'.$i.'" onclick="updateSource('.$i.'); loadID3tags();"><p class="truncate">'.htmlentities(!empty($json[$i]['songTitle']) ? implode('</p><br>', $json[$i]['songTitle'])         : chr(160)).'<br/>';
					echo ''.htmlentities(!empty($json[$i]['artistName']) ? implode('<br>', $json[$i]['artistName'])         : chr(160)).'<br/></td></tr></a>';
					}
			}
		}
	?>

</body>
</html>
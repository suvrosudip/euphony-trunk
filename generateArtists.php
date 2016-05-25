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
			$artists[$key]  = $row['artistName'];
			
		}

		// Sort the data with volume descending, edition ascending
		// Add $data as the last parameter, to sort by the common key
		array_multisort($artists, SORT_ASC, $json);
		
		/*for($i=1; $i<count($json); $i++) {
			
				if ($json[$i]['artistName']!=$json[$i+1]['artistName'])
				{
					
						//echo 'Found match for '.$i.' at '.$j.'!';
						echo ''.htmlentities(!empty($json[$i]['artistName']) ? implode('<br>', $json[$i]['artistName'])         : chr(160)).'<br/>';
						//$artists[$i]= $json[$i]['artistName'];
					
				}
				else
				{
					//echo 'No match<br>'.$i.' at '.$j.'!';
				}
			/*echo '<a href="#image'.$i.'" onclick="updateSource('.$i.'); loadID3tags();"><tr id="'.$i.'0" onClick="highlightSong('.$i.'0)">';
			echo '<td><a href="#image'.$i.'" onclick="updateSource('.$i.'); loadID3tags();"><img name="image'.$i.'" id="'.$i.'" data-value="sdcard/'.$json[$i]['songFileName'].'" width="45" height="50" src="'.$json[$i]['albumArt'].'"></ouput></a></td>';
			echo '<td><a href="#image'.$i.'" onclick="updateSource('.$i.'); loadID3tags();"><p class="truncate">'.htmlentities(!empty($json[$i]['songTitle']) ? implode('</p><br>', $json[$i]['songTitle'])         : chr(160)).'<br/>';
			echo ''.htmlentities(!empty($json[$i]['artistName']) ? implode('<br>', $json[$i]['artistName'])         : chr(160)).'<br/></td></tr></a>';*/
			
		//}
		
		/*$i = 1;
		for($i; $i<count($json); $i++) {
		
			if ($i!=1)
			{
				
				if ($json[$i]['albumName']!=$json[$i-1]['albumName'])
				{
					echo '<tr><td><img name="image'.$i.'" id="'.$i.'" width="75" height="75" src="'.$json[$i]['albumArt'].'"><br/>';
					echo '<h4>'.htmlentities(!empty($json[$i]['albumName']) ? implode('<br>', $json[$i]['albumName'])         : chr(160)).'<br/>';
					echo '</h4><td/></tr>';
					echo '<tr><td>';
					//echo ''.htmlentities(!empty($json[$i]['songTitle']) ? implode('<br>', $json[$i]['songTitle'])         : chr(160)).'</td><tr>';
					//echo '<td> <button type="button" class="btn" data-toggle="collapse" data-target="#collapse'.$i.'"> Songs </button> </td></tr>';
					//echo '<tr id='.$i.'>';
				}
				else
				{
					
				}
				echo ''.htmlentities(!empty($json[$i]['songTitle']) ? implode('<br>', $json[$i]['songTitle'])         : chr(160)).'</td><tr>';
				
			
			}
			else
			{
				///echo '<center><img name="image'.$i.'" id="'.$i.'" data-value="sdcard/'.$json[$i]['songFileName'].'" width="45" height="50" src="'.$json[$i]['albumArt'].'"><br/>';
				//echo '<h3>'.htmlentities(!empty($json[$i]['albumName']) ? implode('<br>', $json[$i]['albumName'])         : chr(160)).'<br/>';
				//echo '</h3></center><br/>';
				//echo ''.htmlentities(!empty($json[$i]['songTitle']) ? implode('<br>', $json[$i]['songTitle'])         : chr(160)).'<br/>';
			}
			
		}*/
		
		
		
		for($i=1; $i<count($json); $i++) {
			if ($i==1)
			{
				if ($json[$i]['artistName']==$json[$i+1]['artistName'])
				{
					echo '<div class="accordion-toggle" style="color: #fff;"> <div data-toggle="collapse" data-target="#div'.$i.'"><h2 class="truncate">&nbsp;&nbsp;&nbsp;'.htmlentities(!empty($json[$i]['artistName']) ? implode('<br>', $json[$i]['artistName']) : chr(160)).'';
					echo '</h2></div>';
					echo '<div id="div'.$i.'" class="collapse"><table class="table" id="songsList">';
					echo '<a href="#image'.$i.'" onclick="updateSource('.$i.'); loadID3tags();"><tr id="'.$i.'0" onClick="highlightSong('.$i.'0)">';
					echo '<td><a href="#image'.$i.'" onclick="updateSource('.$i.'); loadID3tags();"><img name="image'.$i.'" id="'.$i.'" data-value="sdcard/'.$json[$i]['songFileName'].'" width="45" height="50" src="'.$json[$i]['albumArt'].'"></ouput></a></td>';
					echo '<td><a href="#image'.$i.'" onclick="updateSource('.$i.'); loadID3tags();"><p class="truncate">'.htmlentities(!empty($json[$i]['songTitle']) ? implode('</p><br>', $json[$i]['songTitle'])         : chr(160)).'<br/>';
					echo ''.htmlentities(!empty($json[$i]['albumName']) ? implode('<br>', $json[$i]['albumName'])         : chr(160)).'<br/></td></tr></a></td></tr>';
				}
				else 
				{
					echo '<div class="accordion-toggle" style="color: #fff;"> <div data-toggle="collapse" data-target="#div'.$i.'"><h2 class="truncate">&nbsp;&nbsp;&nbsp;'.htmlentities(!empty($json[$i]['artistName']) ? implode('<br>', $json[$i]['artistName']) : chr(160)).'';
					echo '</h2></div>';
					echo '<div id="div'.$i.'" class="collapse"><table class="table" id="songsList">';
					echo '<a href="#image'.$i.'" onclick="updateSource('.$i.'); loadID3tags();"><tr id="'.$i.'0" onClick="highlightSong('.$i.'0)">';
					echo '<td><a href="#image'.$i.'" onclick="updateSource('.$i.'); loadID3tags();"><img name="image'.$i.'" id="'.$i.'" data-value="sdcard/'.$json[$i]['songFileName'].'" width="45" height="50" src="'.$json[$i]['albumArt'].'"></ouput></a></td>';
					echo '<td><a href="#image'.$i.'" onclick="updateSource('.$i.'); loadID3tags();"><p class="truncate">'.htmlentities(!empty($json[$i]['songTitle']) ? implode('</p><br>', $json[$i]['songTitle'])         : chr(160)).'<br/>';
					echo ''.htmlentities(!empty($json[$i]['albumName']) ? implode('<br>', $json[$i]['albumName'])         : chr(160)).'<br/></td></tr></a></td></tr></table></div>';
				}
				
			}				
			else
			{
				if ($json[$i]['artistName']!=$json[$i-1]['artistName'])
				{
					echo '</table></div>';
							echo '<div class="accordion-toggle" style="color: #fff;"> <div data-toggle="collapse" data-target="#div'.$i.'"><h2 class="truncate">&nbsp;&nbsp;&nbsp;'.htmlentities(!empty($json[$i]['artistName']) ? implode('<br>', $json[$i]['artistName']) : chr(160)).'';
					echo '</h2></div>';
					echo '<div id="div'.$i.'" class="collapse"><table class="table" id="songsList">';
					echo '<a href="#image'.$i.'" onclick="updateSource('.$i.'); loadID3tags();"><tr id="'.$i.'0" onClick="highlightSong('.$i.'0)">';
					echo '<td><a href="#image'.$i.'" onclick="updateSource('.$i.'); loadID3tags();"><img name="image'.$i.'" id="'.$i.'" data-value="sdcard/'.$json[$i]['songFileName'].'" width="45" height="50" src="'.$json[$i]['albumArt'].'"></ouput></a></td>';
					echo '<td><a href="#image'.$i.'" onclick="updateSource('.$i.'); loadID3tags();"><p class="truncate">'.htmlentities(!empty($json[$i]['songTitle']) ? implode('</p><br>', $json[$i]['songTitle'])         : chr(160)).'<br/>';
					echo ''.htmlentities(!empty($json[$i]['albumName']) ? implode('<br>', $json[$i]['albumName'])         : chr(160)).'<br/></td></tr></a></td></tr>';
											
					
				}
				else
				{
					//echo 'hidden';
				echo '<a href="#image'.$i.'" onclick="updateSource('.$i.'); loadID3tags();"><tr id="'.$i.'0" onClick="highlightSong('.$i.'0)">';
					echo '<td><a href="#image'.$i.'" onclick="updateSource('.$i.'); loadID3tags();"><img name="image'.$i.'" id="'.$i.'" data-value="sdcard/'.$json[$i]['songFileName'].'" width="45" height="50" src="'.$json[$i]['albumArt'].'"></ouput></a></td>';
					echo '<td><a href="#image'.$i.'" onclick="updateSource('.$i.'); loadID3tags();"><p class="truncate">'.htmlentities(!empty($json[$i]['songTitle']) ? implode('</p><br>', $json[$i]['songTitle'])         : chr(160)).'<br/>';
					echo ''.htmlentities(!empty($json[$i]['artistName']) ? implode('<br>', $json[$i]['artistName'])         : chr(160)).'<br/></td></tr></a></td></tr>';
					
					
				}
			}
		}
	?>

</body>
</html>
<html>
<head>
<script type="text/javascript" src="js/jquery-1.12.0.min.js"></script>
</head>
<body>
<div class="container" style="font-color: #FFFFFF;">	       
<table id="songsList" class="table" style="border-style: none;">
<tbody>
	<?php
		$str = file_get_contents('config/songsList.json');
		$json = json_decode($str, true); // decode the JSON into an associative array
		//var_dump($json);
		$artists=array();
		
		
		// Obtain a list of columns
		foreach ($json as $key => $row) {
			$artistName[$key]  = $row['artistName'];
			
		}

		// Sort the data with volume descending, edition ascending
		// Add $data as the last parameter, to sort by the common key
		array_multisort($artistName, SORT_ASC, $json);
		
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
		
		$i = 1;
		for($i; $i<count($json); $i++) {
			echo '<a href="#image'.$i.'" onclick="updateSource('.$i.'); loadID3tags();"><tr id="'.$i.'0" onClick="highlightSong('.$i.'0)">';
			echo '<td><a href="#image'.$i.'" onclick="updateSource('.$i.'); loadID3tags();"><img name="image'.$i.'" id="'.$i.'" data-value="sdcard/'.$json[$i]['songFileName'].'" width="45" height="50" src="'.$json[$i]['albumArt'].'"></ouput></a></td>';
			echo '<td><a href="#image'.$i.'" onclick="updateSource('.$i.'); loadID3tags();"><p class="truncate">Artist: '.htmlentities(!empty($json[$i]['artistName']) ? implode('</p><br>', $json[$i]['artistName'])         : chr(160)).'<br/>';
			echo ''.htmlentities(!empty($json[$i]['songTitle']) ? implode('<br>', $json[$i]['songTitle'])         : chr(160)).'<br/></td></tr></a>';
		}
		
	?>
</tbody>
</table>
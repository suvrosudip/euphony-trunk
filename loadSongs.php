<?php
	
	
	$mtime = microtime(); 
	$mtime = explode(" ",$mtime); 
	$mtime = $mtime[1] + $mtime[0]; 
	$starttime = $mtime;
	set_time_limit(0);
	error_reporting(0);
	$DirectoryToScan = 'sdcard/'; // change to whatever directory you want to scan
	
	function hashDirectory($directory)
		{
			if (! is_dir($directory))
			{
				return false;
			}
		 
			$files = array();
			$dir = dir($directory);
		 
			while (false !== ($file = $dir->read()))
			{
				if ($file != '.' and $file != '..')
				{
					if (is_dir($directory . '/' . $file))
					{
						$files[] = hashDirectory($directory . '/' . $file);
					}
					else
					{
						$files[] = md5_file($directory . '/' . $file);
					}
				}
			}
		 
			$dir->close();
		 
			return md5(implode('', $files));
		}
		
		$currentHashDirectoryValue = hashDirectory($DirectoryToScan);

		clearstatcache(); 		
		if(!file_exists("config/hashDirectoryValue.txt")) 
		{ 
		   //echo "Hash File Does not exist! Creating hash file";
		   $fp = fopen("config/hashDirectoryValue.txt","w");  
		   fwrite($fp,$currentHashDirectoryValue);  
		   fclose($fp);
		   loadSongsMetaData($DirectoryToScan);
		   // echo "Done Loading Songs Meta Data into JSON File";
		}  
		else
		{
			$hashDirectoryFile = "config/hashDirectoryValue.txt";
			$handle = fopen($hashDirectoryFile, "r");
			$contents = fread($handle, filesize($hashDirectoryFile));
			fclose($handle);
			if ($contents!=$currentHashDirectoryValue)
			{
				loadSongsMetaData($DirectoryToScan);
				$fp = fopen("config/hashDirectoryValue.txt","w");  
				fwrite($fp,$currentHashDirectoryValue);  
				fclose($fp);
			}
			else
			{
				// UNIT TEST
				//echo "No changes detected!";
				
				
			}
		}
				
		function loadSongsMetaData($DirectoryToScan) {
			class Songs {
				  public $songFileName = "";
				  public $songTitle = "";
				  public $artistName  = "";
				  public $albumName = "";
				  public $albumArt = "";
			}
		
			// include getID3() library 
			require_once('getid3/getid3.php');
			
			// Initialize getID3 engine
			$getID3 = new getID3;
			$dir = opendir($DirectoryToScan);
			$countSong=0;
			while (($file = readdir($dir)) !== false) {
				$FullFileName = realpath($DirectoryToScan.'/'.$file);
				print $countSong;
				echo '<br/>';
				
				$checkforTens = $countSong%10;
				if ($checkforTens==0) {
					//print $checkforTens;
					$countSong++;
				}
				else 
					{					
						if ((substr($file, 0, 1) != '.') && is_file($FullFileName)) {
							$songsList[$countSong] = new Songs();
							$NoAlbumArt = 'data:image/jpeg;base64,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';
							$ThisFileInfo = $getID3->analyze($FullFileName);
							getid3_lib::CopyTagsToComments($ThisFileInfo);
							$Image1='data:'.$ThisFileInfo['comments']['picture'][0]['image_mime'].';charset=utf-8;base64,'.base64_encode($ThisFileInfo['comments']['picture'][0]['data']);
							$EmptyImage = 'data:;charset=utf-8;base64,';
							if ($Image1 != $EmptyImage) {
								$AlbumArt = $Image1;
							}
							else {
								$AlbumArt = $NoAlbumArt;
							}									
							
							$songsList[$countSong]->songFileName = $file;
							if ($ThisFileInfo['comments_html']['title'] != null){
								$songsList[$countSong]->songTitle = $ThisFileInfo['comments_html']['title'];
							}
							else {
								$songsList[$countSong]->songTitle = [$file]; 		
							}
							
							if ($ThisFileInfo['comments_html']['artist'] != null) {
								$songsList[$countSong]->artistName = $ThisFileInfo['comments_html']['artist'];
							}
							else {
								$songsList[$countSong]->artistName = ["Unknown Artist"];
							}
							
							if ($ThisFileInfo['comments_html']['album'] != null) {
								$songsList[$countSong]->albumName = $ThisFileInfo['comments_html']['album'];
							}
							else {
								$songsList[$countSong]->albumName = ["Unknown Album"];
							}
						
							$songsList[$countSong]->albumArt = $AlbumArt;  //Album Art logic is already done!
						
						}
						$countSong++;
					}
			}
			file_put_contents('config/songsList.json', json_encode($songsList, true));
		}	
	
	$mtime = microtime(); 
	$mtime = explode(" ",$mtime); 
	$mtime = $mtime[1] + $mtime[0]; 
	$endtime = $mtime; 
	$totaltime = ($endtime - $starttime); 

	//Time to load
	$fp = fopen("config/KPI.txt","w");  
	fwrite($fp,$totaltime);  
	fclose($fp);
	
?>


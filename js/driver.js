var currentSongCount;
var previousSongCount=0;  

function updateSource(song){ 
	previousSongCount = currentSongCount;
	currentSongCount = song;
	//alert(currentSongCount);
	var player = document.getElementById('player');
    var source = document.getElementById('src1');
	source.src = document.getElementById(song).getAttribute('data-value');
	//alert(source.src);
	player.load();
	player.play();
	playButton.className = "";
	playButton.className = "pause";
	loadID3tags();
	

		
}



var activeSong;
//Does a switch of the play/pause with one button.
function playPause(id){
	var playButton = document.getElementById('playButton'); // play button
    //Sets the active song since one of the functions could be play.
    activeSong = document.getElementById('player');
    //Checks to see if the song is paused, if it is, play it from where it left off otherwise pause it.
    if (activeSong.paused){
         activeSong.play();
		playButton.className = "";
			playButton.className = "pause";
    }else{
         activeSong.pause();
		 playButton.className = "";
		playButton.className = "play";
    }
}

function gotoRow(val){ 
document.getElementById('songsList').style.top=document.getElementById('row'+val).offsetTop*-1+'px'; }

//Updates the current time function so it reflects where the user is in the song.
//This function is called whenever the time is updated.  This keeps the visual in sync with the actual time.
function updateTime(){
	activeSong = document.getElementById('player');
    var currentSeconds = (Math.floor(activeSong.currentTime % 60) < 10 ? '0' : '') + Math.floor(activeSong.currentTime % 60);
    var currentMinutes = Math.floor(activeSong.currentTime / 60);
    //Sets the current song location compared to the song duration.
    document.getElementById('currentSongTimeElapsed').innerHTML = currentMinutes + ":" + currentSeconds;
	document.getElementById('currentSongDuration').innerHTML = Math.floor(activeSong.duration / 60) + ":" + (Math.floor(activeSong.duration % 60) < 10 ? '0' : '') + Math.floor(activeSong.duration % 60);
	

    //Fills out the slider with the appropriate position.
    var percentageOfSong = (activeSong.currentTime/activeSong.duration);
	var percentageOfSlider = document.getElementById('songSlider').offsetWidth * percentageOfSong;
    
    //Updates the track progress div.
    document.getElementById('trackProgress').style.width = Math.round(percentageOfSlider) + "px";
	
	
	var STATE_AUTOPLAY = document.getElementById("SIGNAL_AUTOPLAY").checked;
	var STATE_SHUFFLE = document.getElementById("SIGNAL_SHUFFLE").checked;
	var TOTAL_SONGS = document.getElementById("totalSongs").value;
	
	// AutoPlay & Shuffle Logic
	if(percentageOfSong==1.0 && STATE_AUTOPLAY == true)
	{
		if(STATE_SHUFFLE == false) {
			var countTR = 10 * currentSongCount;
			var row = document.getElementById(countTR);
			currentSongCount++;
			updateSource(currentSongCount);
			row.className = "";
			countTR = 10 * currentSongCount;
			row = document.getElementById(countTR);
			row.className = "active";
			var scrollRow = countTR - 30;
			var rowToScroll = document.getElementById(scrollRow);
			rowToScroll.scrollIntoView(true);
			
		}
		else
		{
			var countTR = 10 * currentSongCount;
			var row = document.getElementById(countTR);
			currentSongCount = Math.floor((Math.random() * TOTAL_SONGS) + 1);
			updateSource(currentSongCount);
			row.className = "";
			countTR = 10 * currentSongCount;
			row = document.getElementById(countTR);
			row.className = "active";
			var scrollRow = countTR - 30;
			var rowToScroll = document.getElementById(scrollRow);
			rowToScroll.scrollIntoView(true);
			
		}
		
	}
	
	
	
}




//Sets the location of the song based off of the percentage of the slider clicked.
function setLocation(percentage){
    activeSong.currentTime = activeSong.duration * percentage;
}
/*
Gets the percentage of the click on the slider to set the song position accordingly.
Source for Object event and offset: http://website-engineering.blogspot.com/2011/04/get-x-y-coordinates-relative-to-div-on.html
*/
function setSongPosition(obj,e){
    //Gets the offset from the left so it gets the exact location.
    var songSliderWidth = obj.offsetWidth;
    var evtobj=window.event? event : e;
    clickLocation =  evtobj.layerX - obj.offsetLeft;
    
    var percentage = (clickLocation/songSliderWidth);
    //Sets the song location with the percentage.
    setLocation(percentage);
}



//Stop song by setting the current time to 0 and pausing the song.
function stopSong(){
    activeSong.currentTime = 0;
    activeSong.pause();
	playButton.className = "";
		playButton.className = "play";
}


function forward(){
   var countTR = 10 * currentSongCount;
		var row = document.getElementById(countTR);
		currentSongCount++;
		updateSource(currentSongCount);
		row.className = "";
		countTR = 10 * currentSongCount;
		row = document.getElementById(countTR);
		row.className = "active";
		var scrollRow = countTR - 30;
		var rowToScroll = document.getElementById(scrollRow);
		rowToScroll.scrollIntoView(true);
		
		
		
}


function backward(){
   var countTR = 10 * currentSongCount;
		var row = document.getElementById(countTR);
		currentSongCount--;
		updateSource(currentSongCount);
		row.className = "";
		countTR = 10 * currentSongCount;
		row = document.getElementById(countTR);
		row.className = "active";
		var scrollRow = countTR - 30;
		var rowToScroll = document.getElementById(scrollRow);
		rowToScroll.scrollIntoView(true);
}

function highlightSong(countTR){
	if (countTR==20)
	{
		document.getElementById(countTR).className = "active";
		//alert(previousSongCount);
		if(previousSongCount!=0) {document.getElementById(10* previousSongCount).className="";}
	}
	else
	{

		document.getElementById(10* previousSongCount).className="";
		document.getElementById(10* currentSongCount).className = "active";
		
	}
	
	

}





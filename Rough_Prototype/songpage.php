<?php
    $servername = "localhost";
$username = "root";
$password = "";
$dbName = "streamclient";

// create connection to mySQL
$conn = mysqli_connect( $servername, $username, $password);

// connects to database
mysqli_select_db($conn, 'streamclient');

// check the connection
if( !$conn )
 {
  die( "Connection failed: " . mysqli_connect_error() );
 }
?>

<!DOCTYPE html>

<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel = "stylesheet"
    type = "text/css"
    href = "homepage.css" />
    
    <link rel = "stylesheet"
          type = "text/css"
          href = "playButton.css"/>
    
    <link href="https://fonts.googleapis.com/css?family=Karla" rel="stylesheet">
    
    <style>
        div#mp3_player{ position: fixed; bottom: 0; width:100%; height:60px; background:#000; padding:5px; margin:50px auto; }
        div#mp3_player > div > audio{  width:500px; background:#000; float:left;  }
        div#mp3_player > canvas{ width:73.8%; height:60px; background-color: #9ebfc1; float:left; }
    </style>
    
    <script>
        
    var endSource;
    // get song info from button selected
    function getSongInfo(thisElement)
       {
        //splits string content into an array to parse
        var songStrInfo = document.getElementById(thisElement).innerHTML.split(" ");
           
        // gets the first element which should be the song
        var song = songStrInfo[0];
           
        // gets the third element which should be the artist
        var artist = songStrInfo[2];
           
        var string = song + ' ' + artist;
        
        collectSongSource(string);
           
        
           
        //document.getElementById(thisElement).innerHTML = artist;
        //document.getElementById(elementId).innerHTML="test";
        //var songTitle = document.getElementById(element);
       }
        
    function collectSongSource(str)
        {
            var info = str.split(" ");
            
            endSource = info[0]+ ".mp3";
            
            audio.src = endSource;
            audio.load();
            audio.play();
            //starMusic(endSource);
               
        }
        
        
    // create a new instance of an audio object
//function starMusic(endSongProduct)
  //      {
         var audio = new Audio();
         audio.src = '';
         audio.controls = true;
         audio.loop = false;
         audio.autoplay = false;
    //    }
    

    
    // Establish all variables that your Analyser will use
var canvas, ctx, source, context, analyser, fbc_array, bars, bar_x, bar_width, bar_height;
// Initialize the MP3 player after the page loads all of its HTML into the window
window.addEventListener("load", initMp3Player, false);
function initMp3Player(){
	document.getElementById('audio_box').appendChild(audio);
	context = new AudioContext(); // AudioContext object instance
    context.resume();
	analyser = context.createAnalyser(); // AnalyserNode method
	canvas = document.getElementById('analyser_render');
	ctx = canvas.getContext('2d');
	// Re-route audio playback into the processing graph of the AudioContext
	source = context.createMediaElementSource(audio); 
	source.connect(analyser);
	analyser.connect(context.destination);
	frameLooper();
}
// frameLooper() animates any style of graphics you wish to the audio frequency
// Looping at the default frame rate that the browser provides(approx. 60 FPS)
function frameLooper(){
	window.requestAnimationFrame(frameLooper);
	fbc_array = new Uint8Array(analyser.frequencyBinCount);
	analyser.getByteFrequencyData(fbc_array);
	ctx.clearRect(0, 0, canvas.width, canvas.height); // Clear the canvas
	ctx.fillStyle = 'blueviolet'; // Color of the bars
	bars = 100;
	for (var i = 0; i < bars; i++) {
		bar_x = i * 3;
		bar_width = 2;
		bar_height = -(fbc_array[i] / 2);
		//  fillRect( x, y, width, height ) // Explanation of the parameters below
		ctx.fillRect(bar_x, canvas.height, bar_width, bar_height);
	}
}
    
    
    
    </script>
    
</head>
    
    
<body>
    
    
    <?php 
    

    
    /* This links the NavBar to the current page */
        include ( 'NavBar.php' );
    ?>
    
    <?php
// This is where we create tables for the DB



$sql = "SELECT song_id, title, artist, song_file FROM songTable";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) 
   {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) 
       {
        //$functionString = "getSongInfo('".$row['title']."')";
        // create a button here and when clicked the button plays the song which will appear at
        //  the bottom of the screen.
        $startDiv = "<div class = 'playDiv' id = '".$row['title']."'>";
        $createPlayButton = "<button class='playButton' onclick = "."getSongInfo('".$row['title']."Test')"."></button>";
        $songInfo = "<div class = 'songInfoDiv' id = '".$row['title']."Test'>".$row['title'] . " By ". $row['artist'] . "</div><br><br>";
        $endDiv = "</div>";
        echo $startDiv.$createPlayButton.$songInfo.$endDiv;
        
        
        
        
        
        
        
        
        /* create a div with a name to add a button that plays the song when selected
        echo "<div id = '" . $row["song_id"] . "'> <audio controls controlsList='nodownload'>
        <source src = ".$row['song_file']." /></audio>"
            . "  Title: " . $row['title'] . "    Artist: ". $row['artist'] . "<br><br>";
            */
       }
   }
    
else 
   {
    echo "0 results";
   }

mysqli_close($conn);

?>

    
    <h1>SONGPAGE</h1>
    
    
<!-- for now we will place the div here that contains the audio bar, but we should make it
     so that the bar stays and continues to play while navigating the website
-->
    <div id="mp3_player">
  <div id="audio_box" style="width:30%"></div>
  <canvas id="analyser_render" style="width:70%"></canvas>
    </div>
    
</body>
</html>
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
        div#mp3_player
        { 
            position: fixed; 
            bottom: 0%; 
            width:100%; 
            height: ; 
            background:#F3F3F3; 
            padding: 0px;
        }
        
        div#mp3_player > div > audio
        {
            width:100%; 
            background:#F3F3F3; 
            float:left; 
            height: 30px; 
            padding: 0px;
        }
        
        div#mp3_player > canvas
        { 
            width:100%; 
            height:30px; 
            background-color: #F3F3F3; 
            float:left; 
            padding: 0px;
        }
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
    canvas.backgroundColor = 'white';
	ctx.clearRect(0, 0, canvas.width, canvas.height); // Clear the canvas
	ctx.fillStyle = "#9ebfc1"; // Color of the bars
	bars = 300;
	for (var i = 0; i < bars; i++) {
		bar_x = i * 3;
		bar_width = 2;
		bar_height = -(fbc_array[i] / 2 );
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
    $spacing = "<br><br><br><br>";
    $smallerSpacing ="<br><br>";
    echo $spacing;
    
    
    //STARTED THE DIV - THE TABLE - AND THE FIRST ROW OF HEADINGS HERE
    $row = mysqli_fetch_assoc($result);
    $startDiv = "<div class = 'playDiv' id = '".$row['title']."'>";
    $startTable = "<table class='songTable' 
            style='font-family: arial, sans-serif; border-collapse: collapse; width: 100%;''>";
    $enterRow = "<tr>";
    $enterHeadings = " <th style = 'font-size:22px;'>Song Name</th>
                        <th style = 'font-size:22px;'>Artist</th>
                            ";
    echo $startDiv.$startTable.$enterRow.$enterHeadings;
    
    while($row = mysqli_fetch_assoc($result)) 
       {
        //COMMENTED OUT IS THE OLD CODE FOR PLAYING OUR SONGS WITH NO TABLE////////////////////////////////////
        //////////////////////////////////////////////////////////////////////////////////////////////////////
        /////////////////////////////////LEAVE IT FOR LATER////////////////////////////////////////////////////
        
        //$functionString = "getSongInfo('".$row['title']."')";
        // create a button here and when clicked the button plays the song which will appear at
        //  the bottom of the screen.
        //$startDiv = "<div class = 'playDiv' id = '".$row['title']."'>";
        //$createPlayButton = "<button class='playButton' onclick = "."getSongInfo('".$row['title']."Test')"." >&#9658;</button>";
        
        $songInfo = "&emsp;<div class = 'songInfoDiv' style = 'display:none;' id = '".$row['title']."Test'>".$row['title'] . " by ". $row['artist'];
        echo $songInfo;
        
        $enterRow = "<tr>";
        $enterData = "<td class= 'SongNameClick' onclick = "."getSongInfo('".$row['title']."Test')".">"  .$row['title']. " </td><td> " .$row['artist']. " </td>";
        $endRow = "</tr>";

        
        echo $enterRow.$enterData.$endRow;

        /* create a div with a name to add a button that plays the song when selected
        echo "<div id = '" . $row["song_id"] . "'> <audio controls controlsList='nodownload'>
        <source src = ".$row['song_file']." /></audio>"
            . "  Title: " . $row['title'] . "    Artist: ". $row['artist'] . "<br><br>";
            */
       }
    
    //END THE TABLE AND DIV HERE AFTER ALL THE SONGS HAVE BEEN ENTERED
        $endTable = "</table>";
        $endDiv = "</div>";
        echo $endTable.$endDiv;
   }
    
else 
   {
    echo "0 results";
   }

mysqli_close($conn);

?>

    
    
    
<!-- for now we will place the div here that contains the audio bar, but we should make it
     so that the bar stays and continues to play while navigating the website
-->
    <div id="mp3_player" style="background-color: #F3F3F3;">
  <div id="audio_box"></div><br>
  <canvas id="analyser_render"></canvas>
    </div>
    
</body>
</html>
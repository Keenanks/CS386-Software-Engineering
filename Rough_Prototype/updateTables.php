<?php
// This is where we create tables for the DB

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

$songList = "INSERT INTO songTable (song_file, album, genre, artist, title) VALUES ('Dee_Yan-Key_-_03_-_Intermezzo_Spettrale.mp3', 'Divertimento of Life', 'Classical',
'Dee Yan-Key', 'Intermezzo: Spettrale');";

$songList .= "INSERT INTO songTable (song_file, album, genre, artist, title) VALUES ('Dee_Yan-Key_-_04_-_Vivace_con_spirito.mp3', 'Divertimento of Life', 'Classical',
'Dee Yan-Key', 'Vivace con spirito');";

$songList .= "INSERT INTO songTable (song_file, album, genre, artist, title) VALUES ('Deep.mp3', '386SQUAD', 'HipHop',
'NOR.T.H', 'Deep');";

$songList .= "INSERT INTO songTable (song_file, album, genre, artist, title) VALUES ('Ocean.mp3', '386SQUAD', 'HipHop',
'NOR.T.H', 'Ocean');";

$songList .= "INSERT INTO songTable (song_file, album, genre, artist, title) VALUES ('Peak.mp3', '386SQUAD', 'HipHop',
'NOR.T.H', 'Peak');";

$songList .= "INSERT INTO songTable (song_file, album, genre, artist, title) VALUES ('Potential.mp3', '386SQUAD', 'HipHop',
'NOR.T.H', 'Potential');";

$songList .= "INSERT INTO songTable (song_file, album, genre, artist, title) VALUES ('Reality.mp3', '386SQUAD', 'HipHop',
'NOR.T.H', 'Reality');";

$songList .= "INSERT INTO songTable (song_file, album, genre, artist, title) VALUES ('Unchanged.mp3', '386SQUAD', 'HipHop',
'NOR.T.H', 'Unchanged');";

if( mysqli_multi_query($conn, $songList))
   {
    echo "songs added successfully"; 
   }
else
   {
    echo "Error: " . $songList . "<br>" . mysqli_error($conn);
   }

mysqli_close($conn);

?>
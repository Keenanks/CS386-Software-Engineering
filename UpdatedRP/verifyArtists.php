<?php
session_start();


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


$sql = 'SELECT song_file, title FROM disctable WHERE verify = "No"';

$result = mysqli_query($conn, $sql);



if($result)
{
   $array = mysqli_fetch_all($result, MYSQLI_NUM);
   //$array = explode(',', $array);
   //print_r($array);
}




//
?>

<!DOCTYPE html>

<html>
   <head>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script>
         
         
         
         
         
         
         
         
         var songInfo = 0;
         var songFile = 0, title = 1;
         var array = <?php echo json_encode($array); ?>;
         function loadFirstSong()
         {
            if(array[songFile]!=null)
               {
                  document.getElementById('songTitle').innerHTML = "You're Listening To " + 
               array[songInfo][title];
            
            var audio = document.getElementById('audio');
            audio.src = './songs/'+array[songInfo][songFile];
            
            
            document.getElementById('initStart').hidden = true;
            document.getElementById('playBox').hidden = false;
            audio.load();
               }
            
            else
               {
                  document.getElementById('initStart').hidden = true;
                  document.getElementById('playBox').hidden = true;
                  document.getElementById('outOfSongs').hidden = false;
               }
            
         }
         
         function loadNextSong()
         {
            document.getElementById('likeBtn').hidden=true;
            songInfo++;
            if(array[songInfo]!= null)
               {
                  document.getElementById('songTitle').innerHTML = "You're Listening To " + 
                     array[songInfo][title];
            
                  var audio = document.getElementById('audio');
                  audio.src = './songs/'+array[songInfo][songFile];
                  audio.load();
               }
            else
               {
                  document.getElementById('playBox').hidden = true;
                  document.getElementById('outOfSongs').hidden = false;
               }
         }
         
         function navBack()
            {
               location.href = 'DiscoverPage.php';
            }
         
         function checkSongEnd()
            {
             document.getElementById('likeBtn').hidden=false;
            }
         
         function likeSong()
         {
            document.getElementById('likeBtn').hidden=true;
            $.ajax(
               {
                  url: 'likeSong.php',
                  type: "GET",
                  data: {songInfo:songInfo},
                  cache: false,
               }
            );
            

               
                     
            loadNextSong();
         }
      
      </script>
   
   
   </head>
   
   <body>
      <button id = 'initStart' onclick="loadFirstSong()">Begin Verifying Songs</button>
      <div id = 'playBox' hidden>
         <h1 id = 'songTitle'></h1>
         <audio id = 'audio' controls volume='3' controlsList="nodownload" onended = 
                'checkSongEnd()' seeking = 'false'></audio>
         <br>
         <button onclick="loadNextSong()">skip</button>
         <button id = 'likeBtn' onclick="likeSong()" hidden>like</button>
      </div>
      
      <div id = 'outOfSongs' hidden>
         <p><b><h1>There are no more songs to rate</h1></b></p>
         <button onclick = "navBack()">Go Back</button>
      </div>
   </body>



</html>
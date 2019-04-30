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

$songInfo = $_GET['songInfo'];
$songFile = 0;
$title = 1;


if($result)
{
   $array = mysqli_fetch_all($result, MYSQLI_NUM);
   //$array = explode(',', $array);
   //print_r($array);
}



$update = 'UPDATE disctable SET likes = likes + 1 WHERE song_file = "'.
                  $array[$songInfo][$songFile].'" AND title = "'.$array[$songInfo][$title].'"';
            
            mysqli_query($conn,$update);

$selectLikes = 'SELECT * FROM disctable WHERE song_file = "'.
                  $array[$songInfo][$songFile].'" AND title = "'.$array[$songInfo][$title].'"';

$selectLikeResult = mysqli_query($conn,$selectLikes);

if($selectLikeResult)
{
   $likeArray = mysqli_fetch_row($selectLikeResult);
   if($likeArray[6]>0)
   {
     $updateVerify = 'UPDATE disctable SET verify = "Yes" WHERE song_file = "'.
                  $array[$songInfo][$songFile].'" AND title = "'.$array[$songInfo][$title].'"';
            
            mysqli_query($conn,$updateVerify);
   }
}

 
?>

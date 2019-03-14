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
    
    <link href="https://fonts.googleapis.com/css?family=Karla" rel="stylesheet">
    
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

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        // create a div with a name to add a button that plays the song when selected
        echo "<div id = '" . $row["song_id"] . "'> <audio controls controlsList='nodownload'>
        <source src = ".$row['song_file']." /></audio>"
            . "  Title: " . $row['title'] . "    Artist: ". $row['artist'] . "<br><br>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);

?>

    
    <h1>SONGPAGE</h1>
    
    
    
    
</body>
</html>
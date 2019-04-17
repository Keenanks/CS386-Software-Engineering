<?php include('NavBar.php');

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

if( $_SESSION[] = null )
    {
     session_start();
    }
?>

<!DOCTYPE HTML>

<html>
    <head>
       <title>Discover</title>
        
        
       <link rel = "stylesheet"
          type = "text/css"
          href = "discoverCSS.css"/>
        
        <script src="SongPage_Script.js"></script>
        
        <script>
            function displaySongsForTab(evnt, table)
            {
                var iter, content, links;
                
                content = document.getElementsByClassName("content");
                for( iter = 0; iter < content.length; iter++ )
                    {
                        content[iter].style.display = "none";
                    }
                
                links = document.getElementsByClassName("buttonTab");
                for( iter = 0; iter < links.length; iter++ )
                    {
                        links[iter].className = links[iter].className.replace(" active", "");
                    }
                
                document.getElementById(table).style.display = "block";
                evnt.currentTarget.className += " active";
                
            }
            
            // default tab that is opened
                // default is all
            
        </script>
    
    </head>

    <body>
        
       <!-- TODO

            1) create a button somewhere that has a popup needing a subscribed account
                in order to rate/verify artists
            2) layout the page like songpage but with the option to view all artists or only verified artists
       -->
        
    <!-- create a div that has two tabs
            1) For all indie artists
            2) Only verified artists
    
                then display the songs that fall in the category
    -->
        <br><br><br>
        <br>
        <div class='generalSongTable'>
            <div class="tabs">
                <button class="buttonTab" id="verified" onclick = "displaySongsForTab(event,'verifiedTable')">Discover Verified Indie Artists</button>
                <button class="buttonTab" id="allDiscover" onclick = "displaySongsForTab(event,'allTable')">Discover All Indie Artists</button>
            </div>
            
            <div class = "content" id="verifiedTable">
                <?php
        $sql = "SELECT song_id, title, artist, song_file FROM discTable WHERE verify = 'Yes'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) 
   {
    // output data of each row
    $spacing = "<br><br><br><br>";
    $smallerSpacing ="<br><br>";
    echo $smallerSpacing;
    
    
    //STARTED THE DIV - THE TABLE - AND THE FIRST ROW OF HEADINGS HERE
    //$row = mysqli_fetch_assoc($result);
    $startDiv = "<div class = 'playDiv'>";
    $startTable = "<table class='songTable' 
            style='font-family: arial, sans-serif; border-collapse: collapse; width: 100%;''>";
    $enterRow = "<tr>";
    $enterHeadings = " <th style = 'font-size:22px;'>Song Name</th>
                        <th style = 'font-size:22px;'>Artist</th>
                            ";
    $endRow = "</tr>";
    echo $startDiv.$startTable.$enterRow.$enterHeadings.$endRow;
    
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
                ?>

            
            
            </div>
            
            
            <div class = "content" id="allTable">
                <?php
        $sql = "SELECT song_id, title, artist, song_file FROM discTable";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) 
   {
    // output data of each row
    $spacing = "<br><br><br><br>";
    $smallerSpacing ="<br><br>";
    echo $smallerSpacing;
    
    
    //STARTED THE DIV - THE TABLE - AND THE FIRST ROW OF HEADINGS HERE
    //$row = mysqli_fetch_assoc($result);
    $startDiv = "<div class = 'playDiv'>";
    $startTable = "<table class='songTable' 
            style='font-family: arial, sans-serif; border-collapse: collapse; width: 100%;''>";
    $enterRow = "<tr>";
    $enterHeadings = " <th style = 'font-size:22px;'>Song Name</th>
                        <th style = 'font-size:22px;'>Artist</th>
                            ";
    $endRow = "</tr>";
    echo $startDiv.$startTable.$enterRow.$enterHeadings.$endRow;
    
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
?>
            
            </div>
        
        
        
        
        
        
        </div>
        
        
        
        
        
        
        
        
        
        
    <!-- If the user doesn't have a subscription, then they have X amount of uploads a month,
           else they have Y uploads per month
____________________________________________________________________________________________________

                if the user subscribes after uploading some songs they get Y+X... we have to make sure
                    we decrement X or Y after every upload
    -->
    
        
    <!-- Drag and drop pop up w/ browse option -->
    <button>Upload Song</button>
        
        
        
        
        
        
        
    <!-- TODO

            
            **NOTE** Collect total amount of upvoats to verify artis **


            
            First check if the user is subscribed
                if user is not subscribed
                    popup pay for subscription or go back

                else
                    redirect to a new tab
                    there is a randomized list
                    to vote yes for someone the song has to be listened to in its entirity
                        otherwise, the user can skip before the end of song or end


//////////////////////////////////////////////////////////////////////////////////////////////////////
    -->
        
    <button>Help Verify Indie Artists</button>
    
    
    </body>


</html>
<? php 
    mysqli_close($conn);
?>
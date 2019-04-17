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


session_start();

   // down the line we have to protect from SQL injection
    
   $user = $_POST['name'];
   $psw  = $_POST['psw'];

$sql = "SELECT userName, password FROM user WHERE userName = '".$user."' AND 
    password = '".$psw."'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) 
   {
     header('Location: homepage.php');
   }
else
{
    echo "<script> alert('The password or username is incorrect, Please try again');</script>";
    header('Location: failedLogin.php');
}

mysqli_close($conn);
?>
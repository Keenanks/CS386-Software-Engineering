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
?>

<!DOCTYPE html>
<html>
<body>
    <head></head>
<?php


   // down the line we have to protect from SQL injection
    
   $user = $_POST['name'];
   $psw  = $_POST['psw'];
   $email = $_POST['email'];

$sql = "SELECT userName, password, email FROM user WHERE userName = '".$user."' AND 
    password = '".$psw."' AND email = '".$email."'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) 
   {
     echo "<script>alert('username or email already exists');</script>";
     header('Location: failedSignup.php');
   }

else
{
    $userString =  "INSERT INTO user (userName, password, firstname, lastname, email, verified, profilePic) VALUES ('".$user.
        "','".$psw."', 'NULL','NULL', '".$email."','No','NULL');";
    mysqli_query($conn, $userString);
    echo "<script>sessionStorage.setItem('user','".$user."');</script>";
    header('Location: homepage.php');
}


?>
    
    
</body>
<?php mysqli_close($conn);?>
</html>
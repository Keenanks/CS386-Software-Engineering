<!DOCTYPE html>
<?php
echo "This is the homepage";


?>

<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel = "stylesheet"
    type = "text/css"
    href = "homepage.css" />
</head>
    
    
<body>

<div class="navbar">
    <a href="#home">
  <img src="logo%20copy.jpg" alt="Logo" class = "logo picture" style="opacity: 0.7; width: 19px;"></a>
    
  <a href="#home">Home</a>
  <a href="#songs">Songs</a>
  <a href="#shop">Shop</a>
  <a href="#discover">Discover</a>
    <a href="#account" style="float: right">
        Account
    <img src="logo%20copy.jpg" alt="Logo" class = "logo picture" style="opacity: 0.7; width: 20px; float: left">
    
    </a>
</div>

<div class="main">
    <form action="payment.php">
    <input type="submit" value="Go to payment" />
</form>
</div>
    
</body>
</html>

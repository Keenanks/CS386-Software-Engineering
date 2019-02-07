<!DOCTYPE html>

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
  <img src="logo%20copy.jpg" alt="Logo" class = "logo picture" style="opacity: 0.7; width: 16px;"></a>
    
  <a href="#home">Home</a>
  <a href="#songs">Songs</a>
  <a href="#shop">Shop</a>
  <a href="#discover">Discover</a>
  <div class="dropdown">
  <button class="dropbtn" onclick="myFunction()">Account
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-content" id="myDropdown">
    <a href="#">Link 1</a>
    <a href="#">Link 2</a>
    <a href="#">Link 3</a>
  </div>
  </div>
</div>
    
<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(e) {
  if (!e.target.matches('.dropbtn')) {
  var myDropdown = document.getElementById("myDropdown");
    if (myDropdown.classList.contains('show')) {
      myDropdown.classList.remove('show');
    }
  }
}
</script>

<div class="main">
    <h1>HOMEPAGE BITCHES</h1>
</div>
    
</body>
</html>

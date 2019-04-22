<!DOCTYPE html>
<html>

	<head>
		<script src="SongPage_Script.js"></script>
		
		<title>Body Grid</title>
		
		<style>
		
		.intro{
			padding-top: 60px;
			text-align: center;
			color: #000;
			height: auto;
			background-color: #FFF;
			font-family: Circular, Helvetica, Arial, sans-serif;
			font-size: 16px;
			line-height: 2;
		}
		
		.wrapper{
			background-color: #FFF;
			display:grid;
			grid-template-columns: repeat(3, 1fr);
			grid-gap: 2em;
			grid-auto-rows: minmax(300px, auto);
			padding: 200px

		}
		
		.wrapper > div{
			background:lightblue;
			padding:1em;
			-moz-box-shadow: 0 0 5px 5px #d5d8e0;
			-webkit-box-shadow: 0 0 5px 5px #d5d8e0;
			box-shadow: 0 0 10px 5px #d5d8e0;
			text-align: center;
			line-height: 2;
		}
		
		</style>
		
	</head>
		
		
	<body>
		
		<div class="intro">
		
			<h2 class="h1">Ready to Stream?</h2>
			<p class="lead">Start Listening!</p>
            <a href="songpage.php" >Music Player</a>
        
    </div>
		
		</div>
		
		
		<div class="wrapper">
		
			<div>
				<h1>Unchanged</h1>
				<p> NOR.T.H </p>
				
				<a class="SongNameClick" onclick="getSongInfo('UnchagedTest')">Play</a>
			
			</div>
			
			<div>
				<h1>Ocean</h1>
				<p> NOR.T.H </p>
				
				<a class="SongNameClick" onclick="getSongInfo('OceanTest')">Play</a>
			</div>
			
			<div>
				<h1>Reality</h1>
				<p> NOR.T.H </p>
				
				<a class="SongNameClick" onclick="getSongInfo('RealityTest')">Play</a>
			</div>
			
			<div>
				<h1>Potential</h1>
				<p> NOR.T.H </p>
				
				<a class="SongNameClick" onclick="getSongInfo('PotentialTest')">Play</a>
			</div>
			
			<div>
				<h1>Peak</h1>
				<p> NOR.T.H </p>
				
				<a class="SongNameClick" onclick="getSongInfo('PeakTest')">Play</a>
			</div>
			
			<div>
				<h1>Deep</h1>
				<p> NOR.T.H </p>
				
				<a class="SongNameClick" onclick="getSongInfo('DeepTest')">Play</a>
			</div>
			
		</div>
	</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<title>Jukebox</title>
</head>

<body>

	<h1>
		<center>
			Jukebox
		</center>
	</h1>

	<p>
		<center>
			Enter a song name or part of a song name to display a list of songs found on Spotify. Then select the song that you wish to be put into the list
		</center>
	</p>

	<form action="index_find_song.php" method="GET">
		<center>
			Song Name:
			<input type="text" name="song" autofocus="autofocus" value="">
			<input type="submit" value="Submit">
		</center>
	</form>
	<?php
		$file = fopen( "songs.txt" , "r" );
		echo "<ol>";
		while( !feof( $file ))
		{
			$line = fgets( $file );
			$line = preg_replace( '/\s+/' , '' , $line );
			if( $line != "" ) echo "<li>".$line."</li>";
		}
		echo "</ol>";
	?>

</body>
</html>
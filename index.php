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
	<center>
		<form action="index_find_song.php" method="GET">
			Song Name:
			<input type="text" name="song" autofocus="autofocus" value="">
			<input type="submit" value="Submit">

		</form>
	</center>
	<center>
		<form action="index_clear.php" method="GET">
			<input type="submit" value="Clear all songs">
		</form>
	</center>
	<center>
		<form action="index_delete_song.php" method="GET">
			<input type="submit" value="Remove first song">
		</form>
	</center>
	<?php
	$file = fopen( "songs.txt" , "r" );
	$first = fgets( $file );
	$first = preg_replace( '/\s+/' , '' , $first );

	if( $first != "" )
	{
		echo "<ol>";
		echo "<li>".$first."</li>";

		$url = "https://embed.spotify.com/?uri=".$first;
		echo "<iframe src=\"".$url."\" width=\"300\" height=\"380\" frameborder=\"0\" allowtransparency=\"true\"></iframe>";

		while( !feof( $file ) )
		{
			$line = fgets( $file );
			$line = preg_replace( '/\s+/' , '' , $line );
			if( $line != "" ) echo "<li>".$line."</li>";
		}
		echo "</ol>";
	}
	fclose( $file );
	?>

</body>
</html>
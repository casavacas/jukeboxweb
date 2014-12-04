<!DOCTYPE html>
<html>

<head>
	<style media="screen" type="text/css">

	#container {
		display: table;
	}
	#row  {
		display: table-row;
	}
	#leftCont {
		display: table-cell;
		width: 100px;
	}
	#centCont {
		display: table-cell;
	}
	#rightCont {
		display: table-cell;
		width: 100px;
	}
	</style>
</head>

<body>
	<?php
	$bool = false;
	$uri = $_POST["uri"];
	if( !file_exists( "songs.txt" ))
	{
		$file = fopen( "songs.txt" , "w" );
	}
	else 
	{
		$file = fopen( "songs.txt" , "r" );
		while( !feof( $file ))
		{
			$line = fgets( $file );
			$line = preg_replace( '/\s+/' , '' , $line );
			if( $line == $uri )
			{
				$bool = true;
			}
		}
	}
	fclose( $file );
	$file = fopen( "songs.txt" , "a+" );
	if( $bool == false )
	{
		echo $bool;
		fwrite( $file , $uri."\n" );
	}
	fclose( $file );
	header( "Location: index.php" );
	?>
</body>

</html>
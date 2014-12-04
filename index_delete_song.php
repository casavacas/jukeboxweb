<!DOCTYPE html>
<html>
<body>
	<?php
	$file = file_get_contents( "songs.txt" );
	$arr = explode('\n\r', $file);
	if (isset($arr[0])) unset ($arr[0]);
	$string = implode('\n\r', $arr);
	file_put_contents( "songs.txt" , $string);
	header( "Location: index.php" );
	?>
</body>
</html>
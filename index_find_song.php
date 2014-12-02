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
	<div id="leftCont"><p></p></div>
	<div id="centCont">	
		<?php
		echo "<center>Songs</center>";
		$p = $_GET["song"];
		$p = preg_replace( '/\s+/' , '' , $p );
		$url = 'https://api.spotify.com/v1/search?q='.$p.'&type=track';

		$ch = curl_init( $url ); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$json = curl_exec( $ch );
		$string = json_decode( $json , true );

		echo "<ol>";
		foreach( $string['tracks']['items'] as $item ) {
			$name = $item['name'];
			$link = $item['external_urls']['spotify'];
			$img  = $item['album']['images'][0]['url'];
			$hgt  = $item['album']['images'][0]['height'] / 2;
			$width= $item['album']['images'][0]['width'] / 2;
			$plus = "http://www.psdgraphics.com/file/blue-add-button.jpg";

			echo "<li><a href=".$link.">".$name."</a></li>";
			echo $item['uri'];
			echo "<br>";
			echo "<a href=".$link."><img src =".$img." height=".$hgt." width=".$width.">";		
		}
		echo "</ol>";
		?>
	</div>

</body>

</html>;
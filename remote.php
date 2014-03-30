<?php
$nqueries = count($_GET);

$devices = array(
	'car' => 'https://agent.electricimp.com/lbXHFMu5D9cD?power=1',
	'light' => 'https://agent.electricimp.com//V2iFqJYJrja_?[0]=[1]' );

$mdevice = $_GET['v0'];

function format($format, $args) {
	return preg_replace_callback('/\[(\\d)\]/',
		function($m) use($args) {
            // might want to add more error handling here...
			return $args[$m[1]];
		},
		$format
		);
}

function createArray($count){
	$narray = array();
	for($x = 1; $x < $count; $x++)
	{
		array_push($narray, $_GET['v'.$x]);
	}
	return $narray;
}


$url = format($devices[$mdevice], createArray($nqueries));

	echo file_get_contents($url);
	?>
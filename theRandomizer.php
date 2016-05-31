<?php 

$filename = "Tetris.nes";

$fp = fopen($filename,"rb");
$read = file_get_contents("Nintendo_seed.json");


	
$read = json_decode($read);

// foreach($read as $value){
//   echo "<li>$value->Game</li>";
// }

$random = rand(0, 754);

echo "<br/><br/>";

echo $read[$random]->Game;
//echo $read[0];
//print_r ($read[0]->Game);
//echo "hello";
	
fclose($fp);

?><!DOCTYPE HTML>
<html>
<head>
</head>
<body>
</body>
</html>
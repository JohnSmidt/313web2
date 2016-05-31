<?php 
try{
	$db = new PDO("mysql:host=localhost;week05groupactivity", "johnsmidt","scripture123");
}
catch (PODException $ex) {
	echo "Error: " . $ex->getMessage();
	die();
}



?>

<html>
<head></head>
<body> <h1> hello </h1>
	</body>
	</html>
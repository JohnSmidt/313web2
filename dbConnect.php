<?php

function connectToDb() {


	try
	{
		$user = 'steve';
		$password = 'nerdface';
		$db = new PDO('mysql:host=localhost;dbname=construct', $user, $password);
	}
	catch (PODException $ex) {
	echo "Error: " . $ex->getMessage();
	die();
	}
	return $db;
}

?>


<html>
<head>
	<title></title>
</head>
<body>

</body>
</html>
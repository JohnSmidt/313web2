<?php

require("dbConnect.php");
$db = connectToDb();

$id = $_GET['id'];
	
	$query = "SELECT name, description, id, image FROM creatures WHERE id=:id";
	$stmt = $db->prepare($query);
	$stmt->bindValue(":id", $id, PDO::PARAM_INT);
	$stmt->execute();
	//$movies = $stmt->fetchAll(PDO::FETCH_ASSOC);
	$creatures = $stmt->fetch(PDO::FETCH_ASSOC);
	$dbHosts = getenv('OPENSHIFT_HOMEDIR');

	echo $dbHosts;
	?>



	<!DOCTYPE html>
<meta charset=utf-8>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="main.css" />
</head>
<body class="selectionBody">
	<h1><?=$creatures['name']?></h1>
	<ul>
		<li><h4>Description:</h4> <?=$creatures['description']?></li>
		<li><h4>Image:</h4> <img src="assets/<?=$creatures['image']?>"></img></li>
	</ul>

</body>
</html>
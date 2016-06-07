<?php

require("dbConnect.php");
$db = connectToDb();

$id = $_GET['id'];
	
	$query = "SELECT title, year FROM movie WHERE id=:id";
	$stmt = $db->prepare($query);
	$stmt->bindValue(":id", $id, PDO::PARAM_INT);
	$stmt->execute();
	//$movies = $stmt->fetchAll(PDO::FETCH_ASSOC);
	$movie = $stmt->fetch(PDO::FETCH_ASSOC);



?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Movie Info for <?=$movie['title']?></h1>
	<ul>
		
	</ul>
</body>
</html>
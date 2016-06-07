<?php

require("dbConnect.php");
$db = connectToDb();

$id = $_GET['id'];
	
	$query = "SELECT name, description, id, image FROM biomes WHERE id=:id";
	$stmt = $db->prepare($query);
	$stmt->bindValue(":id", $id, PDO::PARAM_INT);
	$stmt->execute();
	//$movies = $stmt->fetchAll(PDO::FETCH_ASSOC);
	$biomes = $stmt->fetch(PDO::FETCH_ASSOC);

	$query2 = "SELECT name, description, id FROM creatures WHERE biomeId=:id";
	$stmt2 = $db->prepare($query2);
	$stmt2->bindValue(":id", $id, PDO::PARAM_INT);
	$stmt2->execute();
	//$movies = $stmt->fetchAll(PDO::FETCH_ASSOC);
	$creatures = $stmt2->fetchAll(PDO::FETCH_ASSOC);

	

?>
<!DOCTYPE html>
<meta charset=utf-8>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="main.css" />
</head>
<body class="selectionBody">
	<h1><?=$biomes['name']?></h1>
	<ul>
		<li><h4>Description:</h4> <?=$biomes['description']?></li>
		<li><h4>Image:</h4> <img class="entity" src="assets/<?=$biomes['image']?>"></img></li>
		<li><h4>Creatures found in this biome: </li>
		<?php
		//var_dump($db);
		foreach ($creatures as $creature) {
			$tempid = $creature['id'];
			$name = $creature['name'];
			$description = $creature['description'];
					echo "<li><a href='creature.php?id=$tempid'>" . $creature['name'] . "</a></li>";
				}
		?>

	
	</ul>
<div class="center">
<h3>--Any newly found creatures are to be added below--</h3>


	<form action="addCreature.php?id=<?=$id?>" method="POST" enctype="multipart/form-data">
		Name of creature: <input type="text" name="name" placeholder="Name"></input><br/>
		Description of creature: <textarea name="description" placeholder="Description"></textarea><br/>
		<input type="file" id="fileToUpload" name="image">
<output id="list"></output>


		<input type="submit" value="Add Creature"></input>
	</form>
</div>
</body>
</html>
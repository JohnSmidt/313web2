<?php

require("dbConnect.php");
$db = connectToDb();

$id = $_GET['id'];
	
	$query = "SELECT name, description, id FROM biomes WHERE id=:id";
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
		<li><h4>Creatures found in this biome: </li>
		<?php
		//var_dump($db);
		foreach ($creatures as $creature) {
			$id = $creature['id'];
			$name = $creature['name'];
			$description = $creature['description'];
					echo "<li><a href='creature.php?id=$id'>" . $creature['name'] . "</a></li>";
				}
		?>

	
	</ul>

<h3>--Any newly found creatures are to be added below--</h3>


	<form action="addCreature.php?id=<?=$id?>" method="POST">
		Name of creature: <input type="text" name="name" placeholder="Name"></input><br/>
		Description of creature: <textarea name="description" placeholder="Description"></textarea><br/>
		<input type="file" id="files" name="files[]" multiple />
<output id="list"></output>

<script>
  // function handleFileSelect(evt) {
  //   var files = evt.target.files; // FileList object

  //   // files is a FileList of File objects. List some properties.
  //   var output = [];
  //   for (var i = 0, f; f = files[i]; i++) {
  //     output.push('<li><strong>', escape(f.name), '</strong> (', f.type || 'n/a', ') - ',
  //                 f.size, ' bytes, last modified: ',
  //                 f.lastModifiedDate ? f.lastModifiedDate.toLocaleDateString() : 'n/a',
  //                 '</li>');
  //   }
  //   console.log(output);
  //   document.getElementById('list').innerHTML = '<ul>' + output.join('') + '</ul>';
  // }

  // document.getElementById('files').addEventListener('change', handleFileSelect, false);
</script>
		<input type="submit" value="Add Creature"></input>
	</form>
</body>
</html>
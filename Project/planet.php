<?php

require("dbConnect.php");
$db = connectToDb();

$id = $_GET['id'];
	
	$query = "SELECT name, description FROM worlds WHERE id=:id";
	$stmt = $db->prepare($query);
	$stmt->bindValue(":id", $id, PDO::PARAM_INT);
	$stmt->execute();
	//$movies = $stmt->fetchAll(PDO::FETCH_ASSOC);
	$world = $stmt->fetch(PDO::FETCH_ASSOC);

	$query2 = "SELECT name, description, id FROM biomes WHERE worldId=:id";
	$stmt2 = $db->prepare($query2);
	$stmt2->bindValue(":id", $id, PDO::PARAM_INT);
	$stmt2->execute();
	//$movies = $stmt->fetchAll(PDO::FETCH_ASSOC);
	$biomes = $stmt2->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<meta charset=utf-8>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="main.css" />
</head>
<body class="selectionBody">
	<h1><?=$world['name']?></h1>
	<ul>
		<li><h4>Description:</h4> <?=$world['description']?></li>
		<li><h4>Biomes found on this planet: </li>
		<?php
		//var_dump($db);
		foreach ($biomes as $biome) {
			$tempid = $biome['id'];
			$name = $biome['name'];
			$description = $biome['description'];
					echo "<li><a href='biome.php?id=$tempid'>" . $biome['name'] . "</a></li>";
				}
		?>

	
	</ul>

<h3>--Any newly found biomes are to be added below--</h3>


	<form action="addBiome.php?id=<?=$id?>" method="POST" enctype="multipart/form-data">
		Name of biome: <input type="text" name="name" placeholder="Name"></input><br/>
		Description of biome: <textarea name="description" placeholder="Description"></textarea><br/>
		<input type="file" id="fileToUpload" name="image">
		
<output id="list"></output>

<script>
  function handleFileSelect(evt) {
    var files = evt.target.files; // FileList object

    // files is a FileList of File objects. List some properties.
    var output = [];
    for (var i = 0, f; f = files[i]; i++) {
      output.push('<li><strong>', escape(f.name), '</strong> (', f.type || 'n/a', ') - ',
                  f.size, ' bytes, last modified: ',
                  f.lastModifiedDate ? f.lastModifiedDate.toLocaleDateString() : 'n/a',
                  '</li>');
    }
    console.log(output);
    document.getElementById('list').innerHTML = '<ul>' + output.join('') + '</ul>';
  }

  document.getElementById('files').addEventListener('change', handleFileSelect, false);
</script>
		<input type="submit" value="Add Biome"></input>
	</form>
</body>
</html>
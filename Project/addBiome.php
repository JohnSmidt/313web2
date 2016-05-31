<?php

require("dbConnect.php");
$db = connectToDb();
$worldId = $_GET['id'];
$name = htmlspecialchars($_POST['name']);
$description = htmlspecialchars($_POST['description']);



var_dump($db);


	
$query = "INSERT INTO biomes(name, description, worldId) VALUES (:name, :description, :worldId)";


$stmt = $db->prepare($query);
$stmt->bindValue(":name", $name, PDO::PARAM_STR);
$stmt->bindValue(":description", $description, PDO::PARAM_STR);
$stmt->bindValue(":worldId", $worldId, PDO::PARAM_INT);
$stmt->execute();

header("Location: planet.php");
//die("Page should have been redirected");
?>

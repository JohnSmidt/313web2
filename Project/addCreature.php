<?php

require("dbConnect.php");
$db = connectToDb();
$biomeId = $_GET['id'];
$name = htmlspecialchars($_POST['name']);
$description = htmlspecialchars($_POST['description']);



var_dump($db);


	
$query = "INSERT INTO creatures(name, description, biomeId) VALUES (:name, :description, :biomeId)";


$stmt = $db->prepare($query);
$stmt->bindValue(":name", $name, PDO::PARAM_STR);
$stmt->bindValue(":description", $description, PDO::PARAM_STR);
$stmt->bindValue(":biomeId", $biomeId, PDO::PARAM_INT);
$stmt->execute();

header("Location: biome.php");
//die("Page should have been redirected");
?>

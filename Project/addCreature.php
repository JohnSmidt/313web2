<?php

require("dbConnect.php");
$move = "/Users/John/Desktop/web2/php/Project/assets/";
$db = connectToDb();
$biomeId = $_GET['id'];
$name = htmlspecialchars($_POST['name']);
$description = htmlspecialchars($_POST['description']);
$image = addslashes(file_get_contents($_FILES['image']['tmp_name'])); //SQL Injection defence!
$image_name = ($_FILES['image']['name']);

$query = "INSERT INTO creatures(name, description, biomeId, image) VALUES (:name, :description, :biomeId, :image_name)";


$stmt = $db->prepare($query);
$stmt->bindValue(":name", $name, PDO::PARAM_STR);
$stmt->bindValue(":description", $description, PDO::PARAM_STR);
$stmt->bindValue(":biomeId", $biomeId, PDO::PARAM_INT);
$stmt->bindValue(":image_name", $image_name, PDO::PARAM_LOB);
$stmt->execute();

 // Writes the photo to the server
if (move_uploaded_file($_FILES['image']['tmp_name'], $move . $_FILES["image"]['name'])) {
    echo "Uploaded";
} else {
   echo "File was not uploaded";
}

header("Location: biome.php");
//die("Page should have been redirected");
?>

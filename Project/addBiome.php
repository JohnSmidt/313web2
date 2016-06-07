<?php

require("dbConnect.php");
$target = '/assets';
//$target = $target . basename( $_FILES['image']['name']);
$move = "/Users/John/Desktop/web2/php/Project/assets/";
$db = connectToDb();
$worldId = $_GET['id'];
$name = htmlspecialchars($_POST['name']);
$description = htmlspecialchars($_POST['description']);
$image = addslashes(file_get_contents($_FILES['image']['tmp_name'])); //SQL Injection defence!
//echo $image;
$image_name = ($_FILES['image']['name']);
//$image = htmlspecialchars($_POST['myimage'])



var_dump($db);


	
$query = "INSERT INTO biomes(name, description, worldId, image) VALUES (:name, :description, :worldId, :image_name)";




$stmt = $db->prepare($query);
$stmt->bindValue(":name", $name, PDO::PARAM_STR);
$stmt->bindValue(":description", $description, PDO::PARAM_STR);
$stmt->bindValue(":worldId", $worldId, PDO::PARAM_INT);
$stmt->bindValue(":image_name", $image_name, PDO::PARAM_LOB);
$stmt->execute();



// if ($error == UPLOAD_ERR_OK) {
//         $tmp_name = $_FILES["image"]["tmp_name"][$key];
//         $names = $_FILES["image"]["name"][$key];
//         move_uploaded_file($tmp_name, "$target/$name");
//     }

    // Writes the photo to the server
if (move_uploaded_file($_FILES['image']['tmp_name'], $move . $_FILES["image"]['name'])) {
    echo "Uploaded";
} else {
   echo "File was not uploaded";
}

header("Location: http://www.google.com"); /* Redirect browser */
exit();
?>

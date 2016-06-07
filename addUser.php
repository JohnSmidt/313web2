<?php

require 'password.php';



require("dbConnect.php");
$db = connectToDb();

$username = htmlspecialchars($_POST['username']);
$password = htmlspecialchars($_POST['password']);

$passwordHash = password_hash($password, PASSWORD_DEFAULT);
	
$query = "INSERT INTO user(username,password) VALUES (:username, :password)";


$stmt = $db->prepare($query);
$stmt->bindValue(":username", $username, PDO::PARAM_STR);
$stmt->bindValue(":password", $passwordHash, PDO::PARAM_STR);
$stmt->execute();

header("Location: signIn.php");
//die("Page should have been redirected");
?>

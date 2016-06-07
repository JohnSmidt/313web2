<?php

require("dbConnect.php");
$db = connectToDb();
	
	// $query = "SELECT id, title, year FROM movie";
	// $stmt = $db->prepare($query);

	// $stmt->execute();
	// $movies = $stmt->fetchAll(PDO::FETCH_ASSOC);



?>

<html>
<head>
	<title></title>
</head>
<body>
	<h1>Sign up</h1>
	<form action="addUser.php" method="POST">
		username: <input type="text" name="username" placeholder="username"><br/>
		password: <input type="password" name="password" placeholder="password"><br/>
		<input type="submit">
	</form>

	already have a username? <a href="signIn.php"> sign in</a> 
</body>
</html>
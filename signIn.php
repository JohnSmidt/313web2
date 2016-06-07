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
	<h1>Sign in</h1>
	<form action>
		username: <input type="text" placeholder="username"><br/>
		password: <input type="password" placeholder="password"><br/>
		<input type="submit">
	</form>

	Don't have a username? <a href="signUp.php"> sign Up</a> 

</body>
</html>
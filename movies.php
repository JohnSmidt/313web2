<?php
	try
	{
		$user = 'steve';
		$password = 'nerdface';
		$db = new PDO('mysql:host=localhost;dbname=movies', $user, $password);
	}
	catch (PODException $ex) {
	echo "Error: " . $ex->getMessage();
	die();
}
?>
<!DOCTYPE html>
<html>
<head></head>
<body>
	<h1>Movie Database</h1>

	<ul>
		<?php
		var_dump($db);
		foreach ($db->query('SELECT * FROM movie') as $row)
				{
					echo '<li>' . $row['title'] . '</li>';
				}
		?>
	</ul>
</body>
</html>
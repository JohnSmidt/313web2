<?php

//var_dump($_POST);

$name = $_POST["name"];
$email = $_POST["email"];
$major = $_POST["major"];
$comments = $_POST["comments"];



?>

<!DOCTYPE HTML>
<html>
<head>
</head>
<body>
	Hello, <?= $name ?><br/>
	<a href="mailto:<?= $email ?>"><?= $email ?></a>
	<br/>
	Your major is: <?= $major ?> <br/>

	Places you have visited: <br/>
		<ul>
			<?php 

				foreach ($_POST["visited"] as $key => $value) {
					
					echo "<li>$value</li>";
				}

			?>
		</ul>

<br/><br/>
	Comments: <p><?= $comments ?></p>
	</body>
	</html>
<?php 
try{
	$db = new PDO("mysql:host=localhost;dbname=week05groupactivity", "johnsmidt","scripture123");
}
catch (PODException $ex) {
	echo "Error: " . $ex->getMessage();
	die();
}



?>

<html>
	<head></head>
	<body> 
		<h1> Scripture Resources </h1>
		
		
			
				<form action="addScriptures.php">
				 	Book <input type='text' name='book'> <br/>
				 	Chapter <input type='text' name='chapter'> <br/>
				 	Verse <input type='text' name='verse'> <br/>
				 	Content <textarea name='content'> </textarea>

				 	<p>topics: </p>

				 	<br/>
				<?php
				 	foreach($db->query('SELECT topic FROM topic') as $row){
					
				 		echo $row['topic'] . "<input type='checkbox' name='" . $row['topic'] . "' value='" . $row['id'] . "'> <br/>"; 
					}
				?>
				 	<input type="submit" value="add scripture">

				 </form>
			
	</body>
</html>
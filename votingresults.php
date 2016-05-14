<?php session_start()?>
<?php  
    //var_dump($_POST);
    
    $name = $_POST["name"];
	$quest = $_POST["quest"];
	$color = $_POST["color"];
	$swallow = $_POST["swallow"];
	$filename = "poll_result.txt";
	$content = file($filename);

	$fp = fopen($filename,"r");
	$read = file_get_contents("poll_result.txt");
	
	$read = json_decode($read);
	
	fclose($fp);

	// used for clearing the voting
	$names    = array(0, 0, 0, 0);
	$quests   = array(0, 0, 0, 0);
	$colors   = array(0, 0, 0, 0);
	$swallows = array(0, 0, 0, 0);

	// $names    = array($read[0][0], $read[0][1], $read[0][2], $read[0][3]);
	// $quests   = array($read[1][0], $read[1][1], $read[1][2], $read[1][3]);
	// $colors   = array($read[2][0], $read[2][1], $read[2][2], $read[2][3]);
	// $swallows = array($read[3][0], $read[3][1], $read[3][2], $read[3][3]);

	// Check session id
	if( !isset($_SESSION["vote$id"])) // if session variable is not set
{
	$_SESSION["vote$id"] = 1;
	$names[$name] = $names[$name] + 1;
	$quests[$quest] = $quests[$quest] + 1;
	$colors[$color] = $colors[$color] + 1;
	$swallows[$swallow] = $swallows[$swallow] + 1;
	$results = array($names, $quests, $colors, $swallows);
	$results = json_encode($results);
	// //insert votes to txt file
	$insertvote = $results;
	$fp = fopen($filename,"w");
	fputs($fp,$insertvote);
	fclose($fp);
}

?><!DOCTYPE HTML>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="homeStyle.css" />
</head>
<body>
	<div class="container">
		<h1>Results</h1></div>
		<div class="results">
	<h3> What is your name?</h3>
		Arthur: <?= $names[0] ?> <br/>
		Galahad: <?= $names[1] ?><br/>
		Lancelot: <?= $names[2] ?><br/>
		Robin: <?= $names[3] ?><br/>
	</div><hr/>
	<div class="results">
	<h3> What is your quest?</h3>
		Go to Camelot: <?= $quests[0] ?> <br/>
		Run Away: <?= $quests[1] ?><br/>
	 	SHUBBERIES!!!: <?= $quests[2] ?><br/>
		Seek the Holy Grail: <?= $quests[3] ?><br/>
	</div><hr/>
	<div class="results">
	<h3> What is your favorite color?</h3>
		Green: <?= $colors[0] ?> <br/>
		Red: <?= $colors[1] ?><br/>
		Yellow: <?= $colors[2] ?><br/>
		Blue, no wait, Gr-: <?= $colors[3] ?><br/>
	</div><hr/>
	<div class="results">
	<h3> What is the air speed velocity of an unladen swallow?</h3>
		42: <?= $swallows[0] ?> <br/>
		~24 MPH: <?= $swallows[1] ?><br/>
		COCONUTS: <?= $swallows[2] ?><br/>
		Which one, African or European?: <?= $swallows[3] ?><br/>
	</div>
	<div class="footer">  </div>

</body>
</html>
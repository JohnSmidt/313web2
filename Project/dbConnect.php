<?php

// function connectToDb() {


// 	try
// 	{
// 		$user = 'steve';
// 		$password = 'nerdface';
// 		$db = new PDO('mysql:host=localhost;dbname=construct', $user, $password);
// 	}
// 	catch (PODException $ex) {
// 	echo "Error: " . $ex->getMessage();
// 	die();
// 	}
// }

?>

<?php

function connectToDb()
{

  $dbHost = "";
  $dbPort = "";
  $dbUser = "steve";
  $dbPassword = "nerdface";

     $dbName = "construct";

     $openShiftVar = getenv('OPENSHIFT_MYSQL_DB_HOST');

     if ($openShiftVar === null || $openShiftVar == "")
     {
          // Not in the openshift environment
          //echo "Using local credentials: ";
          require("setLocalDatabaseCredentials.php");
     }
     else
     {
          // In the openshift environment
          //echo "Using openshift credentials: ";

          $dbHost = getenv('OPENSHIFT_MYSQL_DB_HOST');
          $dbPort = getenv('OPENSHIFT_MYSQL_DB_PORT');
          $dbUser = getenv('OPENSHIFT_MYSQL_DB_USERNAME');
          $dbPassword = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');
     }
     //echo "host:$dbHost:$dbPort dbName:$dbName user:$dbUser password:$dbPassword<br >\n";

     $db = new PDO("mysql:host=$dbHost:$dbPort;dbname=$dbName", $dbUser, $dbPassword);

     return $db;

}

?>
<html>
<head>
	<title></title>
</head>
<body>

</body>
</html>
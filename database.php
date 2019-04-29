<?php
  	
	$dsn = 'mysql:host=localhost;dbname=team1database';
    $username = 'team1';
    $password = 'team1pass';

      try {
        $db = new PDO($dsn, $username, $password);
        #echo "PDO object created right";
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
	echo "<p> An error ocurred while connecting to the database: $error_message </p>";}
?>
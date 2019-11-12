<?php

$PG = array(
	'HOST' => 'localhost',
	'PORT' => 5432,
	'DB' => 'quiz',
	'USER' => 'postgres',
	'PW' => '123',
	);

$dsn = "pgsql:host={$PG['HOST']};port={$PG['PORT']};dbname={$PG['DB']};user={$PG['USER']};password={$PG['PW']}";

try {

	$pdo = new PDO($dsn);

} catch (PDOException $e) {

	echo $e->getMessage();
	
}

?>

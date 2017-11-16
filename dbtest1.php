<?php
/*$servername = "mysql7002.site4now.net:3306 ";
$username = "lnql8bae_aarush";
$password = "aarush";
$dbname = "lnql8bae_tedx";*/
$servername = "localhost";
 $username = "root";
  $password = "";
 $dbname = "test";
	try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		echo "connected successfully";
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
			$sql = "INSERT INTO test (`name`, `city`, `country`) VALUES ('karan', 'delhi', 'india')";
				$conn->exec($sql);
	}
		catch(PDOException $e)
    {
		echo $sql . "<br>" . $e->getMessage();
	}



?>
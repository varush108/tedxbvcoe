<html>

<style>
table, th, td {
    border: 1px solid black;
}
</style>
<table style="width:100%">
  <tr>
    <th>Nominator Name</th>
    <th>Nominator Email</th> 
    <th>Nominator Contact No</th>
	<th>Nominee Name</th>
    <th>Nominatee Email</th> 
    <th>Nominatee Contact No</th>
	<th>City</th>
    <th>Country</th> 
    <th>Gender</th>
	<th>Know Personally</th>
    <th>About Nominee</th> 
    <th>Topic of talk</th>
	<th>Previous talks</th>
    <th>Video links</th> 
    <th>Article links</th>
	<th>linked in profile</th>
  </tr>
 
<?php

class TableRows extends RecursiveIteratorIterator { 
    function __construct($it) { 
        parent::__construct($it, self::LEAVES_ONLY); 
    }

    function current() {
        return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
    }

    function beginChildren() { 
        echo "<tr>"; 
    } 

    function endChildren() { 
        echo "</tr>" . "\n";
    } 
} 

$servername = "mysql7002.site4now.net:3306 ";
$username = "lnql8bae_aarush";
$password = "aarush";
$dbname = "lnql8bae_tedx";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM  Nominate"; 
    foreach($conn->query($sql) as $row) { 
        echo "<tr>";
		$nominatorJSON = $row["nominator_details"];
		$nominator = new Stdclass;
		$nominator = json_decode($nominatorJSON);
		echo "<td>".$nominator->name."</td>";
		echo "<td>".$nominator->email."</td>";
		echo "<td>".$nominator->number."</td>";
		$nomineeJSON = $row["nominee_details"];
		$nominee = new Stdclass;
		$nominee = json_decode($nomineeJSON);
		echo "<td>".$nominee->name."</td>";
		echo "<td>".$nominee->email."</td>";
		echo "<td>".$nominee->number."</td>";
		$addressJSON = $row["address"];
		$address = new Stdclass;
		$address = json_decode($addressJSON);
		echo "<td>".$address->city."</td>";
		echo "<td>".$address->country."</td>";
		echo "<td>".$row["gender"]."</td>";
		echo "<td>".$row["know_personally"]."</td>";
		echo "<td>".$row["about_nominee"]."</td>";
		echo "<td>".$row["talk_topic"]."</td>";
		echo "<td>".$row["previous_talks"]."</td>";
		echo "<td>".$row["links"]."</td>";
		echo "<td>".$row["articles"]."</td>";
		echo "<td>".$row["social_media"]."</td>";
		echo "</tr>"; 
		
		
    }
	echo"</table>";
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
?>
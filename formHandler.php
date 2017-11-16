
<html class="fa-events-icons-ready"><head>
	<title>TEDxBVCOE Speaker Nomination</title>
	<meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=no">
	

	<link rel="stylesheet" type="text/css" href="style.css">

	<script type="text/javascript" src="jquery.js"></script>
		<script type="text/javascript">$('#final').hide()</script>
		<script type="text/javascript">$('#error').hide()</script>

	<script type="text/javascript" src="script.js"></script>
	
	<link rel="icon" href="image/favicon.png">
	<script src="https://use.fontawesome.com/ae71f5ebfe.js"></script><link href="https://use.fontawesome.com/ae71f5ebfe.css" media="all" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Hind+Siliguri:300,400,500,600|Raleway:300,400,600,700" rel="stylesheet">
</head>




<body style="" cz-shortcut-listen="true"><!-- colorzilla extension -->
	<nav>
		<div class="content">
			<div class="logo"><img src="logo.png" draggable="false"></div>
			
				<div class="title">Nominate a speaker.</div>
			
			<hr>
			<div class="subtitle">
				Fill out this form to nominate a speaker for TEDxBVCOE 2018.
			</div>
		</div>
		<br>
		<div class="">

			<div class="tab-one tab current">
				<div class="form-section"><i class="fa fa-user-o" aria-hidden="true"></i>Nominator</div>
				<svg><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#check"></use></svg>
			</div>
			<div class="tab-two tab disabled">
				<div class="form-section"><i class="fa fa-microphone" aria-hidden="true"></i>Nominee</div>
				<svg><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#check"></use></svg>
			</div>
			<div class="tab-three tab disabled">
				<div class="form-section"><i class="fa fa-id-card-o" aria-hidden="true"></i>Details</div>
				<svg><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#check"></use></svg>
			</div>
			<div class="tab-four tab disabled">
				<div class="form-section"><i class="fa fa-link" aria-hidden="true"></i>References</div>
				<svg><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#check"></use></svg>
			</div>

		</div>
	</nav>
<!-- Navigation bars -->

	<div class="form-area">
		<header>
			<div class="mobile-wrapper">
				<div class="logo"><img src="logo2.png" draggable="false"></div>
				
					<div class="mobile-title">Nominate a speaker.</div>
				
				<div class="mobile-section-number">Section 1 / 4</div>	
			</div>	
		</header>
		<form method="POST" id="nominate" >
			
			

			<section class="thanks active-section" >
				<div class="final" id="final" ><i class="fa fa-check fa-lg" aria-hidden="true"></i> Thank you. Your response has been submitted.</div>
			</section>
			<section class="thanks " >
				<div class="final" id="error"><i class="fa fa-check fa-lg" aria-hidden="true"></i> Sorry Your form could not be submitted.<br>Please try again after some time.</div>
			</section>
		</form>
	</div>
	<div class="hidden-svgs">
		<svg id="check" fill="#32a67b" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm-1.25 17.292l-4.5-4.364 1.857-1.858 2.643 2.506 5.643-5.784 1.857 1.857-7.5 7.643z"></path></svg>
	</div>
		
<?php
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "tedx";

$servername = "mysql7002.site4now.net:3306 ";
$username = "lnql8bae_aarush";
$password = "aarush";
$dbname = "lnql8bae_tedx";



$nominator = new StdClass;
$nominator->name = $_POST["nominatorName"];	
$nominator->email = $_POST["nominatorEmail"];
$nominator->number = $_POST["nominatorNumber"];
$nominatorJSON = json_encode($nominator);
$nominee = new StdClass;
$nominee->name = $_POST["nomineeName"];	
$nominee->email = $_POST["nomineeEmail"];
$nominee->number = $_POST["nomineeNumber"];
$nomineeJSON = json_encode($nominee);
$address = new StdClass;
$address->city = $_POST["nomineeCity"];
$address->country = $_POST["nomineeCountry"];
$addressJSON = json_encode($address);
$date1 = new DateTime();
$date = $date1->getTimestamp();
echo $nominatorJSON ."<br>".$nomineeJSON."<br>".$addressJSON;
	try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
		$sql = "INSERT INTO nominate(nominator_details,nominee_details,address,gender,know_personally,about_nominee,talk_topic,previous_talks,links,articles,social_media)
		VALUES (".$conn->quote($nominatorJSON).",".$conn->quote($nomineeJSON).",".$conn->quote($addressJSON).",".$conn->quote($_POST["nomineeGender"]).",".$conn->quote($_POST["nomineeKnowPersonally"]).",".$conn->quote($_POST["nomineeWhyRecommend"]).",".$conn->quote($_POST["nomineeWhatTalk"]).",".$conn->quote($_POST["nomineeWhereSpoken"]).",".$conn->quote($_POST["nomineeVideoLink1"]).",".$conn->quote($_POST["nomineeArticleLink1"]).",".$conn->quote($_POST["nomineeLinkedInProfile"]).")";
		$conn->exec($sql);
	?>
	<script type="text/javascript">console.log("executed");$('#final').show();</script>
	<?php
	}
	catch(PDOException $e)
    {
		echo $sql . "<br>" . $e->getMessage();
	?>
	<script type="text/javascript">$('#error').show()</script>
	<?php
    }

$conn = null;
?>


</body></html>
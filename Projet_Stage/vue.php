<!DOCTYPE html>
<html>
<head>
	<title>Projet_Stage</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/vueStyle.css">
	<script src="canvas/canvasjs.min.js"></script>
	<script src="script.js"></script>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="50">

	<!-- On appelle la navbar -->
	<?php 
	session_start();
	if ($_SESSION["role"] == "a") {
		$btnAdmin = true; 
	} else {
		header("Location: index.php");
	}
	?>
	<?php
	include('navbar.php');
	require("data.php");
	?>

	<script>
		var arrayPassRepeat = 0;
		var averageCharPass = <?php echo $averageCharPass; ?>;
		var averageNumPass = <?php echo $averageNumPass; ?>;
		var averageSpePass = <?php echo $averageSpePass; ?>;
	</script>

	<?php
		var_dump($repeatedPass);
		var_dump($averageCharPass);
		var_dump($averageNumPass);
		var_dump($averageSpePass);

	?>



	<h1>Visualisations des statistiques de mot de passe* :</h1>

	<div class="grille">
		<div class="grid-item">

		</div>

		<div class="grid-item" id="histogramme">
			
		</div>

		<div class="grid-item" id="pie">
			
		</div>

		<div class="grid-item">
			
		</div>

		<div class="grid-item">
			
		</div>

		<div class="grid-item">
			
		</div>

	</div>

	<?php
	require('footer.php');
	?>

</body>
</html>
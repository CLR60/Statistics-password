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
		var arrayPassRepeat = [];
		arrayPassRepeat.push("<?php echo $repeatedPass[0][0]; ?>");
		arrayPassRepeat.push("<?php echo $repeatedPass[0][1]; ?>");
		arrayPassRepeat.push("<?php echo $repeatedPass[1][0]; ?>");
		arrayPassRepeat.push(<?php echo $repeatedPass[1][1]; ?>);
		arrayPassRepeat.push("<?php echo $repeatedPass[2][0]; ?>");
		arrayPassRepeat.push(<?php echo $repeatedPass[2][1]; ?>);
		arrayPassRepeat.push("<?php echo $repeatedPass[3][0]; ?>");
		arrayPassRepeat.push(<?php echo $repeatedPass[3][1]; ?>);
		arrayPassRepeat.push("<?php echo $repeatedPass[4][0]; ?>");
		arrayPassRepeat.push(<?php echo $repeatedPass[4][1]; ?>);
		arrayPassRepeat.push("<?php echo $repeatedPass[5][0]; ?>");
		arrayPassRepeat.push(<?php echo $repeatedPass[5][1]; ?>);
		arrayPassRepeat.push("<?php echo $repeatedPass[6][0]; ?>");
		arrayPassRepeat.push(<?php echo $repeatedPass[6][1]; ?>);
		arrayPassRepeat.push("<?php echo $repeatedPass[7][0]; ?>");
		arrayPassRepeat.push(<?php echo $repeatedPass[7][1]; ?>);
		arrayPassRepeat.push("<?php echo $repeatedPass[8][0]; ?>");
		arrayPassRepeat.push(<?php echo $repeatedPass[8][1]; ?>);
		arrayPassRepeat.push("<?php echo $repeatedPass[9][0]; ?>");
		arrayPassRepeat.push(<?php echo $repeatedPass[9][1]; ?>);
		var averageCharPass = "<?php echo $averageCharPass; ?>"
		var averageNumPass = "<?php echo $averageNumPass; ?>"
		var averageSpePass = "<?php echo $averageSpePass; ?>"
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
	<script src="script2.js"></script>
	<?php
	require('footer.php');
	?>
</body>
</html>
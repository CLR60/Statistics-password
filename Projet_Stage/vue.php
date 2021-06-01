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
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="50">

	<!-- On appelle la navbar -->
	<?php 
	session_start();
	if ($_SESSION["role"] == "a") {
		$btnAdmin = true; 
		echo 'test';
	}
	?>
	<?php
	include('navbar.php');
	require("contact/connexion.php");
	?>



	<h1>Visualisations des statistiques de mot de passe* :</h1>

	<div class="grille">
		<div class="grid-item">
			
		</div>

		<div class="grid-item">
			
		</div>

		<div class="grid-item">
			
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
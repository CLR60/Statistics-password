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
	<link rel="stylesheet" type="text/css" href="css/indexStyle.css">
</head>
	<body data-spy="scroll" data-target=".navbar" data-offset="50">
		
		<!-- On appelle la navbar -->
		<?php
		require('navbar.php');
		?>

		<!-- Formulaire de connexion -->
		<div class="loginbox">
			<form action="" method="post">
				<p>Nom d'utilisateur</p>
				<input type="text" name="pseudo" placeholder="Entrez votre nom d'utilisateur">
				<p>mot de passe</p>
				<input type="password" name="password" placeholder="Entrez votre mot de passe">
				<input type="submit" name="submit" value="valider">
			</form>
		</div>

	</body>
</html>
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

		<?php
		require("DB/connection.php");
		session_start();
		$co = connectionDb();
		$message = "";

	      //Connexion de l'utilisateur si le pseudo et le mot de passe est bon
		if (isset($_POST["submit"])) {
			$pseudo = $_POST["pseudo"];
			$password = $_POST["password"];

			$query = $co->prepare("SELECT * FROM user WHERE name_user=:name_user and password_user=:password_user");
			$query->bindParam(":name_user", $pseudo);
			$query->bindParam(":password_user", $password);
			$query->execute();
			$result = $query->fetch();
			$rows = $query->rowCount();
			if ($rows == 1) {
				$_SESSION["pseudo"] = $pseudo;
				$_SESSION["role"] = $result['role_user'];
				// echo $_SESSION['role'];
				header("Location: vue.php");
			} else {
				$message = "Le nom d'utilisateur ou le mot de passe est incorrect";
			}
		}
		?>

		<!-- Formulaire de connexion -->
		<div class="loginbox">
			<form action="" method="post">
				<p>Nom d'utilisateur</p>
				<input type="text" name="pseudo" placeholder="Entrez votre nom d'utilisateur">
				<p>mot de passe</p>
				<input type="password" name="password" placeholder="Entrez votre mot de passe">
				<input type="submit" name="submit" value="valider">
				<p><?php echo $message ?></p>
			</form>
		</div>

	</body>
</html>
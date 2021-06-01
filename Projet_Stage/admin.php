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
	<link rel="stylesheet" type="text/css" href="css/adminStyle.css">
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="50">

	<!-- On appelle la navbar -->
	<?php
	require('navbar.php');
	?>

	<h1>Espace Administrateur :</h1>

	<div id="accueilAdmin">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-6">
					<div class="partStat"></div>
				</div>
				<div class="col-md-6">
					<div class="partUser">
						<h3>Tous les utilisateurs : </h3>
						<table class="table table-stripped table-bordered">
							<thead>
								<tr>
									<th>Nom</th>
									<th>Role</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>


						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>	
</div>




</body>
</html>
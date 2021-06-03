<?php
function getNameById($id){
	if ($id == 0){return 'email';}
	if ($id == 1){return 'password';}
}
$imageError = '';
if (isset($_POST['submitFile'])){
	$isUploadSuccess = $isSuccess = true;
	echo 'test';
	if (!isset($_FILES['file']['name'])){
        $imageError = "vous n'avez pas selectionner d'image";
        $isSuccess = false;
    }else{
        $image = $_FILES['file']['name'];
    }
    if(empty($image)){
		$imageError = 'Vous devez rentrer une ou plusieur image';
		$isSuccess = false;
	}
	else
	{
		$isUploadSuccess = true;
		$imagePath = 'python/fileToComit/' . basename($image);
		$imageExtension = pathinfo($imagePath, PATHINFO_EXTENSION);
		if($imageExtension != "txt")
		{
			$imageError = "Les fichiers autorisés sont txt";
			$isUploadSuccess = false;
		}
		if($isUploadSuccess)
		{
			if(!move_uploaded_file($_FILES["file"]["tmp_name"], $imagePath))
			{
				$imageError = "Erreur de téléchargement";
				$isUploadSuccess = false;
			}
		}
	}
	echo 'test';
    if($isUploadSuccess and $isSuccess){
		echo 'test';
		$myfile = fopen("testfile.txt", "w");
		$nameForSep = 0;
		while (True){
			if (isset($_POST[$nameForSep])){
				$nameForSep += 1;
			}else{
				break;
			}
		}
		$writeFile = $_POST['separateur'].'*µ';
		for ($i = 0; $i<$nameForSep; $i++){
			$writeFile = $writeFile.getNameById($_POST[$i]).'*µ';
		}
		fwrite($myfile, $writeFile);
		fclose($myfile);
		rename('testfile.txt', 'python/testfile.txt');
        $command = 'cd python & start EnterSql.py';
        $output = shell_exec($command);
		// header('location: admin.php');
    }
}echo 'test';
?>
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
	<script type="text/javascript" src="script.js"></script>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="50">
	<?php
	require('navbar.php');
	?>
	<h1>Espace Administrateur :</h1>
	<div id="accueilAdmin">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-6">
					<div class="partStat">
						<form class="ajoutFichier container" method="post" enctype="multipart/form-data">
							<h3>Ajouter un fichier :</h3>
							<input required type="file" name="file">
							<input required type="text" name="separateur" placeholder="">
							<?php echo $imageError; ?>
							<div id='buttonPointer' style="padding-top: 20px;">
								<table class="table table-stripped table-bordered">
									<thead>
										<tr>
											<th></th>
											<th>email</th>
											<th>password</th>
										</tr>
									</thead>
									<tbody id="point">
										<tr>
											<td>1.</td>
											<td><input type="radio" value="0" name="0" required></td>
											<td><input type="radio" value="1" name="0"></td>
										</tr>
									</tbody>
								</table>
								<button class="btn btn-success" name="submitFile">ajouter</button>
								<button type="button" onclick="appendToChild('point', 'buttonPointer')" id="toDelete" class="btn btn-primary">+</button>
							</div>
						</form>
					</div>
				</div>
				<div class="col-md-6">
					<div class="partUser container">
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
							<?php
							require("DB/connection.php.php");
							$co = connectionDb();
							$query = $co->prepare("select * from user");
							$query->execute();
							while($donnée = $query->fetch()){
								echo'
								<tr>
									<td>'.$donnée["name_user"].'</td>
									<td width=100>'.$donnée["role_user"].'</td>
									<td class="clearfix" width=220>
										<a class="btn btn-outline-primary float-left">modifier</a>
										<a class="btn btn-outline-danger float-right">supprimer</a>
									</td>
								</tr>
								';
							}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>	
</div>




</body>
</html>

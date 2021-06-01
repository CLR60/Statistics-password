<head>
	<link rel="stylesheet" type="text/css" href="css/navbarStyle.css">
</head>

<section id="navbar">
	<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
		<div class="clearfix">
			<a class="navbar-brand float-start" href="#footer">
				<img src="" width="30" height="30" alt="LOGO">
			</a>
			<?php 
			if (isset($btnAdmin)) {
				if ($btnAdmin) {
					echo "<a href='admin.php' class='adminBtn float-end'> ADMIN </a>";
				} 
			}
			?>
		</div>
	</nav>
</section>
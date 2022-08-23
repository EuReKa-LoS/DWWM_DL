<?php
/*
$pdo = new PDO('mysql:host=localhost;dbname=doucefrance', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Retour d'erreur PDO (si erreur synthaxe et compagnie par ex)
$pdo->exec('SET NAMES "UTF8"'); // Spécification UTF-8
$query=$pdo->prepare('SELECT * FROM regions WHERE nom =$region');
$query->fetch();
*/
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="./css/style.css">
	<link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
    />
</head>
<body>
	<div id="masterTitle" class="container border border-dark rounded">
		<h1 class="text-center" >Les Régions</h1>
		
	</div>
	<div class="container">
		
		<div class="row">
			<div class="col">
				<div id="mapa" >
					<?php include('./svg/map.svg') ?>
				</div>
			</div id="test">
			<div  class="col">
				<div id="idRegion" class="text-center my-5 mx-5">
				</div>
			</div>
		</div>
	</div>

	<div id="debug">
	</div>
	<footer>
	<p>Coder avec du PHP et un zeste d'Ajax et boom ;)</p>
	</footer>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="./script.js"></script>	
</body>
</html>


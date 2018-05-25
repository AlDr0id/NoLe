<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>NoLe</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="estilo.css">
	<link rel="stylesheet" type="text/css" href="card.css">
	<link rel="stylesheet" type="text/css" href="menu.css">
	<link rel="stylesheet" type="text/css" href="arrows.css">
	<link rel="stylesheet" type="text/css" href="popup-style.css">
	<link rel="stylesheet" type="text/css" href="cabecera.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script type="text/javascript" src="javascript.js"></script>
</head>
<body>

	<?php require_once("include/comun/cabecera.php");

	require_once("include/comun/menu.php");
	?>
	<div class="container">
		<div class="div_404">
			<p class="text_404">Oh no! No hemos encontrado lo que estabas buscando...</p>
			<img class="img_404" src="img/error/404.png">
			<p class="text_404">No te vayas...</p>
		</div>
	</div>
	<?php require_once("include/comun/footer.php"); ?>
</body>
</html>

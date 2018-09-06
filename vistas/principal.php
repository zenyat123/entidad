<!DOCTYPE html>

<html>

<head>

	<meta charset = "utf-8">
	<title>SIE</title>

	<?php

		session_start();

		$servidor = Servidor::Ubicacion();

	?>

	<link href = "<?php echo $servidor ?>/css/bootstrap.css" type = "text/css" rel = "stylesheet">
	<link href = "<?php echo $servidor ?>/css/estilos.css" type = "text/css" rel = "stylesheet">
	<link href = "<?php echo $servidor ?>/css/sweetalert.css" type = "text/css" rel = "stylesheet">	
	<link href = "<?php echo $servidor ?>/css/datatables-bootstrap.css" type = "text/css" rel = "stylesheet">	
	<link href = "<?php echo $servidor ?>/css/datatables-responsive.css" type = "text/css" rel = "stylesheet">	
	<link href = "<?php echo $servidor ?>/css/font-awesome.css" type = "text/css" rel = "stylesheet">
	
	<script src = "<?php echo $servidor ?>/js/jquery.js" type = "text/javascript"></script>
	<script src = "<?php echo $servidor ?>/js/bootstrap.js" type = "text/javascript"></script>
	<script src = "<?php echo $servidor ?>/js/sweetalert.js" type = "text/javascript"></script>
	<script src = "<?php echo $servidor ?>/js/datatables-jquery.js" type = "text/javascript"></script>
	<script src = "<?php echo $servidor ?>/js/datatables-bootstrap.js" type = "text/javascript"></script>
	<script src = "<?php echo $servidor ?>/js/datatables-responsive.js" type = "text/javascript"></script>

</head>

<body>

	<?php

		$ruta = array();

		if(isset($_GET["ruta"]))
		{

			$ruta = explode("/", $_GET["ruta"]);

			if($ruta[0] == "panel-empleado" || $ruta[0] == "panel-persona" || $ruta[0] == "salir")
			{

				include("contenidos/".$ruta[0].".php");

			}

		}
		else
		{

			include("contenidos/login.php");

		}						

	?>	

	<input type = "hidden" value = "<?php echo $servidor; ?>" id = "servidor">			

	<script src = "<?php echo $servidor ?>/js/principal.js" type = "text/javascript"></script>	
	<script src = "<?php echo $servidor ?>/js/tramites.js" type = "text/javascript"></script>	
	
</body>

</html>
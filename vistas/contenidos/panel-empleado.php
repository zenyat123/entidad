<?php

	if(!isset($_SESSION["sesion_empleado"]))
	{

		echo "  

			<script>

				window.location = '".$servidor."'

			</script>

		";

		exit();

	}

?>

<div class = "container-fluid">
	
	<div class = "container">
		
		<div class = "contenedorTituloDos">

			<h2>Panel Principal</h2>

			<h4>Empleado</h4>

			<?php

				echo $_SESSION["dependencia"]."<br>";

				echo $_SESSION["empleado"]."<br>";

				echo "Identificación: ".$_SESSION["id_empleado"];

			?>

		</div>
		 		
		<div class = "col-xs-12 col-md-2" id = "panel-izquierdo">

			<button class = "btn btn-primary boton">Registrar Trámite</button>

			<br><br>

			<button class = "btn btn-primary boton">Consultar Trámite</button>

			<br><br>

			<button class = "btn btn-primary boton">Editar Trámite</button>

			<br><br>

			<button class = "btn btn-primary boton">Eliminar Trámite</button>

			<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

			<a href = "<?php echo $servidor ?>/salir" class = "btn btn-primary boton">Salir</a>

		</div>

		<div class = "col-xs-12 col-md-10" id = "panel-tabla">
			
			<table class = "table table-bordered tablaTramitesEmpleado">
				
				<thead>
					
					<tr>

						<th>Radicado</th>		
						<th>Titulo</th>
						<th>Tema</th>
						<th>Estado</th>	
						<th>Persona</th>

					</tr>

				</thead>

			</table>

		</div>

	</div>

</div>
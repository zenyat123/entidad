<?php

	if(!isset($_SESSION["sesion_persona"]))
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

			<h4>Persona</h4>

			<?php

				echo $_SESSION["persona"]."<br>";

				echo "Identificación: ".$_SESSION["id_persona"];

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

		<div class = "col-xs-12 col-md-7" id = "panel-tabla">
			
			<table class = "table table-bordered dt-responsive tablaTramites">
				
				<thead>
					
					<tr>

						<th>Radicado</th>		
						<th>Titulo</th>
						<th>Tema</th>
						<th>Estado</th>	
						<th>Empleado</th>
						<th>Acciones</th>

					</tr>

				</thead>

			</table>

		</div>

		<div class = "col-xs-12 col-md-3" id = "panel-derecho">
			
			<form method = "post" onsubmit = "return ValidarTramite()">
				
				<div class = "form-group">
					
					<label for = "radicado" class = "col-xs-12">Radicado:</label>

					<div class = "col-xs-12">

						<input type = "text" class = "form-control" id = "radicado" placeholder = "Año y número, solo número">

					</div>

				</div>

				<div class = "form-group">
					
					<label for = "titulo" class = "col-xs-12">Titulo:</label>

					<div class = "col-xs-12">

						<input type = "text" class = "form-control" id = "titulo">

					</div>

				</div>

				<div class = "form-group">
					
					<label for = "tema" class = "col-xs-12">Tema:</label>

					<div class = "col-xs-12">

						<select class = "form-control" id = "tema">
							
							<option></option>
							
							<?php

								$campo = "";
								$valor = "";

								$temas = ControladorTramites::ControladorConsultarTemas($campo, $valor);

								foreach($temas as $llave => $tema)
								{

									echo "<option value = '".$tema["id_tema"]."'>".$tema["tema"]."</option>";

								}

							?>

						</select>

					</div>

				</div>				

				<div class = "form-group">
					
					<label for = "fecha_tramite" class = "col-xs-12">Fecha:</label>

					<div class = "col-xs-12">

						<input type = "datetime-local" class = "form-control" id = "fecha_tramite" value = "2007-01-01T00:00" min = "2007-01-01T00:00" max = "2013-12-31T00:00">	

					</div>										

				</div>

				<div class = "form-group">
					
					<div class = "col-xs-12"> 
						
						<input type = "submit" class = "btn btn-primary boton-formulario" id = "botonRegistrar" value = "Registrar Trámite">

					</div>

				</div>				

			</form>			

		</div>

	</div>

</div>

<div class = "modal fade" id = "modalEditarTramite" role = "dialog">
	
	<div class = "modal-dialog modal-sm">
		
		<div class = "modal-content">
			
			<div class = "modal-header">

				<button type = "button" class = "close" data-dismiss = "modal" aria-label = "close"><span aria-hidden = "true" class = "colorTexto">&times;</span></button>
				
				<h4>Editar Trámite</h4>

			</div>

			<div class = "modal-body">
				
				<div class = "form-group">

					<input type = "hidden" class = "radicado">

					Radicado:
					
					<input type = "text" class = "form-control editarRadicado" readonly>					

				</div>

				<div class = "form-group">
					
					Titulo: 

					<input type = "text" class = "form-control editarTitulo">

				</div>

			</div>

			<div class = "modal-footer">
				
				<button type = "button" class = "btn btn-default" data-dismiss = "modal">Salir</button>

                <button type = "button" class = "btn btn-primary boton botonGuardarTramite">Guardar Cambios</button>

			</div>

		</div>

	</div>

</div>

<?php

	$eliminar_tramite = new ControladorTramites();
	$eliminar_tramite -> ControladorEliminarTramite();

?>
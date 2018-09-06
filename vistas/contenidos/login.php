

<div class = "container-fluid">
		
	<div class = "container">

		<center class = "contenedorTitulo">		

			<img src = "img/entidad.png" alt = "Entidad" class = "logo"><h2>SIE</h2>

			<h2>Sistema de Información de la Entidad</h2>					

		</center>
		
		<div class = "col-md-4 col-md-offset-4 panel panel-login" id = "formularioIngreso">				
			
			<form method = "post" onsubmit = "return ValidarIngreso()">

				<h3>Iniciar Sesión</h3>
				
				<div class = "form-group"> 
					
					<div class = "input-group">
						
						<span class = "input-group-addon">

							<i class = "glyphicon glyphicon-user"></i>
							
						</span>

						<input type = "email" name = "email" id = "email" class = "form-control" placeholder= "Corréo electronico" required>

					</div>

				</div>

				<div class = "form-group">
					
					<div class = "input-group">
						
						<span class = "input-group-addon">
							
							<i class = "glyphicon glyphicon-lock"></i>

						</span>

						<input type = "password" name = "password" id = "password" class = "form-control" placeholder =  "Contraseña" required>

					</div>

				</div>

				<div class = "form-group">
					
					<input type = "submit" class = "btn btn-block btn-primary boton" value = "Ingresar" formnovalidate>

				</div>

				<?php				 
						
					if(isset($_POST["email"]))
					{

						$campo = "email";
						$valor = $_POST["email"];

						$encriptar = crypt($_POST["password"], '$1$rasmusle$');

						$empleado = ControladorEmpleados::ControladorConsultarEmpleados($campo, $valor);
						$persona = ControladorPersonas::ControladorConsultarPersonas($campo, $valor);

						if($empleado["email"] == $_POST["email"] && $empleado["password"] == $encriptar)
						{

							$_SESSION["sesion_empleado"] = "iniciada";
							$_SESSION["id_empleado"] = $empleado["id_empleado"];
							$_SESSION["empleado"] = $empleado["nombres"]." ".$empleado["apellidos"];
							$_SESSION["dependencia"] = $empleado["dependencia"];

							echo "  

								<script>

									window.location = '".$servidor."/panel-empleado';

								</script>

							";						

						}
						else if($persona["email"] == $_POST["email"] && $persona["password"] == $encriptar)
						{

							$_SESSION["sesion_persona"] = "iniciada";
							$_SESSION["id_persona"] = $persona["id_persona"];
							$_SESSION["persona"] = $persona["nombres"]." ".$persona["apellidos"];

							echo "  

								<script>

									window.location = '".$servidor."/panel-persona';

								</script>

							";

						}
						else
						{

							echo "<div class = 'alert alert-danger'>Email o Contraseña incorrectos, por favor vuelva a intentarlo</div>";

						}

					}

				?>

			</form>

		</div>

	</div>

</div>


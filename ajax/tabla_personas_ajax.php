<?php

	require_once("../controladores/tramites_controlador.php");
	require_once("../modelos/tramites_modelo.php");

	require_once("../controladores/empleados_controlador.php");
	require_once("../modelos/empleados_modelo.php");

	class AjaxTablaPersonas
	{	

		/*======  Consultar Tabla de Trámites  ======*/


		public function AjaxConsultarTramites()
		{

			session_start();

			$campo = "id_persona";

			$valor = $_SESSION["id_persona"];

			$tramites = ControladorTramites::ControladorConsultarTramites($campo, $valor);

			if($tramites)
			{

				$datos_json = '  

					{

						"data":
						[';

							for($i = 0; $i < count($tramites); $i++)
							{

								/*======  Consultar Tema  ======*/


								$campo = "id_tema";

								$valor = $tramites[$i]["id_tema"];

								$tema = ControladorTramites::ControladorConsultarTemas($campo, $valor);

								/*======  Consultar Empleado  ======*/


								$campo = "id_empleado";

								$valor = $tramites[$i]["id_empleado"];

								$empleado = ControladorEmpleados::ControladorConsultarEmpleados($campo, $valor);

								$acciones = "<div class = 'btn-group'><button class = 'btn btn-warning botonEditarTramite' radicado = '".$tramites[$i]["radicado"]."' data-toggle = 'modal' data-target = '#modalEditarTramite'><i class = 'fa fa-pencil'></i></button><button class = 'btn btn-danger botonEliminarTramite' radicado = '".$tramites[$i]["radicado"]."' titulo = '".$tramites[$i]["titulo"]."'><i class = 'fa fa-close'></i></button></div>";

								$datos_json .= '  

									[

										"'.$tramites[$i]["radicado"].'",
										"'.$tramites[$i]["titulo"].'",
										"'.$tema["tema"].'",
										"'.$tramites[$i]["estado"].'",
										"'.$empleado["nombres"].'",
										"'.$acciones.'"

									],';

							}

							$datos_json = substr($datos_json, 0, -1);

							$datos_json .= '

						]

					}';

				echo $datos_json;

			}
			else
			{

				$datos_json = ' 

				{

					"data": 
					[

						[

							"0",
							"No registrado",
							"No registrado",
							"No registrado",
							"No registrado",
							"No registrado"						

						]

					]

				}';

				echo $datos_json;

			}

		}

	}

	/*======  Activar Tabla de Trámites  ======*/


	$activar_tramites = new AjaxTablaPersonas;
	$activar_tramites -> AjaxConsultarTramites();
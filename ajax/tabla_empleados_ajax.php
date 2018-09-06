<?php

	require_once("../controladores/tramites_controlador.php");
	require_once("../modelos/tramites_modelo.php");

	require_once("../controladores/personas_controlador.php");
	require_once("../modelos/personas_modelo.php");

	class AjaxTablaEmpleados
	{

		/*======  Consultar Tabla de Trámites  ======*/


		public function AjaxConsultarTramites()
		{

			session_start();

			$campo = "id_empleado";

			$valor = $_SESSION["id_empleado"];

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

								$estado = $tramites[$i]["estado"];

								if($estado == "Tramitado")
								{

									$color_estado = "btn-success";
									$texto_estado = "Tramitado";
									$cambio_estado = "Recibido";

								}
								else
								{									

									$color_estado = "btn-warning";
									$texto_estado = "Recibido";
									$cambio_estado = "Tramitado";

								}

								$boton_estado = "<button class = 'btn btn-xs ".$color_estado." botonEstado' radicado = '".$tramites[$i]["radicado"]."' cambioEstado = '".$cambio_estado."'>".$texto_estado."</button>";

								/*======  Consultar Persona  ======*/


								$campo = "id_persona";

								$valor = $tramites[$i]["id_persona"];

								$persona = ControladorPersonas::ControladorConsultarPersonas($campo, $valor);

								$acciones = "<div class = 'btn-group'><button class = 'btn btn-warning botonEditarTramite' radicado = '".$tramites[$i]["radicado"]."' data-toggle = 'modal' data-target = '#modalEditarTramite'><i class = 'fa fa-pencil'></i></button><button class = 'btn btn-danger botonEliminarTramite' radicado = '".$tramites[$i]["radicado"]."' titulo = '".$tramites[$i]["titulo"]."'><i class = 'fa fa-close'></i></button></div>";

								$datos_json .= '  

									[

										"'.$tramites[$i]["radicado"].'",
										"'.$tramites[$i]["titulo"].'",
										"'.$tema["tema"].'",
										"'.$boton_estado.'",
										"'.$persona["nombres"].'"

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
							"No registrado"					

						]

					]

				}';

				echo $datos_json;

			}

		}

	}

	/*======  Activar Tabla de Trámites  ======*/


	$activar_tramites = new AjaxTablaEmpleados;
	$activar_tramites -> AjaxConsultarTramites();
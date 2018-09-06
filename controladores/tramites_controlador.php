<?php

	class ControladorTramites
	{

		/*======  Registrar Trámite  ======*/


		static public function ControladorRegistrarTramite($datos)
		{

			if(isset($datos["radicado"]))
			{				

				$respuesta = ModeloTramites::ModeloRegistrarTramite($datos);

				return $respuesta;

			}

		}	

		/*======  Consultar Trámites  ======*/	


		static public function ControladorConsultarTramites($campo, $valor)
		{

			$respuesta = ModeloTramites::ModeloConsultarTramites($campo, $valor);

			return $respuesta;

		}

		/*======  Actualizar Trámite  ======*/


		static public function ControladorActualizarTramites($datos)
		{

			$respuesta = ModeloTramites::ModeloActualizarTramite($datos);

			return $respuesta;

		}

		/*======  Eliminar Trámite  ======*/


		static public function ControladorEliminarTramite()
		{

			if(isset($_GET["radicado"]))
			{

				$campo = "radicado";

				$valor = $_GET["radicado"];

				$respuesta = ModeloTramites::ModeloEliminarTramite($campo, $valor);

				if($respuesta == "Eliminado")
				{

					echo "

					<script>

						swal
						({

							title: 'Eliminado',
							text: 'Trámite eliminado',
							type: 'success',
							confirmButtonText: 'Cerrar',
							confirmButtonColor:'#316599'
						  
						},

						function(isConfirm)
						{
							if(isConfirm)
							{
								window.location = 'panel-persona';
							}
						}

						);

					</script>

					";

				}

			}

		}

		/*======  Consultar Radicados  ======*/


		static public function ControladorConsultarRadicados($campo, $valor)
		{

			$respuesta = ModeloTramites::ModeloConsultarRadicados($campo, $valor);

			return $respuesta;

		}

		/*======  Consultar Temas  ======*/


		static public function ControladorConsultarTemas($campo, $valor)
		{

			$respuesta = ModeloTramites::ModeloConsultarTemas($campo, $valor);

			return $respuesta;

		}

		/*======  Cambiar Estado de Trámite  ======*/


		static public function ControladorCambiarEstado($campo_uno, $valor_uno, $campo_dos, $valor_dos)
		{

			$respuesta = ModeloTramites::ModeloCambiarEstado($campo_uno, $valor_uno, $campo_dos, $valor_dos);

			return $respuesta;

		}

	}
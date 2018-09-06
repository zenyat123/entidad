<?php

	require_once("../controladores/tramites_controlador.php");
	require_once("../modelos/tramites_modelo.php");

	class AjaxTramites
	{

		public $radicado;
		public $titulo;
		public $id_tema;
		public $fecha_tramite;
		public $verificar_radicado;
		public $editar_radicado;
		public $eliminar_radicado;
		public $activar_radicado;
		public $cambiar_estado;

		/*====== Registrar Trámite  ======*/
		

		public function AjaxRegistrarTramite()
		{

			session_start();

			$datos = array("radicado" => $this -> radicado,
						   "titulo" => $this -> titulo,
						   "estado" => "Recibido",
						   "fecha" => $this -> fecha_tramite,
						   "id_persona" => $_SESSION["id_persona"],
						   "id_empleado" => "1025641230",
						   "id_tema" => $this -> id_tema);

			$respuesta = ControladorTramites::ControladorRegistrarTramite($datos);

			echo $respuesta;

		}

		/*======  Consultar Trámite  ======*/


		public function AjaxConsultarTramite()
		{

			$campo = "radicado";

			$valor = $this -> radicado;

			$respuesta = ControladorTramites::ControladorConsultarTramites($campo, $valor);

			echo json_encode($respuesta);

		}

		/*======  Actualizar Trámite  ======*/


		public function AjaxActualizarTramite()
		{

			$datos = array("radicado" => $this -> editar_radicado,
						   "titulo" => $this -> titulo);

			$respuesta = ControladorTramites::ControladorActualizarTramites($datos);

			echo $respuesta;

		}

		/*====== Reconocer Radicado Repetido  ======*/


		public function AjaxVerificarRadicado()
		{

			$campo = "radicado";

			$valor = $this -> verificar_radicado;

			$respuesta = ControladorTramites::ControladorConsultarRadicados($campo, $valor);

			echo json_encode($respuesta);

		}

		/*======  Cambiar Estado de Trámite  ======*/


		public function AjaxCambiarEstado()
		{

			$campo_uno = "estado";
			$valor_uno = $this -> cambiar_estado;

			$campo_dos = "radicado";
			$valor_dos = $this -> activar_radicado;

			$respuesta = ControladorTramites::ControladorCambiarEstado($campo_uno, $valor_uno, $campo_dos, $valor_dos);

		}

	}

	/*====== Registrar Trámite  ======*/


	if(isset($_POST["idTema"]))
	{

		$consultar_tema = new AjaxTramites();
		$consultar_tema -> radicado = $_POST["radicado"];
		$consultar_tema -> titulo = $_POST["titulo"];
		$consultar_tema -> id_tema = $_POST["idTema"];
		$consultar_tema -> fecha_tramite = $_POST["fechaTramite"];
		$consultar_tema -> AjaxRegistrarTramite();

	}

	/*======  Consultar Trámite  ======*/


	if(isset($_POST["radicado"]))
	{

		$consultar_tramite = new AjaxTramites();
		$consultar_tramite -> radicado = $_POST["radicado"];
		$consultar_tramite -> AjaxConsultarTramite();

	}

	/*======  Actualizar Trámite  ======*/


	if(isset($_POST["editarRadicado"]))
	{

		$actualizar_tramite = new AjaxTramites();
		$actualizar_tramite -> editar_radicado = $_POST["editarRadicado"];
		$actualizar_tramite -> titulo = $_POST["titulo"];
		$actualizar_tramite -> AjaxActualizarTramite();

	}

	/*====== Reconocer Radicado Repetido  ======*/


	if(isset($_POST["verificarRadicado"]))
	{

		$verificar_radicado = new AjaxTramites();
		$verificar_radicado -> verificar_radicado = $_POST["verificarRadicado"];
		$verificar_radicado -> AjaxVerificarRadicado();

	}

	/*======  Cambiar Estado de Trámite  ======*/


	if(isset($_POST["activarRadicado"]))
	{

		$cambiar_estado = new AjaxTramites();
		$cambiar_estado -> activar_radicado = $_POST["activarRadicado"];
		$cambiar_estado -> cambiar_estado = $_POST["cambiarEstado"];
		$cambiar_estado -> AjaxCambiarEstado();

	}
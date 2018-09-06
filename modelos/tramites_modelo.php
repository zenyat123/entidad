<?php

	require_once("conexion.php");

	class ModeloTramites
	{

		/*======  Registrar Trámite  ======*/


		static public function ModeloRegistrarTramite($datos)
		{

			$registra = "insert into tramite (radicado, titulo, estado, fecha, id_persona, id_empleado, id_tema) 
			                          values (:radicado, :titulo, :estado, :fecha, :id_persona, :id_empleado, :id_tema)";

			$registrar = Conexion::Conectar()->prepare($registra);

			$registrar -> bindParam(":radicado", $datos["radicado"], PDO::PARAM_INT);
			$registrar -> bindParam(":titulo", $datos["titulo"], PDO::PARAM_STR);
			$registrar -> bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
			$registrar -> bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
			$registrar -> bindParam(":id_persona", $datos["id_persona"], PDO::PARAM_INT);
			$registrar -> bindParam(":id_empleado", $datos["id_empleado"], PDO::PARAM_INT);
			$registrar -> bindParam(":id_tema", $datos["id_tema"], PDO::PARAM_INT);

			if($registrar -> execute())
			{

				return "Registrado";

			}

			$registrar -> close();

			$registrar = null;

		}

		/*======  Consultar Trámites  ======*/


		static public function ModeloConsultarTramites($campo, $valor)
		{

			if($campo == "")
			{

				$consultar = Conexion::Conectar()->prepare("select * from tramite");

				$consultar -> execute();

				return $consultar -> fetchAll();

			}
			else
			{

				$consultar = Conexion::Conectar()->prepare("select * from tramite where $campo = :$campo");

				$consultar -> bindParam(":".$campo, $valor, PDO::PARAM_INT);

				$consultar -> execute();

				return $consultar -> fetchAll();

			}

			$consultar -> close();

			$consultar = null;

		}

		/*======  Actualizar Trámite  ======*/


		static public function ModeloActualizarTramite($datos)
		{

			$actualizar = Conexion::Conectar()->prepare("update tramite set titulo = :titulo where radicado = :radicado");

			$actualizar -> bindParam(":titulo", $datos["titulo"], PDO::PARAM_STR);
			$actualizar -> bindParam(":radicado", $datos["radicado"], PDO::PARAM_INT);

			if($actualizar -> execute())
			{

				return "Actualizado";

			}
			else
			{

				return $actualizar -> errorInfo();

			}

			$actualizar -> close();

			$actualizar = null;

		}

		/*======  Eliminar Trámite  ======*/


		static public function ModeloEliminarTramite($campo, $valor)
		{

			$eliminar = Conexion::Conectar()->prepare("delete from tramite where $campo = :$campo");

			$eliminar -> bindParam(":".$campo, $valor, PDO::PARAM_INT);

			if($eliminar -> execute())
			{

				return "Eliminado";

			}

			$eliminar -> close();

			$eliminar = null;

		}

		/*======  Consultar Radicados  ======*/


		static public function ModeloConsultarRadicados($campo, $valor)
		{

			if($campo == "")
			{

				$consultar = Conexion::Conectar()->prepare("select * from tramite");

				$consultar -> execute();

				return $consultar -> fetchAll();
				
			}
			else
			{

				$consultar = Conexion::Conectar()->prepare("select * from tramite where $campo = :$campo");

				$consultar -> bindParam(":".$campo, $valor, PDO::PARAM_INT);

				$consultar -> execute();

				return $consultar -> fetch();

			}			

			$consultar -> close();

			$consultar = null;

		}

		/*======  Consultar Temas  ======*/
		

		static public function ModeloConsultarTemas($campo, $valor)
		{

			if($campo == "")
			{

				$consultar = Conexion::Conectar()->prepare("select * from tema");

				$consultar -> execute();

				return $consultar -> fetchAll();

			}
			else
			{

				$consultar = Conexion::Conectar()->prepare("select * from tema where $campo = :$campo");

				$consultar -> bindParam(":".$campo, $valor, PDO::PARAM_STR);

				$consultar -> execute();

				return $consultar -> fetch();

			}

			$consultar -> close();

			$consultar = null;

		}

		/*======  Cambiar Estado de Trámite  ======*/


		static public function ModeloCambiarEstado($campo_uno, $valor_uno, $campo_dos, $valor_dos)
		{

			$actualizar = Conexion::Conectar()->prepare("update tramite set $campo_uno = :$campo_uno where $campo_dos = :$campo_dos");

			$actualizar -> bindParam(":".$campo_uno, $valor_uno, PDO::PARAM_STR);
			$actualizar -> bindParam(":".$campo_dos, $valor_dos, PDO::PARAM_INT);

			if($actualizar -> execute())
			{

				return "Cambiado";

			}

			$actualizar -> close();

			$actualizar = null;

		}

	}
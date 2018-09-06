<?php

	require_once("conexion.php");

	class ModeloPersonas
	{

		/*======  Consultar Personas  ======*/


		static public function ModeloConsultarPersonas($campo, $valor)
		{

			if($campo == "")
			{

				$consultar = Conexion::Conectar()->prepare("select * from persona");

				$consultar -> execute();

				return $consultar -> fetchAll();

			}
			else
			{

				$consultar = Conexion::Conectar()->prepare("select * from persona where $campo = :$campo");

				$consultar -> bindParam(":".$campo, $valor, PDO::PARAM_STR);

				$consultar -> execute();

				return $consultar -> fetch();

			}

			$consultar -> close();

			$consultar = null;

		}

	}
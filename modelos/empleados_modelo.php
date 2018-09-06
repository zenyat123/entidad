<?php

	require_once("conexion.php");

	class ModeloEmpleados
	{

		/*======  Consultar Empleados  ======*/


		static public function ModeloConsultarEmpleados($campo, $valor)
		{

			if($campo == "")
			{

				$consultar = Conexion::Conectar()->prepare("select * from empleado");				

				$consultar -> execute();

				return $consultar -> fetchAll();

			}
			else
			{

				$consultar = Conexion::Conectar()->prepare("select * from empleado where $campo = :$campo");

				$consultar -> bindParam(":".$campo, $valor, PDO::PARAM_STR);

				$consultar -> execute();

				return $consultar -> fetch();

			}

			$consultar -> close();

			$consultar = null;

		}

	}
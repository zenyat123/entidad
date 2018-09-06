<?php

	class ControladorEmpleados
	{

		/*======  Consultar Empleados  ======*/


		static public function ControladorConsultarEmpleados($campo, $valor)
		{

			$respuesta = ModeloEmpleados::ModeloConsultarEmpleados($campo, $valor);

			return $respuesta;

		}

	}
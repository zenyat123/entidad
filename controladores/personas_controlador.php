<?php

	class ControladorPersonas
	{

		/*======  Consultar Personas  ======*/


		static public function ControladorConsultarPersonas($campo, $valor)
		{

			$respuesta = ModeloPersonas::ModeloConsultarPersonas($campo, $valor);

			return $respuesta;

		}

	}
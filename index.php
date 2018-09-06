<?php

	require_once("controladores/servidor_controlador.php");
	require_once("controladores/principal_controlador.php");

	require_once("controladores/empleados_controlador.php");
	require_once("controladores/personas_controlador.php");
	require_once("controladores/tramites_controlador.php");

	require_once("modelos/empleados_modelo.php");
	require_once("modelos/personas_modelo.php");
	require_once("modelos/tramites_modelo.php");

	$principal = new ControladorPrincipal();
	$principal -> Principal();
<?php

	class Conexion
	{

		static public function Conectar()
		{

			$host = "localhost";
			$user = "root";
			$password = "";
			$database = "entidad";

			$conexion = new PDO("mysql:host=".$host.";dbname=".$database."",$user,$password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

			return $conexion;
			
		}

	}
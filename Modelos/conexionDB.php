<?php 

	class ConexionDB
	{
		
		public function conectarDB(){

			$db = new PDO("mysql:host=localhost;dbname=fayol","root","");

			$db->exec("set names utf8");

			return $db;

		}

	}

?>
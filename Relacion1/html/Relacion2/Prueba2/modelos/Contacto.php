<?php

	/**
	 * Antonio J. Sánchez
	 */
	
	require_once "lib/Database.php" ;

	class Contacto {

		private $idCon ;
		private $idUsu ;
		private $nombre ;
		private $apellidos ;
		private $telefono ;
		private $email ;
		private $foto ;
		private $observaciones ;

		public function __construct() {


		}

		public function __get($prop) {
			return $this->$prop ;
		}

		public function __set($prop, $valor) {
			$this->$prop = $valor ;
		}

		/**
		 * @return
		 */
		public function delete() {

			// conectamos con la base de datos y borramos el registro.
			Database::getDatabase()
				->query("DELETE FROM contacto WHERE idCon = {$this->idCon};") ;
		}


		/**
		 * @return 
		 */
		public function save() {

			// conectamos con la base de datos	
			$db = Database::getDatabase() ;

			// escapamos las cadenas
			//$resultado = $db->escape($_POST) ;
			
			// construimos la consulta y la lanzamos
			$sql = "INSERT INTO contacto 
			        VALUES (null, {$this->idUsu}, 
			        			  '{$this->nombre}', 
			        			  '{$this->apellidos}', 
			        			  '{$this->telefono}', 
			        			  '{$this->email}', 
			        			  '{$this->foto}', 
			        			  '{$this->observaciones}') ;" ;
			//			
			$db->query($sql) ;
		}

		/**		 
		 * @return
		 */
		public function update() {

			// conectamos con la base de datos	
			$db = Database::getDatabase() ;

			// escapamos las cadenas
			//$resultado = $db->escape($_POST) ;
			
			// construimos la consulta y la lanzamos
			$sql = "UPDATE contacto 
			        SET nombre = '{$this->nombre}', 
			        	apellidos = '{$this->apellidos}', 
			        	telefono = '{$this->telefono}', 
			        	email = '{$this->email}', 
			        	foto = '{$this->foto}', 
			        	observaciones = '{$this->observaciones}'
			        WHERE idCon = {$this->idCon} ;" ;
			//			
			$db->query($sql) ;

		}

		/**
		 * @param  int    $idusu
		 * @return
		 */
		public static function getAllByUser(int $idusu): array {

			// conectamos con la base de datos	
			$db = Database::getDatabase() ;

			//
			$sql = "SELECT * FROM contacto WHERE idUsu = {$idusu} ; " ;

			return $db->query($sql)
					  ->getAll("Contacto") ;
		}

		/**
		 * @param  int    $idcon 
		 * @return
		 */
		public static function getById(int $idcon): ?Contacto {

			// conectamos con la base de datos	
			$db = Database::getDatabase() ;

			//
			$sql = "SELECT * FROM contacto WHERE idCon = {$idcon} ; " ;

			return $db->query($sql)
					  ->getData("Contacto") ;
		}


		public function __toString() {
			return 	"{$this->nombre} {$this->apellidos}";
		}
	}
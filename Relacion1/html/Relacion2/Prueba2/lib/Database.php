<?php

	/**
	 * Antonio J. Sánchez
	 * Patrón SINGLETON
	 */

	class Database {
		
		private static $instancia = null ;
		private $resultado ;				// guarda el resultado de las queries
		private $con ;						// guarda la conexión con el motor de BDs.

		private function __clone() {}

		/** 
		 * Creamos la conexión con el motor de Bases de Datos
		 */ 
		private function __construct() { 

				$this->con = new mysqli("localhost", "root", "", "agenda") ;
		}

		/**
		 * Ejecuta una consulta sobre la base de datos
		 * @param  String $sql
		 * @return 
		 */
		public function query(String $sql) {
			$this->resultado = $this->con->query($sql) ;
			return $this ;
		}

		/**
		 * Recupera un registro de la base de datos en forma de objeto
		 * y lo devuelve.
		 * @return
		 */
		public function getData($clase = "StdClass") {
			return $this->resultado->fetch_object($clase) ;
		}

		/**
		 * Recupera todos los registros de la base de datos en 
		 * forma de array objeto y lo devuelve.
		 * @return
		 */
		public function getAll($clase = "StdClass") {

			$salida = [] ;

			while($item = $this->getData($clase))
				$salida[] = $item ;
			//
			return $salida ;
		}

		/**
		 * Escapa las cadenas que se pasan como parámetro en el array
		 * @param  array $cad 
		 * @return
		 */
		public function escape(array $cadenas): array {

			$salida = [] ;

			foreach($cadenas as $clave => $item)
				$salida[$clave] = $this->con->real_escape_string($item) ;
				//array_push($salida, $this->con->real_escape_string($item)) ;
			//
			return $salida ;
		}
		
		/**
		 * Crea y/o devuelve la intancia de la clase
		 * @return
		 */
		public static function getDatabase() {
			if (self::$instancia == null) self::$instancia = new Database ;
			return self::$instancia ;
		}

	}
<?php

	/**
	 * Antonio J. Sánchez
	 */

	class Usuario {

		private $idUsu ;
		private $email ;
		private $clave ;
		private $nombre ;
		private $apellidos ;

		/**
		 * @return String
		 */
		public function getNombre(): String {
			return $this->nombre ;
		}

		/**
		 * @return int
		 */
		public function getIdUsu():int {
			return $this->idUsu ;
		}




		/**
		 * Indica qué propiedades deben serializarse. Se invoca automáticamente
		 * cuando se realiza una serialización.
		 * @return array
		 */
		public function __sleep() {
			return ["idUsu", "email", "nombre", "apellidos"] ;
 		}

 		/**
 		 * Se invoca automáticamente cuando se hace una deserialización.
 		 * Lo utilizamos para realizar acciones necesarias de recuperación
 		 * del objeto (establecer una conexión, abrir un archivo, etc.)
 		 */
 		public function __wakeup() {

 		}

	}

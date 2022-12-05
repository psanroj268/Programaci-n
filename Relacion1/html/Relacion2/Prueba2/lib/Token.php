<?php

	class Token {

		private string $token ;

		/**
		 */
		public function __construct() {

			// guardamos y generamos el token
			$this->token = md5(time()) ;

			// guardamos el token en la sesión
			$_SESSION["_token"] = $this->token ;
		}

		/**
		 * @return 
		 */
		public function __toString() {
			return "<input type=\"hidden\" 
			               name=\"_token\" 
			               value=\"{$this->token}\" />";
		}


		/**
		 * @param  string $token 
		 * @return
		 */
		public static function check(string $token): bool {
			return ($_SESSION["_token"]==$token) ;
		}

	}
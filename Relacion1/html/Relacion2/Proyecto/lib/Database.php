<?php

    /**
     * Pablo Sánchez Rojas
     */

    class Database {
        private static $instancia = null;
        private $resultado; // guarda el resultado de las queries
        
        private $con ;  // guarda la conexion con el motor de BDs

        /**
         * Creamos la conexión con el motor de Bases de Datos
         */
        private function __construct(){
            try{
               $this->con = new mysqli("db", "root", "", "agenda") ;
            } catch(mysqli_sql_exception $e){
                die("** Error de conexión con la base de datos: {$e->getMessage()}");
            }
            
        }
        public function __clone(){ }

        /**
         * Ejecuta una consulta sobre la base de datos
         * @param string $sql
         * @return
         */
        public function query(String $sql) {
            $this->resultado = $this->con->query($sql);

        }

        /**
         * Recupera un registro de la base de datos en forma de objeto y lo devuelve
         *
         * @return 
         */
        public function getData($clase = "stdClass") {
            return $this->resultado->fetch_Object("Usuario");
        }

        /**
         * Escapa las cadenas que se pasan como parámetro en el array
         *
         * @param array $cadenas
         * @return
         */
        public function escape(array $cadenas): array {

            $salida = [];

            foreach ($cadenas as $clave => $item):
                $salida[$clave] = $this->con->real_escape_string($item) ;
                //array_push($salida, $this->con->real_escape_string($item)) ;
            endforeach;
            return $salida;
        }

        /**
         * Crea y/o devuelve la instancia de la clase
         * @return
         */
        public static function getDatabase() {
            if (self::$instancia === null) self::$instancia = new Database;
            return self::$instancia;
        }

    }
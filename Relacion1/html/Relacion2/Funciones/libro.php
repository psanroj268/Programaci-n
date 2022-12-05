<?php

    class libro {
        private string  $isbn;
        private string  $titulo;
        private string  $autor;
        private string  $editorial;
        private ?int    $paginas;
        private ?string $argumento;
        private int     $puntuacion;
        private ?string $imagen;

        /**
         * @param string $isbn
         * @param string $titulo
         * @param string $autor
         * @param string $editorial
         * @return 
         */

        // public function __construct(string $isbn, string $titulo, string $autor, string $editorial/*, int puntuacion*/)
        // {
        //     $this->isbn = $isbn;
        //     $this->titulo = $titulo;
        //     $this->autor = $autor;
        //     $this->editorial = $editorial;
        //     $this->puntuacion = $puntuacion;
        // }

        public function __construct(){ }

        public function __get($key):string|int|null {
            return $this->$key ;
        }

        public function estrellas(int $puntuacion){
            for ($i = 0; $i < $this->puntuacion; $i++){
                echo "<i class=\"bi bi-star-fill\" style=\"color:#fae607\"></i>";
            }

            for ($i = $this->puntuacion; $i < 5; $i++){
                echo "<i class=\"bi bi-star\"></i>";
            }
        }

    }
?>
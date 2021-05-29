
<?php

    class Conectar {

        protected $dbh;
        
        protected function Conexion() {
            try {
                $conectar = $this->dbh = new PDO( "mysql:local=localhost;dbname=dbcrud_curso","root","root");
                return $conectar;
            } catch(Exception $e) {
                print "¡Error en la conexión a la BD!: " . $e->getMessage() . "<br/>";
                die();
            }
        }

        public function set_names() {
            return $this->dbh->query("SET NAMES 'utf8'");
        }
    }

?>
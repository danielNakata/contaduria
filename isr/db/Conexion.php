<?php
    class Conexion{

        public $host = "localhost";
        public $user = "root";
        public $pass = "";
        public $port = "3306";
        public $name = "contadb";
        public $conn = "";
        /*
        public $user = "id20769329_contausr";
        public $pass = "ContaU!er1";
        public $port = "3306";
        public $name = "contadb";
        public $conn = "";
        */

        public function creaConexionDB(){
            $this->conn = new mysqli($this->host.":".$this->port, $this->user, $this->pass, $this->name);
        }

        public function cierraConexionDB(){
            $this->conn->close();
        }
    }

?>

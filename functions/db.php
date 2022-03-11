<?php
    header('Content-Type: text/html; charset=utf-8');
    class DBController{
        protected $host = "localhost";
        protected $user = "root";
        protected $password = "";
        protected $db = "ecole";

        public $conn = null;

        public function __construct(){
            $this->conn = mysqli_connect($this->host, $this->user, $this->password, $this->db);
            mysqli_set_charset($this->conn,"utf8");
            if($this->conn->connect_error){
                echo "Connexion echoué ".$this->conn->connect_error;
            }
        }
        public function __destruct(){
            $this->closeConnection();
        }

        protected function closeConnection(){
            if($this->conn !=null){
                $this->conn->close();
                $this->conn = null;
            }
        }
    }
?>
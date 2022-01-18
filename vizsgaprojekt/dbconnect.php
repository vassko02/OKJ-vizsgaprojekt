<?php 
    class Dbconnect{
        private $servername = 'localhost';
        private $username = 'PeacefulParadise';
        private $password = 'PP202114a';
        private $database = 'PeacefulParadise';

        public $con;

        public function __construct()
        {
            $this->con = new mysqli($this->servername, $this->username, $this->password, $this->database);
            if (mysqli_connect_error()) {
                trigger_error("Adatbázis elérés hiba! ".mysqli_connect_error());
            }
            else{
                return $this->con;
            }
        }

    }

?>
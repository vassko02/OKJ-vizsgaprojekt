<?php 
    class Dbconnect{
        private $servername = 'localhost';
        private $username = 'root'; /*Localhosthoz: root, szerverhez: PeacefulParadise*/
        private $password = ''; /*Szerverhez: PP202114a*/
        private $database = 'peacefulparadise'; /*Localhosthoz: peacefulparadise, szerverhez: PeacefulParadise*/

        public $con;

        public function __construct()
        {
            $this->con = new mysqli($this->servername, $this->username, $this->password, $this->database);
            $this->con ->set_charset("utf8");
            if (mysqli_connect_error()) {
                trigger_error("Adatbázis elérés hiba! ".mysqli_connect_error());
            }
            else{
                return $this->con;
            }
        }

    }

?>
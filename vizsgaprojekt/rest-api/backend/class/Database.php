<?php

    class Database{
        

        private $host = 'diak.jedlik.eu';
        private $user = 'PeacefulParadise';
        private $password = 'PP202114a';
        private $database = 'PeacefulParadise';

        public function getConnection(){
            ini_set('display_errors',false); // kikapcsolja a hibaüzenetek megjelenítését

            $conn = new mysqli($this->host, $this->user, $this->password, $this->database);
            $conn->set_charset("utf8");
            if ($conn->connect_error) {
                http_response_code(503);
                die(
                    json_encode(
                        array('message' => 'Error failed to connect to MySql!')
                    )                    
                );
            } else {
                return $conn;
            }
        }
    }

?>
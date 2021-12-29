<?php
    class Service extends Dbconnect{
        function getallservice(){
            $sql = 'SELECT * FROM servicetype';
            $result = $this->con->query($sql);
            $services = array();
            while($row = $result->fetch_assoc()){
                $services[]=$row;
            }
            return $services;
        }
      


    }


?>
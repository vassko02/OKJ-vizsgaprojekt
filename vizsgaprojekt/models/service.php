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
      function getservicebyid($id){
          $sql = 'SELECT * FROM servicetype WHERE ServiceID = ?';
          $stmt = $this->con->prepare($sql);
          $stmt->bind_param("i",$id);
          $stmt->execute();
          $result = $stmt->get_result();
          $services = array();
          while($row = $result->fetch_assoc()){
              $services[]=$row;
          }
          return $services;
      }


    }


?>
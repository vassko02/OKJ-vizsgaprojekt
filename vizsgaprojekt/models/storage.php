<?php 
    class storage extends Dbconnect
    { 
        function getFoodByType($type){
            $sql = 'SELECT * FROM storage WHERE type = ? limit 1';
            $stmt = $this->con->prepare($sql);
            $stmt->bind_param("s",$type);
            $stmt->execute();
            $result = $stmt->get_result();
            $foods = array();
            while($row = $result->fetch_assoc()){
                $foods[]=$row;
            }
            return $foods;
        }
        function getAllFoodByType($type){
            $sql = 'SELECT * FROM storage WHERE type = ? ORDER BY ItemName';
            $stmt = $this->con->prepare($sql);
            $stmt->bind_param("s",$type);
            $stmt->execute();
            $result = $stmt->get_result();
            $foods = array();
            while($row = $result->fetch_assoc()){
                $foods[]=$row;
            }
            return $foods;
        }
        function addtoconsumption($adatok){
            $sql ='INSERT INTO consumption (Price,ItemName,ReservationID) VALUES (?,?,?)';
            $stmt = $this->con->prepare($sql);
            $stmt->bind_param("dsi",$adatok['itemprice'],$adatok['itemname'],$adatok['reservationid']);
            $stmt->execute();
        }
    }



?>
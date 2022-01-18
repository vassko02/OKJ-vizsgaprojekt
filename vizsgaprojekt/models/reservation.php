<?php
    class reservation extends Dbconnect
    { 
        public function savereservation($adatok){
            $sql='INSERT INTO reservation (GuestNumber,Price,Children,Adults,ArrivalDate,LeavingDate,CustomerID,RoomID,ServiceID) VALUES (?,?,?,?,?,?,?,?,?)';
            $stmt = $this->con->prepare($sql);
            $guestnumber = $adatok['adult'] + $adatok['children'];
            $stmt->bind_param("idiissiii",$guestnumber,$adatok['fullprice'],$adatok['children'],$adatok['adult'],$adatok['checkin'],$adatok['checkout'],$adatok['customerid'],$adatok['roomid'],$adatok['serviceid']);
            $stmt->execute();
        
        }
        public function selectallreservation(){
            $sql = 'SELECT * FROM  reservation INNER JOIN customer on reservation.CustomerID = customer.CustomerID';
            $result = $this->con->query($sql);
            $allreservation = array();
            while($row = $result->fetch_assoc()){
                $allreservation[]=$row;
            }
            return $allreservation;
        }

    }


?>
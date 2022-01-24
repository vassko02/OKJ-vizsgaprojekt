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
        public function updatereservation($adatok){
            $sql = "UPDATE reservation SET  ReservationID=?, GuestNumber=?, Price=?, Children=?, Adults=?, ArrivalDate=?, LeavingDate=?, CustomerID=?, RoomID=?, ServiceID=? WHERE reservation.ReservationID = ?";
            $stmt = $this->con->prepare($sql);
            $stmt->bind_param("iidiissiiii",$adatok['reservationid'],$adatok['guestnumber'],$adatok['price'],$adatok['children'],$adatok['adults'],$adatok['arrival'],$adatok['leaving'],$adatok['customerid'],$adatok['roomid'],$adatok['serviceid'],$adatok['reservationid']);
            $stmt->execute();
        }
        public function deleteconsumption($id){
            $sql = "DELETE FROM consumption WHERE consumption.ReservationID = ?";
            $stmt = $this->con->prepare($sql);
            $stmt->bind_param("i",$id);
            $stmt->execute();
        }
        public function deletereservation($id){
            $sql = "DELETE FROM reservation WHERE reservation.ReservationID = ?";
            $stmt = $this->con->prepare($sql);
            $stmt->bind_param("i",$id);
            $stmt->execute();
        }
    }


?>
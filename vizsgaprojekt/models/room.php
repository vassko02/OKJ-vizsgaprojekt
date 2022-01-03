<?php 
    class Room extends Dbconnect
    {
      public function selectrooms($adatok){
          
        $sql = "SELECT room.*,reservation.GuestNumber,reservation.ArrivalDate,reservation.LeavingDate FROM `room` LEFT JOIN reservation on room.RoomID = reservation.RoomID WHERE (room.Capacity = ? OR room.Capacity-1 = ?) and (reservation.LeavingDate <= ? or reservation.ArrivalDate >= ? 
        OR reservation.ArrivalDate is null)";
        $stmt = $this->con->prepare($sql);
        $guestnumber = (int)$adatok['adultnumber'] + (int)$adatok['childrennumber'];
        $stmt->bind_param("iiss",$guestnumber,$guestnumber,$adatok['checkin'],$adatok['checkout'],);
        $roomslist = array();
        $stmt->execute();
        $result = $stmt->get_result();
        while($row = $result->fetch_assoc()){
          $roomslist[]=$row;
        }
        $roomnames = array();
        foreach ($roomslist as $room) {
          $roomnames[] = $room['RoomName'];
        }
        $filteredrooms = array();
        $filteredroomnames = array_unique($roomnames);
        foreach ($filteredroomnames as $name) {
          foreach ($roomslist as $room) {
            if ($name == $room['RoomName']) {
              $filteredrooms[] = $room; 
              break;            
            }
          }
          
        }

      return $filteredrooms;
    
      }


      public function selectallrooms(){
        $sql = 'SELECT * FROM  room  LEFT JOIN reservation on room.RoomID = reservation.RoomID';

        $result = $this->con->query($sql);
        $Roomslist = array();
        while($row = $result->fetch_assoc()){
            $Roomslist[]=$row;
        }
        $roomnames = array();
        foreach ($Roomslist as $room) {
          $roomnames[] = $room['RoomName'];
        }
        $filteredrooms = array();
        $filteredroomnames = array_unique($roomnames);
        foreach ($filteredroomnames as $name) {
          foreach ($Roomslist as $room) {
            if ($name == $room['RoomName']) {
              $filteredrooms[] = $room; 
              break;            
            }
          }
          
        }
        return $filteredrooms;
       
      }

      public function selectfilteredrooms($roomtypes,$adatok){
        $sql = 'SELECT * FROM  room  LEFT JOIN reservation on room.RoomID = reservation.RoomID';
        $result = $this->con->query($sql);
        $Roomslist = array();
        while($row = $result->fetch_assoc()){
            $Roomslist[]=$row;
        }
      
        $filteredrooms = array();
      }


      public function selectoneroom($id){
          $sql = 'SELECT * FROM room WHERE room.RoomID = ?';
          $stmt = $this->con->prepare($sql);
          $stmt->bind_param("i",$id);
          $stmt->execute();
          $result = $stmt->get_result();
          return $result;
      }

      
      
  }
 

   

?>
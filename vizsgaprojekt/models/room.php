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
      
      public function selectoneroom2($id){
        $sql = 'SELECT * FROM room WHERE room.RoomID = ?';
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
       
        return $row;
        
    }
    public function selectoneroomname($id){
      $sql = 'SELECT room.RoomName FROM room WHERE room.RoomID = ?';
      $stmt = $this->con->prepare($sql);
      $stmt->bind_param("i",$id);
      $stmt->execute();
      $result = $stmt->get_result();
      $row = $result->fetch_assoc();
      return $row;
  }
  public function selectroomidbyname($adatok){
    $sql ='SELECT room.*,reservation.GuestNumber,reservation.ArrivalDate,reservation.LeavingDate FROM `room` LEFT JOIN reservation on room.RoomID = reservation.RoomID WHERE (room.Capacity = ? OR room.Capacity-1 = ?) and ((reservation.LeavingDate <= ? or reservation.ArrivalDate >= ?
    OR reservation.ArrivalDate is null)) and room.RoomName = ? or reservation.ReservationID = ?';
    $guestnumber = (int)$adatok['adults'] + (int)$adatok['children'];
    $stmt = $this->con->prepare($sql);
    $stmt->bind_param("iisssi",$guestnumber,$guestnumber,$adatok['arrival'],$adatok['leaving'],$adatok['roomname'],$adatok['reservationid']);
     $stmt->execute();
     $rooms = array();
     $result = $stmt->get_result();
            while($row = $result->fetch_assoc()){
                $rooms[]=$row;
            }
            return $rooms;
 }
 public function selectRoomPics1ByType() {
  $sql = 'SELECT ImageURL1 FROM room group by RoomName limit 6';
  $stmt = $this->con->prepare($sql);
  $stmt->execute();
  $result = $stmt->get_result();

  $Roomslist = array();
  while($row = $result->fetch_assoc()){
      $Roomslist[]=$row;
  }
  $roomnames = array();
  foreach ($Roomslist as $room) {
    $roomnames[] = $room['ImageURL1'];
  }
  return $roomnames;
 }
}

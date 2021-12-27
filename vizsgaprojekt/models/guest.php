<?php 
class Guest extends Dbconnect
{
    public function saveguestproblem($adatok){
        $sql='INSERT INTO reports (GuestName,Email,Problem,date) VALUES (?,?,?,?)';
        $stmt = $this->con->prepare($sql);
        $name = $adatok['firstname'].' '.$adatok['lastname'];
        $date = date("Y-m-d H:i:s");
        $stmt->bind_param("ssss",$name,$adatok['email'],$adatok['textarea'],$date);
        if($stmt->execute()) {
            return 1;
        }
        return 0;
      
      
    }

}



?>
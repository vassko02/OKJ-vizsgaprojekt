<?php 
class Guest extends Dbconnect
{
    public function saveguestproblem($adatok){
        $sql='INSERT INTO reports (GuestName,Email,Problem) VALUES (?,?,?)';
        $stmt = $this->con->prepare($sql);
        //$name = $adatok['firstname'].$adatok['lastname'];
        $stmt->bind_param("sss",$adatok['firstname'],$adatok['email'],$adatok['textarea']);
        $stmt->execute();
    }

}



?>
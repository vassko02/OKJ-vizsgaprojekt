<?php
    class Logs extends Dbconnect{

       function savelog($name,$status,$table,$id) {
        $sql = 'call InsertIntoLog(?,?,?,?)';
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("ssss",$name,$status,$table,$id);
        $stmt->execute();
       } 

    }

?>
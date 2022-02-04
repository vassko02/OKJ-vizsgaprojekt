<?php

class Rating{

    private $rate='rating';

    public $Name;
    public $Email;
    public $Description;
    

    private $conn;

    public function __construct($db){
        $this->conn = $db;
    }

    function read(){
        $stmt = $this->conn->prepare("SELECT * FROM ".$this->rate);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }
    function create(){
        
        $stmt = $this->conn->prepare("INSERT INTO ".$this->rate." (Name,Email,Description) VALUES(?,?,?) ");

        $this->Name = htmlspecialchars($this->Name);
        $this->Email = htmlspecialchars($this->Email);
        $this->Description = htmlspecialchars($this->Description);
     
        $stmt->bind_param("sss", $this->Name, $this->Email, $this->Description);
     
        if ( $stmt->execute() ){
            return true;
        }

        return false;
    }
}

?>
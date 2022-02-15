<?php

class Rating{

    private $rate='rating';

    public $Name;
    public $Email;
    public $Description;
    public $Stars;

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
        
        $stmt = $this->conn->prepare("INSERT INTO ".$this->rate." (Name,Email,Description,Stars) VALUES(?,?,?,?) ");

        $this->Name = htmlspecialchars($this->Name);
        $this->Email = htmlspecialchars($this->Email);
        $this->Description = htmlspecialchars($this->Description);
        $this->Stars = htmlspecialchars($this->Stars);
     
        $stmt->bind_param("ssss", $this->Name, $this->Email, $this->Description,$this->Stars);
     
        if ( $stmt->execute() ){
            return true;
        }

        return false;
    }
}

?>
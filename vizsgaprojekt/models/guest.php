<?php 
class Guest extends Dbconnect
{
    public function savecustomer($adatok){
        $sql='INSERT INTO customer (Name,PhoneNumber,Email,Address) VALUES (?,?,?,?)';
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("ssss",$adatok['name'],$adatok['tel'],$adatok['email'],$adatok['address']);
        $stmt->execute();
    }
    public function updatecustomer($adatok){
        $sql = "UPDATE customer SET Name=?, PhoneNumber=?, Email=?, Address=? WHERE customer.Email = ?";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("sssss",$adatok['name'],$adatok['tel'],$adatok['email'],$adatok['address'],$adatok['email']);
        $stmt->execute();
    }
    public function findcustomerbyemail($email){
        $sql = 'SELECT * FROM customer WHERE email=?';
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("s",$email);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            //oke
            $row = $result->fetch_assoc();
            return $row;
        }else
        {
            return 0;
        }
    }
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
    public function logincheck($email,$jelszo){

        $sql = 'SELECT * FROM customer WHERE Email=? AND Password=md5(?)';

        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("ss",$email,$jelszo);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            //oke
            $row = $result->fetch_assoc();
            return $row;
        }else{
            return 0;
        }
    }

    public function eemailcsekk($email){
        $sql='SELECT Email FROM customer WHERE Email=?';
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("s",$email);
        $stmt->execute();

        $result = $stmt->get_result();

        return $result->num_rows;
    }
    public function saveuser($adatok){
        echo '<pre>';
        print_r($adatok);
        echo '</pre>';
        $sql='INSERT INTO customer (Name,Email,UserName,Password) VALUES(?,?,md5(?))';
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("ssss",$adatok['nev'],$adatok['email'],$adatok['nev'],$adatok['jelszo']);
        if ($stmt->execute()) {
            return 1;
        }
        return 0;
    }
}






?>
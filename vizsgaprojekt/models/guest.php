<?php
class Guest extends Dbconnect
{
    public function getallusers()
    {
        $sql = 'SELECT * FROM customer';
        $result = $this->con->query($sql);
        $users = array();
        while ($row = $result->fetch_assoc()) {
            $users[] = $row;
        }
        return $users;
    }
    public function getuserbyid($username)
    {
        $sql = 'SELECT * FROM customer where customer.UserName = ?';
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
       
        return $row;
    }
    public function savecustomer($adatok)
    {
        $sql = 'INSERT INTO customer (Name,PhoneNumber,Email,Address) VALUES (?,?,?,?)';
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("ssss", $adatok['name'], $adatok['tel'], $adatok['email'], $adatok['address']);
        $stmt->execute();
    }
    public function updatecustomer($adatok)
    {
        $sql = "UPDATE customer SET Name=?, PhoneNumber=?, Email=?, Address=? WHERE customer.Email = ?";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("sssss", $adatok['name'], $adatok['tel'], $adatok['email'], $adatok['address'], $adatok['email']);
        $stmt->execute();
    }
    public function findcustomerbyemail($email)
    {
        $sql = 'SELECT * FROM customer WHERE email=?';
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            //oke
            $row = $result->fetch_assoc();
            return $row;
        } else {
            return 0;
        }
    }
    public function saveguestproblem($adatok)
    {
        $sql = 'INSERT INTO reports (GuestName,Email,Problem,date) VALUES (?,?,?,?)';
        $stmt = $this->con->prepare($sql);
        $name = $adatok['firstname'] . ' ' . $adatok['lastname'];
        $date = date("Y-m-d H:i:s");
        $stmt->bind_param("ssss", $name, $adatok['email'], $adatok['textarea'], $date);
        if ($stmt->execute()) {
            return 1;
        }
        return 0;
    }
    public function logincheck($email, $jelszo)
    {

        $sql = 'SELECT * FROM customer WHERE Email=? AND Password=md5(?)';

        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("ss", $email, $jelszo);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            //oke
            $row = $result->fetch_assoc();
            return $row;
        } else {
            return 0;
        }
    }

    public function eemailcsekk($email)
    {
        $sql = 'SELECT Email FROM customer WHERE Email=?';
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();

        $result = $stmt->get_result();

        return $result->num_rows;
    }
    public function usernamecsekk($username)
    {
        $sql = 'SELECT UserName FROM customer WHERE UserName=?';
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();

        $result = $stmt->get_result();

        return $result->num_rows;
    }
    public function saveuser($adatok, string $activation_code, int $expiry = 1 * 24 * 60 * 60)
    {
        echo '<pre>';
        print_r($adatok);
        echo '</pre>';
        $sql = 'INSERT INTO customer (Name,Email,UserName,Password,activation_code,activation_expiry) VALUES(?,?,?,md5(?),md5(?),?)';
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("ssssss", $adatok['name'], $adatok['email'], $adatok['username'], $adatok['jelszo'], $activation_code, date('Y-m-d H:i:s', time() + $expiry));
        if ($stmt->execute()) {
            return 1;
        }
        return 0;
    }
    public function logincsekkemail($email, $jelszo)
    {

        $sql = 'SELECT * FROM customer WHERE email=? AND password=md5(?)';

        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("ss", $email, $jelszo);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            //oke
            $row = $result->fetch_assoc();
            return $row;
        } else {
            return 0;
        }
    }
    public function logincsekkusername($username, $jelszo)
    {

        $sql = 'SELECT * FROM customer WHERE UserName=? AND password=md5(?)';

        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("ss", $username, $jelszo);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            //oke
            $row = $result->fetch_assoc();
            return $row;
        } else {
            return 0;
        }
    }
    public function deleteuser($id)
    {
        $sql = "DELETE FROM customer WHERE customer.CustomerID = ?";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }
    public function updatecustomeradmin($adatok){
        $sql = "UPDATE customer SET Name=?, PhoneNumber=?, Email=?, Address=?, IsAdmin = ? WHERE customer.CustomerID = ?";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("ssssis",$adatok['name'],$adatok['phonenumber'],$adatok['email'],$adatok['address'],$adatok['isadmin'],$adatok['CustomerID']);
        $stmt->execute();
    }
    public function updatecustomer2($adatok){
        $sql = "UPDATE customer SET Name=?, PhoneNumber=?, Email=?, Address=?,UserName=? WHERE customer.CustomerID = ?";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("sssssi",$adatok['name'],$adatok['phonenumber'],$adatok['email'],$adatok['address'],$adatok['username'],$adatok['CustomerID']);
        $stmt->execute();
    }

    //php email verification teszt
    public function is_user_active($user)
    {
        return (int)$user['active'] === 1;
    }
    public function generate_activation_code(): string
    {
        return bin2hex(random_bytes(16));
    }
    public function send_activation_email(string $email, string $activation_code, $baseUrl): void
    {
        // create the activation link
        $activation_link = 'diak.jedlik.eu'.$baseUrl."/activate?email=$email&activation_code=$activation_code";

        // set email subject & body
        $subject = 'Activate your account';
        //$message = 'Link: '.$activation_link.'';
        $message = '<html>
        <head>
            <title>Activate your account</title>
        </head>
        <body style="background-color: #eee; font-size: 16px;">
            <div style="max-width: 600px; min-width: 200px; background-color: #fff; padding: 20px; margin: auto;">
                <div style="width: 100%; text-align: center;">
                    <h1>Activate your account</h1>
                </div>
                <div style="width: 100%;">
                    <h2>To get full access you have to activate your account first</h2>
                    <p>Link: '.$activation_link.'</p>
                </div>
            </div>
        
        </body>
        </html>';
        // email header
        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-type: text/html; charset=iso-8859-1';
        $headers[] = 'From: Peaceful Paradise <peacefulparadise@diak.jedlik.eu>';
        $headers[] = 'Cc: peacefulparadiseofficial@gmail.com';
        $headers[] = 'Bcc: peacefulparadiseofficial@gmail.com';

        // send the email
        mail($email, $subject, nl2br($message), implode("\r\n", $headers));
    }
    public function delete_user_by_id(int $id, int $active = 0)
    {
        $sql = 'DELETE FROM customer
                WHERE CustomerID =? and active=?';
    
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("ii", $id,$active);
    
        return $stmt->execute();
    }
    public function find_unverified_user(string $activation_code, string $email)
    {
    
        $sql = 'SELECT CustomerID, activation_code, activation_expiry < now() as expired FROM `customer` where active is null and Email = ? ';
    
        $stmt = $this->con->prepare($sql);
    
        $stmt->bind_param("s", $email);
        $stmt->execute();
    
        $user = $stmt->get_result();
        $row = $user->fetch_assoc();
            if ($row != null) {
                if (md5($activation_code) === $row['activation_code']) {
                    return $row;
                }
            }
            // verify the password
        return null;
    }
    public function activate_user(int $user_id): bool
    {
        $sql = 'UPDATE customer
                SET active = 1,
                    activated_at = CURRENT_TIMESTAMP
                WHERE CustomerID=?';
    
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("i", $user_id);
    
        return $stmt->execute();
    }

    
}
//https://www.phptutorial.net/php-tutorial/php-email-verification/

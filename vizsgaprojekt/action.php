<?php
if (isset($_POST['newacc'])) {
    $_SESSION['username'] = $_POST['username'];
    $_SESSION['name']= $_POST['name'] ;
    $_SESSION['phonenumber']= $_POST['phonenumber'] ;
    $_SESSION['address'] = $_POST['address'];
    $_SESSION['CustomerID'] = $_POST['CustomerID'];
    $_SESSION['Emailforpost'] = $_POST['Emailforpost'];
    //$HelpObj->writearray($_SESSION);
    header('Location: ' . $baseUrl . '/newaccemail');
    
}
if (($request === $baseUrl . '/reportconfirmed') && isset($_POST['btn_send']))
    if ($GuestObj->saveguestproblem($_POST) == 1) {
        if (isset($_SESSION['username'])) {
            $user =  $GuestObj->getuserbyid($_SESSION['username']);
            $LogObj->savelog($_POST['firstname'],"Sent a report","User",$user['CustomerID']);
        }
        else{
            $LogObj->savelog($_POST['firstname'],"Sent a report","User",0);
        }
    }
$hiba = 0;
if ($request === $baseUrl . '/signin' && isset($_POST['login'])) {
    if ($_POST['usernameperemail'] == '') {
        $hiba = 1;
    } else if ($_POST['loginpassword'] == '') {
        $hiba = 2;
    } else {
        $arr1 = str_split($_POST['usernameperemail']);
        $contains = false;
        foreach ($arr1 as $char) {
            if ($char == '@') {
                $contains = true;
            }
        }
        if ($contains == true) {
            $felhasznalo = $GuestObj->logincsekkemail($_POST['usernameperemail'], $_POST['loginpassword']);
            if ($felhasznalo === 0) {
                $hiba = 3;
            } else if ($felhasznalo['active'] === null) {
                $hiba = 4;
            }
        } else {

            $felhasznalo = $GuestObj->logincsekkusername($_POST['usernameperemail'], $_POST['loginpassword']);
            if ($felhasznalo === 0) {
                $hiba = 3;
            } else if ($felhasznalo['active'] === null) {
                $hiba = 4;
            }
        }
    }

    if ($hiba == 0) {
        //nincs hiba -> minden oke
        $_SESSION['sid'] = session_id();
        $_SESSION['uid'] = $felhasznalo['CustomerID'];
        $_SESSION['username'] =  $felhasznalo['UserName'];
        $_SESSION['loginemail'] = $felhasznalo['Email'];
        $_SESSION['isadmin'] = $felhasznalo['IsAdmin'];
        
        $user =  $GuestObj->getuserbyid($_SESSION['username']);
        $LogObj->savelog($user['Name'],"Logged in","User",$user['CustomerID']);
        if (isset($_SESSION['loginemail']) && $_SESSION['isadmin'] == 1) {
            header('Location: ' . $baseUrl . '/admin');
        } else if ($_SESSION['loginemail']) {
            header('Location: ' . $baseUrl . '/');
        }
    }
}

if ($request === $baseUrl . '/signin' && isset($_POST['btn_reg'])) {

    $emailHibauzenet = '';
    $usernamehibauzenet = '';

    if ($GuestObj->eemailcsekk($_POST['email']) == 1) {
        $emailHibauzenet = 'This email address is already used!';
    }
    if ($GuestObj->usernamecsekk($_POST['username']) == 1) {
        $usernamehibauzenet = 'This username address is already used!';
    }

    $jelszohibauzenet = array();

    if (strlen($_POST['jelszo']) < 8) {
        $jelszohibauzenet[] = 'The minimum lenght of the password is 8 characters!.';
    }

    if (!preg_match("#[A-Z]+#", $_POST['jelszo'])) {
        $jelszohibauzenet[] = 'The password has to contain an uppercase character!';
    }
    if (!preg_match("#[a-z]+#", $_POST['jelszo'])) {
        $jelszohibauzenet[] = 'The password has to contain a lowercase character!';
    }
    if (!preg_match("#[0-9]+#", $_POST['jelszo'])) {
        $jelszohibauzenet[] = 'The password has to contain a number character!';
    }
    if ($_POST['jelszo'] != $_POST['jelszoujra']) {
        $jelszohibauzenet[] = 'The two passwords are not the same!';
    }
    if ($emailHibauzenet == '' && count($jelszohibauzenet) == 0 && $usernamehibauzenet == '') {
        //nincs hiba

        
        $emailcode = $GuestObj->generate_activation_code();
        $GuestObj->send_activation_email($_POST['email'], $emailcode, $baseUrl);
        if ($GuestObj->saveuser($_POST) == 1) {
            $id = $GuestObj->findcustomerbyemail($_POST['email']);
            
            $GuestObj->saveuser_activation_token($emailcode, $id['CustomerID']);
        
            $LogObj->savelog($_POST['name'],"Created an account","User",$id['CustomerID']);


            header('Location: ' . $baseUrl . '/signin/regconfirmed');
        }
    }
}
if ($request === $baseUrl . '/forgotpassword' && isset($_POST['reset_password'])) {
    $existingEmail = $GuestObj->find_existing_email_in_db($_POST['resetEmail']);
    if ($existingEmail == null) {
        $emailError = 'There is no account registered with this email or the account has not been activated yet!';
    }
    else {  //j?? az email
        $password_reset_code = $GuestObj->generate_password_reset_token(); //k??dgener??l??s
        $GuestObj->send_password_reset_email($_POST['resetEmail'],$password_reset_code,$baseUrl); //email k??ld??s
        $GuestObj->update_user_reset_code_in_db($existingEmail['CustomerID'], $password_reset_code); //hozz????rja a k??dot az adatb??zishoz
        header('Location: '.$baseUrl.'/');
    }
}

if (isset($_SESSION['username'])) {
    $user = $GuestObj->getuserbyid($_SESSION['username']);
    $level =  $GuestObj->getlevel($user['CustomerID']);
    switch ($level['LEVEL']) {
        case "Gold":
            $_SESSION['multiplier'] = 0.95;
            $_SESSION['discount'] = 5;
            break;

        case "Platinum":
            $_SESSION['multiplier'] = 0.90;
            $_SESSION['discount'] = 10;
            break;

        case "Diamond":
            $_SESSION['multiplier'] = 0.85;
            $_SESSION['discount'] = 15;
            break;
        default:
            $_SESSION['multiplier'] = 1;
            $_SESSION['discount'] = 0;
            break;
    }
}
if (isset($_POST['btn_send2'])) {
    if (isset($_SESSION['adult'])) {
        if (isset($_SESSION['adult'])) {
        }

        if (isset($_SESSION['username'])) {
            $user = $GuestObj->getuserbyid($_SESSION['username']);
            //$Rnumber = $GuestObj->getreservationsnumber($user['CustomerID']);  
            $customerreservations = $ReservationObj->selectallreservationbycustomerid($user['CustomerID']);
            $Rnumber = count($customerreservations);
            $Rnumber += 1;
            $GuestObj->addonetoreservationnumber($user['CustomerID'], $Rnumber);
            $level = '';
            if ($Rumber < 3) {
                $level = "";
            }
            if ($Rnumber >= 3) {
                $level = "Gold";
            } else if ($Rnumber >= 7) {
                $level = "Platinum";
            } else if ($Rnumber >= 11) {
                $level = "Diamond";
            }
            $GuestObj->updatelevel($user['CustomerID'], $level);
        }

        $ReservationObj->savereservation($_SESSION);
        $user = $GuestObj->getuserbyidreal($_SESSION['customerid']);
        $lastres = $ReservationObj->getlastinsertedreservation();
        $LogObj->savelog($user['Name'], "Created a reservation", "Reservation", $lastres[0]['ReservationID']);
        $LogObj->savelog($user['Name'], "Created a reservation", "User", $lastres[0]['CustomerID']);
        $HelpObj->clearReservation();
    } else {
    }
}

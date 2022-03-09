<?php
class Help extends Dbconnect
{
    function writearray($array)
    {
        echo '<pre>';
        print_r($array);
        echo '</pre>';
    }

    function clearReservation()
    {
        if (isset($_SESSION['username'])) {
            $felhasznalo['UserName'] = $_SESSION['username'];
            $felhasznalo['CustomerID'] = $_SESSION['uid'];
            $felhasznalo['sid'] = $_SESSION['sid'];
            $felhasznalo['Email'] = $_SESSION['loginemail'];
            $felhasznalo['IsAdmin'] = $_SESSION['isadmin'];
            session_unset();
            $_SESSION['sid'] = $felhasznalo['sid'];
            $_SESSION['uid'] = $felhasznalo['CustomerID'];
            $_SESSION['username'] =  $felhasznalo['UserName'];
            $_SESSION['loginemail'] = $felhasznalo['Email'];
            $_SESSION['isadmin'] = $felhasznalo['IsAdmin'];
        } else {
            session_unset();
        }
    }
}

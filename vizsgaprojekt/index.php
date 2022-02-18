<?php
session_start();

define('VEDETT', 'igen');

//szervernél: /~PeacefulParadise
//localhostnál: /14aphp/OKJ-vizsgaprojekt/vizsgaprojekt
$baseUrl = '/14aphp/friss/OKJ-vizsgaprojekt/vizsgaprojekt';
$request = $_SERVER['REQUEST_URI']; //mindenkori url
$mennyiper = substr_count($request, '/');
$baseMennyiper = substr_count($baseUrl, '/');

if (isset($_GET['roomid'])) {
    $mid = $_GET['roomid'];
} else {
    $mid = 0;
}
include('dbconnect.php');
include('models/guest.php');
include('models/room.php');
include('models/service.php');
include('models/reservation.php');
include('models/help.php');
include('models/storage.php');
include('models/logs.php');
include('models/email/mail.php');
$ServiceObj = new Service();
$GuestObj = new Guest();
$RoomObj = new Room();
$ReservationObj = new reservation();
$HelpObj = new Help();
$StorageObj = new storage();
$MailObj = new mail();
$LogObj = new Logs();
include('action.php');

if (isset($_POST['btn_send'])) {
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
        $LogObj->savelog($user['Name'],"Created a reservation","Reservation",$lastres[0]['ReservationID']);
        $LogObj->savelog($user['Name'],"Created a reservation","User",$lastres[0]['CustomerID']);
        $HelpObj->clearReservation();
    } else {
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/7757a6ccbc.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php if ($mennyiper === ($baseMennyiper + 2)) {
                                        echo '.';
                                    } else if ($mennyiper === ($baseMennyiper + 3)) {
                                        echo '../.';
                                    } else if ($mennyiper === ($baseMennyiper + 4)) {
                                        echo '../../.';
                                    } ?>./404/404.css">
    <link rel="preload" as="image" href="./pictures/small_repulo.gif">
    <link rel="preload" as="image" href="./pictures/repulo.gif">
    <?php
    if ($request === $baseUrl . '' || $request === $baseUrl . '/') {
        echo '
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
              integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
              crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
              integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/"
              crossorigin="anonymous"></script>
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Teko:wght@300&display=swap" rel="stylesheet">
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Big+Shoulders+Display:wght@700&display=swap" rel="stylesheet"> 
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link rel="stylesheet" href="./mainpage/slider/style.css">
            <link rel="stylesheet" href="./mainpage/mainpage.css">
            <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
            <link rel="stylesheet" href="./mainpage/bookslider/style.css">';
    }
    if ($request === $baseUrl . '/gambling') {
        echo '
            <link rel="stylesheet" href="./casino/casino.css">
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Changa:wght@700&display=swap" rel="stylesheet"> 
            <link rel="stylesheet" href="./casino/gamescards/style.css">
            <link rel="stylesheet" href="./casino/pokercards/style.css">
            ';
    }
    if ($request === $baseUrl . '/booking') {
        echo '<link rel="stylesheet" href="./book/book.css">
        <link rel="stylesheet" href="./book/button-hover/dist/style.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
            <link rel="stylesheet" href="./css/bookingroomscards.css">
            <script src="./book/script.js"></script>';
    }
    if ($request === $baseUrl . '/booking/roomdetail') {
        echo '<link rel="stylesheet" href="../book/roomdetail.css">';
    }
    if ($request === $baseUrl . '/booking/confirm') {
        echo '<link rel="stylesheet" href="../book/confirm.css">';
    }
    if ($request === $baseUrl . '/booking/customerdetails') {
        echo ' <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
        <link rel="stylesheet" href="../book/customerdetails.css">';
    }
    if ($request === $baseUrl . '/booking/resconfirm' || $request === $baseUrl . '/signin/regconfirmed') {
        echo '<link href="https://fonts.googleapis.com/css?family=Open+Sans:300|Montserrat" rel="stylesheet" type="text/css">
	    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="../book/resconfirmed.css">
        <link rel="stylesheet" href="../navbar/style.css">
        <link rel="stylesheet" href="../footer/style.css">';
    }
    if ($request === $baseUrl . '/dining') {
        echo '
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
            <link rel="stylesheet" href="./restaurant/restaurant.css">
            ';
    }
    if ($request === $baseUrl . '/dining/menu') {
        echo '

                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
                <link rel="preconnect" href="https://fonts.googleapis.com">
                <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
                <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
                <link rel="stylesheet" href="../restaurant/menu/foodmenu.css">
                <link rel="stylesheet" href="./css/scrolltotop.css">
                ';
    }
    if ($request === $baseUrl . '/admin') {
        echo '
                <link rel="stylesheet" href="./login/reservations.css">
                ';
    }
    if ($request === $baseUrl . '/newaccemail') {
        echo '            
        <link rel="stylesheet" href="./aktivalas/elfelejtettjelszo.css"> 
        
                ';
    }
    if ($request === $baseUrl . '/rating') {
        echo '            
        <link rel="stylesheet" href="./rest-api/rating.css"> 
        
                ';
    }
    if ($request === $baseUrl . '/userseditadmin') {
        echo '
                <link rel="stylesheet" href="./login/reservations.css">
                <link rel="stylesheet" href="./login/usereditadmin.css">

                ';
    }
    if ($request === $baseUrl . '/guestreservations') {
        echo '
                <link rel="stylesheet" href="./login/reservations.css">
                ';
    }
    if ($request === $baseUrl . '/account') {
        echo '
                <link rel="stylesheet" href="./login/reservations.css">
                <link rel="stylesheet" href="./login/useracc.css">
                <link rel="stylesheet" href="./login/usereditadmin.css">
                <link rel="preconnect" href="https://fonts.googleapis.com">
                <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
                <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
                <link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">
                ';
    }
    if ($request === $baseUrl . '/signin') {
        echo '
            <link rel="stylesheet" href="./login/inputstyles.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
            <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro&display=swap" rel="stylesheet">
	        <link rel="stylesheet" href="./login/signin.css">';
    }
    if ($request === $baseUrl . '/contactus' || $request === $baseUrl . '/contactusREPORT') {
        echo '  <link rel="stylesheet" href="./contact/contact.css">';
    }
    if ($request === $baseUrl . '/reportconfirmed') {
        echo '  <link rel="stylesheet" href="./contact/reportconfirmed.css">';
    }
    if (strpos($request, "activate?email") !== false) {
        echo '<link rel="stylesheet" href="./aktivalas/aktivalas.css">
        <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro&display=swap" rel="stylesheet">';
    }
    if ($request === $baseUrl . '/forgotpassword') {
        echo '  <link rel="stylesheet" href="./aktivalas/elfelejtettjelszo.css">';
    }
    if (strpos($request, "passwordreset?email") !== false) {
        echo '<link rel="stylesheet" href="./aktivalas/setnewpassword.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">';
    }
    ?>

    <link rel="icon" href="<?php if ($mennyiper === ($baseMennyiper + 2)) {
                                echo '.';
                            } else if ($mennyiper === ($baseMennyiper + 3)) {
                                echo '../.';
                            } else if ($mennyiper === ($baseMennyiper + 4)) {
                                echo '../../.';
                            } ?>./pictures/small_rounded.png">
    <link rel="stylesheet" href="<?php if ($mennyiper === ($baseMennyiper + 2)) {
                                        echo '.';
                                    } else if ($mennyiper === ($baseMennyiper + 3)) {
                                        echo '../.';
                                    } else if ($mennyiper === ($baseMennyiper + 4)) {
                                        echo '../../.';
                                    } ?>./navbar/style.css">
    <link rel="stylesheet" href="<?php if ($mennyiper === ($baseMennyiper + 2)) {
                                        echo '.';
                                    } else if ($mennyiper === ($baseMennyiper + 3)) {
                                        echo '../.';
                                    } else if ($mennyiper === ($baseMennyiper + 4)) {
                                        echo '../../.';
                                    } ?>./navbar/ddanimate/style.css">
    <link rel="stylesheet" href="<?php if ($mennyiper === ($baseMennyiper + 2)) {
                                        echo '.';
                                    } else if ($mennyiper === ($baseMennyiper + 3)) {
                                        echo '../.';
                                    } else if ($mennyiper === ($baseMennyiper + 4)) {
                                        echo '../../.';
                                    } ?>./footer/style.css">
    <title>Peaceful Paradise</title>
</head>

<body>
    <?php
    // } else if ($m == 'contactusREPORT') {
    //     include('./contact/contact.php');
    //     $message = "The report was sent succesfully! We will reply soon as possible";
    //     echo "<script type='text/javascript'>alert('$message');</script>";
    // }
    // echo $request;
    // echo '<br>';
    // echo $baseUrl;
    // echo '<br>';
    // echo $baseMennyiper;
    // echo '<br>';
    // echo $mennyiper;
    include('./navbar/navbar.php');

    //próba email küldés (gabor)


    switch ($request) {
        case $baseUrl . '':
            $HelpObj->clearReservation();
            include('./mainpage/mainpage.php');
            break;
        case $baseUrl . '/':
            $HelpObj->clearReservation();
            include('./mainpage/mainpage.php');
            break;
        case $baseUrl . '/gambling':
            $HelpObj->clearReservation();
            include('./casino/casino.php');
            break;
        case $baseUrl . '/booking':
            include('./book/book.php');
            break;
        case $baseUrl . '/booking/roomdetail':
            if (isset($_POST['Roomid'])) {
                include('./book/roomdetail.php');
            } else {
                include('./404/404.php');
            }
            break;
        case $baseUrl . '/booking/customerdetails':
            if (isset($_SESSION['roomid'])) {
                include('./book/customerdetails.php');
            } else {
                include('./404/404.php');
            }
            break;
        case $baseUrl . '/booking/confirm':
            if (isset($_SESSION['roomid'])) {
                include('./book/confirm.php');
            } else {
                include('./404/404.php');
            }
            break;
        case $baseUrl . '/booking/resconfirm':
            include('./book/resconfirmed.php');
            break;
        case $baseUrl . '/dining':
            $HelpObj->clearReservation();
            include('./restaurant/restaurant.php');
            break;
        case $baseUrl . '/dining/menu':
            include('./restaurant/menu/foodmenu.php');
            break;
        case $baseUrl . '/rating':
            include('./rest-api/index.html');
            break;
        case $baseUrl . '/signin':
            $HelpObj->clearReservation();
            include('./login/regisztracio.php');
            break;
        case $baseUrl . '/signin/regconfirmed':
            include('./login/regconfirmed.php');
            break;
        case $baseUrl . '/contactus':
            $HelpObj->clearReservation();
            include('./contact/contact.php');
            break;
        case $baseUrl . '/account':
            //$HelpObj->clearReservation();
            include('./login/useracc.php');
            break;
        case $baseUrl . '/admin':
            if (isset($_SESSION['isadmin']) && $_SESSION['isadmin'] === 1) {
                include('./login/admin.php');
            } else {
                include('./404/404.php');
            }
            break;
        case $baseUrl . '/newaccemail':
            include('./login/newaccountemail.php');
            break;
        case $baseUrl . '/guestreservations':
            if (isset($_SESSION['username'])) {
                include('./login/guestreservations.php');
            }
            break;
        case $baseUrl . '/userseditadmin':
            if (isset($_SESSION['isadmin']) && $_SESSION['isadmin'] === 1) {
                include('./login/userseditadmin.php');
            } else {
                include('./404/404.php');
            }
            break;
        case $baseUrl . '/logout':
            include('./login/logout.php');
            break;
        case $baseUrl . '/reportconfirmed':
            include('./contact/reportconfirmed.php');
            break;
        case $request === $baseUrl . '/contactus' || $request === $baseUrl . '/contactusREPORT':
            include('./contact/contact.php');
            $message = "The report was sent succesfully! We will reply soon as possible";
            echo "<script type='text/javascript'>alert('$message');</script>";
            break;
        case strpos($request, "activate?email") !== false:
            include('./aktivalas/aktivalas.php');
            break;
        case strpos($request, "passwordreset?email") !== false:
            if (isset($_SESSION['username'])) {
                include('./404/404.php');
            } else {
                include('./aktivalas/setnewpassword.php');
            }
            break;
        case $baseUrl . '/forgotpassword':
            if (isset($_SESSION['username'])) {
                include('./404/404.php');
            } else {
                include('./aktivalas/elfelejtettjelszo.php');
            }
            break;
        default:
            //http_response_code(404);
            include('./404/404.php');
            break;
    }

    if ($request != $baseUrl . '/gambling' && $request != $baseUrl . '/admin' && strpos($request, "activate?email") === false && $request != $baseUrl . '/forgotpassword' && strpos($request, "passwordreset?email") === false) {
        include('./footer/footer.php');
    }

    ?>
    <!-- <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script> -->
    <script src="<?php if ($mennyiper === ($baseMennyiper + 2)) {
                        echo '.';
                    } else if ($mennyiper === ($baseMennyiper + 3)) {
                        echo '../.';
                    } else if ($mennyiper === ($baseMennyiper + 4)) {
                        echo '../../.';
                    } ?>./navbar/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>

</html>
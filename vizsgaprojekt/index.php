<?php
session_start();

define('VEDETT', 'igen');

$baseUrl = '/14aphp/OKJ-vizsgaprojekt/vizsgaprojekt'; //szervernél: /~PeacefulParadise/
$request = $_SERVER['REQUEST_URI']; //mindenkori url
$mennyiper = substr_count($request, '/');
$baseMennyiper = substr_count($baseUrl, '/');

if (isset($_GET['m'])) {
    $m = $_GET['m'];
} else {
    $m = 'home';
}
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
$ServiceObj = new Service();
$GuestObj = new Guest();
$RoomObj = new Room();
$ReservationObj = new reservation();
$HelpObj = new Help();
include('action.php');
if (isset($_POST['btn_send2'])) {
    if (isset($_SESSION['adult'])) {
        $ReservationObj->savereservation($_SESSION);
        $felhasznalo['UserName'] = $_SESSION['username'];
        $felhasznalo['CustomerID'] = $_SESSION['uid'];
        $felhasznalo['sid'] = $_SESSION['sid'];
        $felhasznalo['Email'] = $_SESSION['loginemail'];
        session_unset();
        $_SESSION['sid']= $felhasznalo['sid'];
        $_SESSION['uid'] = $felhasznalo['CustomerID'];
        $_SESSION['username'] =  $felhasznalo['UserName'];
        $_SESSION['loginemail'] = $felhasznalo['Email'];
        //$HelpObj->writearray($_SESSION);
    } else {
    }
}
// echo ('<pre>');
// print_r($_SESSION);

// echo ('</pre>');
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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php if ($mennyiper === ($baseMennyiper+2)) {
                                        echo '.';
                                    } else if ($mennyiper === ($baseMennyiper+3)) {
                                        echo '../.';
                                    }
                                    else if ($mennyiper === ($baseMennyiper+4)) {
                                        echo '../../.';
                                    } ?>./404/404.css">
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
            <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro&display=swap" rel="stylesheet">
            <link rel="stylesheet" href="./mainpage/mainpage.css">
            
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
    if ($request === $baseUrl . '/booking/resconfirm' || $request === $baseUrl . '/signin/regconfirm') {
        echo '<link href="https://fonts.googleapis.com/css?family=Open+Sans:300|Montserrat" rel="stylesheet" type="text/css">
	    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="../book/resconfirmed.css">
        <link rel="stylesheet" href="../navbar/style.css">
        <link rel="stylesheet" href="../footer/style.css">';
    }
    if ($request === $baseUrl . '/dining') {
        echo '
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
            <link rel="stylesheet" href="./restaurant/restaurant.css">
            ';
    }
    if ($request === $baseUrl . '/dining/menu') {
        echo '
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
                <link rel="stylesheet" href="../restaurant/menu/foodmenu.css">
                ';
    }
    if ($request === $baseUrl . '/admin')  {
        echo '
                <link rel="stylesheet" href="./login/reservations.css">
                ';
    }
    if ($request === $baseUrl . '/userseditadmin') {
        echo '
                <link rel="stylesheet" href="./login/reservations.css">
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
    ?>

    <link rel="icon" href="<?php if ($mennyiper === ($baseMennyiper+2)) {
                                        echo '.';
                                    } else if ($mennyiper === ($baseMennyiper+3)) {
                                        echo '../.';
                                    }
                                    else if ($mennyiper === ($baseMennyiper+4)) {
                                        echo '../../.';
                            } ?>./pictures/small_rounded.png">
    <link rel="stylesheet" href="<?php if ($mennyiper === ($baseMennyiper+2)) {
                                        echo '.';
                                    } else if ($mennyiper === ($baseMennyiper+3)) {
                                        echo '../.';
                                    }
                                    else if ($mennyiper === ($baseMennyiper+4)) {
                                        echo '../../.';
                                    } ?>./navbar/style.css">
    <link rel="stylesheet" href="<?php if ($mennyiper === ($baseMennyiper+2)) {
                                        echo '.';
                                    } else if ($mennyiper === ($baseMennyiper+3)) {
                                        echo '../.';
                                    }
                                    else if ($mennyiper === ($baseMennyiper+4)) {
                                        echo '../../.';
                                    } ?>./navbar/preloader.css">
    <link rel="stylesheet" href="<?php if ($mennyiper === ($baseMennyiper+2)) {
                                        echo '.';
                                    } else if ($mennyiper === ($baseMennyiper+3)) {
                                        echo '../.';
                                    }
                                    else if ($mennyiper === ($baseMennyiper+4)) {
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

    switch ($request) {
        case $baseUrl . '':
            include('./mainpage/mainpage.php');
            break;
        case $baseUrl . '/':
            include('./mainpage/mainpage.php');
            break;
        case $baseUrl . '/gambling':
            include('./casino/casino.php');
            break;
        case $baseUrl . '/booking':
            include('./book/book.php');
            break;
        case $baseUrl . '/booking/roomdetail':
            include('./book/roomdetail.php');
            break;
        case $baseUrl . '/booking/customerdetails':
            include('./book/customerdetails.php');
            break;
        case $baseUrl . '/booking/confirm':
            include('./book/confirm.php');
            break;
        case $baseUrl . '/booking/resconfirm':
            include('./book/resconfirmed.php');
            break;
        case $baseUrl . '/dining':
            include('./restaurant/restaurant.php');
            break;
        case $baseUrl . '/dining/menu':
            include('./restaurant/menu/foodmenu.php');
            break;
        case $baseUrl . '/signin':
            include('./login/regisztracio.php');
            break;
        case $baseUrl . '/signin/regconfirm':
            include('./login/regconfirmed.php');
            break;
        case $baseUrl . '/contactus':
            include('./contact/contact.php');
            break;
        case $baseUrl . '/admin':
            if (isset($_SESSION['loginemail']) && $_SESSION['loginemail'] === "admin@admin") {
                include('./login/admin.php');
            }
            else {
                include('./404/404.php');
            }
            break;
            //else if ($m == 'admin' && $_SESSION['loginemail'] == "admin@admin") {
            //     include('./login/admin.php');
        case $baseUrl . '/userseditadmin':
            include('./login/userseditadmin.php');
            break;
        case $baseUrl . '/logout':
            echo $baseUrl;
            include('./login/logout.php');
            break;
        case $request === $baseUrl . '/contactus' || $request === $baseUrl . '/contactusREPORT':
            include('./contact/contact.php');
            $message = "The report was sent succesfully! We will reply soon as possible";
            echo "<script type='text/javascript'>alert('$message');</script>";
            break;
        default:
            http_response_code(404);
            require __DIR__ . './404/404.php';
            break;
    }

    if ($request != $baseUrl . '/gambling' && $request != $baseUrl . '/admin') {
        include('./footer/footer.php');
    }

    ?>


    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="<?php if ($mennyiper === 5) {
                        echo '.';
                    } else if ($mennyiper === 6) {
                        echo '../.';
                    }
                    if ($mennyiper === 7) {
                        echo '../../.';
                    } ?>./navbar/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script>
        var loader = document.getElementById("preloader");
        window.addEventListener("load", function() {
            loader.style.display = "none";
        })
        // $(window).on("load", function() {
        //     $(".loader-wrapper").fadeOut("slow");
        // });
    </script>
</body>

</html>
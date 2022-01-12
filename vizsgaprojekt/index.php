<?php
session_start();

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
$ServiceObj = new Service();
$GuestObj = new Guest();
$RoomObj = new Room();
$ReservationObj = new reservation();
include('action.php');
if (isset($_POST['btn_send2'])) {
    if (isset($_SESSION['adult'])) {
        $ReservationObj->savereservation($_SESSION);
        session_unset();
    }
    else{

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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="./404/404.css">
    <?php
    if ($m == 'home') {
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
            <link rel="stylesheet" href="./mainpage/mainpage.css"> 
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
            <link rel="stylesheet" href="./mainpage/slider/style.css">
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Big+Shoulders+Display:wght@700&display=swap" rel="stylesheet"> 
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro&display=swap" rel="stylesheet">';
            
    }
    if ($m == 'casino') {
        echo '
            <link rel="stylesheet" href="./casino/casino.css">
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Changa:wght@700&display=swap" rel="stylesheet"> 
            <link rel="stylesheet" href="./casino/gamescards/style.css">
            <link rel="stylesheet" href="./casino/pokercards/style.css">
            ';
    }
    if ($m == 'book') {
        echo '<link rel="stylesheet" href="./book/book.css">
            <link rel="stylesheet" href="./book/button-hover/dist/style.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
            <link rel="stylesheet" href="./css/bookingroomscards.css">
            <script src="./book/script.js"></script>';
    }
    if ($m == 'roomdetail') {
        echo '<link rel="stylesheet" href="./book/roomdetail.css">';
    }
    if ($m == 'confirm') {
        echo '<link rel="stylesheet" href="./book/confirm.css">';
    }
    if ($m == 'customerdetails') {
        echo ' <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
        <link rel="stylesheet" href="./book/customerdetails.css">';
    }
    if ($m == 'resconfirmed') {
        echo '<link href="https://fonts.googleapis.com/css?family=Open+Sans:300|Montserrat" rel="stylesheet" type="text/css">
	    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="./book/resconfirmed.css">';
    }
    if ($m == 'restaurant') {
        echo '
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
            <link rel="stylesheet" href="./restaurant/restaurant.css">
            ';
    }
    if ($m == 'foodmenu') {
        echo '
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
                <link rel="stylesheet" href="./restaurant/menu/foodmenu.css">
                ';
    }
    if ($m == 'contactus' || $m == 'contactusREPORT') {
        echo '  <link rel="stylesheet" href="./contact/contact.css">';
    }
    ?>
    <link rel="icon" href="./pictures/small_rounded.png">
    <link rel="stylesheet" href="./navbar/style.css">
    <link rel="stylesheet" href="./footer/style.css">
    <title>Peaceful Paradise</title>
</head>

<body>
    <?php
    include('./navbar/navbar.php');
    if ($m == 'home') {
        include('./mainpage/mainpage.php');
    }
    else if ($m == 'casino') {
        include('./casino/casino.php');
    }
    else if ($m == 'book') {
        include('./book/book.php');
    }
    else if ($m == 'roomdetail') {
        include('./book/roomdetail.php');
    }
    else if ($m == 'customerdetails') {
        include('./book/customerdetails.php');
    }
    else if ($m == 'confirm') {
        include('./book/confirm.php');
    }
    else if ($m == 'resconfirmed') {
        include('./book/resconfirmed.php');
    }
    else if ($m == 'restaurant') {
        include('./restaurant/restaurant.php');
    }
    else if ($m == 'foodmenu') {
        include('./restaurant/menu/foodmenu.php');
    }
    else if ($m == 'contactus') {
        include('./contact/contact.php');
    }
    else if ($m == 'contactusREPORT') {
        include('./contact/contact.php');
        $message = "The report was sent succesfully! We will reply soon as possible";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
    elseif ($m == 'regisztracio') {
        include('./login/regisztracio.php');
    }
    else {
        include('./404/404.php');
    }
    if ($m != 'casino') {
        include('./footer/footer.php');
    }
    




    ?>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="./navbar/script.js"></script>
</body>

</html>
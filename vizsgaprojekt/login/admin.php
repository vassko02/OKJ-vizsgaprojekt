<?php 
    defined('VEDETT') or die(' ísx');
?>
<div class="row">
<?php 
  if (isset($_POST['submit'])) {
   $roomss[] = $RoomObj->selectroomidbyname($_POST);
  //  echo '<pre>';
  //  print_r($roomss[0][0]);
  //  echo '</pre>';
    $_SESSION['roomid'] = $roomss[0][0]['RoomID'];
    $_SESSION['customerid'] = $_POST['customerid'];
    $_SESSION['guestnumber'] = $_POST['guestnumber'];
    $_SESSION['reservationid'] = $_POST['reservationid'];
    $_SESSION['price'] = $_POST['price'];
    $_SESSION['serviceid'] = $_POST['serviceid'];
    $_SESSION['arrival'] = $_POST['arrival'];
    $_SESSION['leaving'] = $_POST['leaving'];
    $_SESSION['adults'] = $_POST['adults'];
    $_SESSION['children'] = $_POST['children'];
    $ReservationObj->updatereservation($_SESSION);
   
  }
    $reservations[] = $ReservationObj->selectallreservation();
    $allrooms = $RoomObj->selectallrooms();
    $services = $ServiceObj->getallservice();
    foreach ($allrooms as $oneroom) {
    
    } 
  $counter = 0;
  $counter2 = 0;
foreach ($reservations as $onereservation) {
foreach ($onereservation as $oneonereservation) {
  $room[]=$RoomObj->selectoneroom2($oneonereservation['RoomID']);
   echo'
   <div class="container">  
   <form id="reservation" action="" method="POST">
     <h3>'.$oneonereservation['Name'].'</h3>
     <h4>'.$oneonereservation['Email'].'</h4>
     <input type="hidden" name="customerid" value="'.$oneonereservation['CustomerID'].'"/>
     <input type="hidden" name="guestnumber" value="'.$oneonereservation['GuestNumber'].'"/>
     <input type="hidden" name="reservationid" value="'.$oneonereservation['ReservationID'].'"/>
     <input type="hidden" name="price" value="'.$oneonereservation['Price'].'"/>
     <fieldset>
     <select class="form-select" name="roomname" aria-label="Default select example">

      ';foreach ($allrooms as $oneroom) {
       $roomname =  $RoomObj->selectoneroomname($oneonereservation['RoomID']);
        echo ' <option value="' . $oneroom['RoomName'] . ' "';if ($oneroom['RoomName'] == $roomname['RoomName']) {
          echo 'selected';
         }echo' ">' . $oneroom['RoomName'] . '   </option>';
     $counter2 += 1;
     } 
     echo'
     </select>




     </fieldset>
     <fieldset>
     <select class="form-select" name="serviceid" aria-label="Default select example">
     ';

        foreach ($services as $service) {
          $servicee = $ServiceObj->getservicebyid($oneonereservation['ServiceID']);
          
              echo ' <option value="' . $service['ServiceID'] . '"';
              if ($service['ServiceType']  == $servicee[0]['ServiceType']) {
              echo 'selected';
              }
              
              echo'>' . $service['ServiceType'] . ' $'.$service['ServicePrice'].' /night </option>';
          } 
          
          echo'
          </select>




     </fieldset>
     <fieldset>
       <input class="form-control" name="arrival" value="'.$oneonereservation['ArrivalDate'].'" type="date" tabindex="2" required>
       <input class="form-control" name="leaving" value="'.$oneonereservation['LeavingDate'].'"  type="date" tabindex="3" required>
     </fieldset>
     <fieldset>
     <input class="form-control" name="adults" value="'.$oneonereservation['Adults'].'" type="number" tabindex="2" required>
     <input class="form-control" name="children" value="'.$oneonereservation['Children'].'"  type="number" tabindex="3" required>
     </fieldset>
     <fieldset>
       <textarea placeholder="Type your Message Here...." tabindex="5" ></textarea>
     </fieldset>
     <fieldset>
       <button name="submit" type="submit" id="reservation-submit" data-submit="...Sending">Reservation Update</button>
     </fieldset>
   </form>
  
   
 </div>

   ';
   $counter+=1;
}
}

?>
 
 </div>
  

 
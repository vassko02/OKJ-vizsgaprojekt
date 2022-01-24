 <?php 
    defined('VEDETT') or die(' ísx');
?>
<div class="row">
  <button onclick="sendEmail()">Email</button>
<?php 
   
  if (isset($_POST['submit'])) {
   $roomss[] = $RoomObj->selectroomidbyname($_POST);
  
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
  if (isset($_POST['addconsumption'])) {
      
      $_SESSION['reservationid'] = $_POST['reservationid'];
      header('Location: '.$baseUrl.'/dining/menu');

  }
  if (isset($_POST['delete'])) {
    $_SESSION['reservationid'] = $_POST['reservationid'];
    $ReservationObj->deleteconsumption( $_SESSION['reservationid']);
    $ReservationObj->deletereservation( $_SESSION['reservationid']);

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
   <div  class="container" id="container">  
   <form id="reservation" class="neon1" action="" method="POST">
     <h3>'.$oneonereservation['Name'].'</h3>
     <h4 class="resemail">'.$oneonereservation['Email'].'</h4>
     <div class="dropdown-divider"></div>
     <input type="hidden" name="customerid" value="'.$oneonereservation['CustomerID'].'"/>
     <input type="hidden" name="guestnumber" value="'.$oneonereservation['GuestNumber'].'"/>
     <input type="hidden" name="reservationid" value="'.$oneonereservation['ReservationID'].'"/>
     <input type="hidden" name="price" value="'.$oneonereservation['Price'].'"/>
     <fieldset>
     <h4 for="">Room type</h4>
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
     <h4 for="">Service type</h4>
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
      <h4 for="">Check in - Check out</h4>
      <input class="form-control" name="arrival" value="'.$oneonereservation['ArrivalDate'].'" type="date" tabindex="2" required>
      <input class="form-control" name="leaving" value="'.$oneonereservation['LeavingDate'].'"  type="date" tabindex="3" required>
     </fieldset>
     <fieldset>
      <h4 for="">Adults</h4>
      <input class="form-control" name="adults" value="'.$oneonereservation['Adults'].'" type="number" tabindex="2" required>
      <h4 for="">Children</h4>
      <input class="form-control" name="children" value="'.$oneonereservation['Children'].'"  type="number" tabindex="3" required>
     </fieldset>
     <fieldset>
      <h4 for="">Message</h4>
      <textarea placeholder="Type your Message Here...." tabindex="5" ></textarea>
     </fieldset>
     <fieldset>
      <button name="submit" type="submit" id="reservation-submit" data-submit="...Sending">Reservation Update</button>
      <button name="addconsumption" type="submit" id="Add-Consumption" data-submit="...Sending">Add Consumption</button>
      <button name="delete" type="submit" id="reservation-delete" data-submit="...Sending">Delete Reservation</button>
     </fieldset>
   </form>
  
   
 </div>

   ';
   $counter+=1;
}
}

?>
 
 </div>

 <script>
   function sendEmail() {
     <?php $MailObj->sendEmail();?>
   }
 </script>
  






 
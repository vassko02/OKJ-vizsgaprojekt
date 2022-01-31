 <?php
  defined('VEDETT') or die(' ísx');
  ?>
 <div class="row">
   <!-- <button onclick="sendEmail()">Email</button> -->
   <?php
    $empty = false;
    if (isset($_POST['submit'])) {
      $roomss[] = $RoomObj->selectroomidbyname($_POST);
      
      $_SESSION['roomid'] = $roomss[0][0]['RoomID'];
      $_SESSION['customerid'] = $_POST['customerid'];
      $_SESSION['guestnumber'] = $_POST['guestnumber'];
      $_SESSION['reservationid'] = $_POST['reservationid'];
      $_SESSION['serviceid'] = $_POST['serviceid'];
      $_SESSION['arrival'] = $_POST['arrival'];
      $_SESSION['leaving'] = $_POST['leaving'];
      $_SESSION['adults'] = $_POST['adults'];
      $_SESSION['children'] = $_POST['children'];
      
      $service = $ServiceObj->getservicebyid($_SESSION['serviceid']);
     
      $date1 = date_create($_SESSION['arrival']);
      $date2 = date_create($_SESSION['leaving']);
      $diff = date_diff($date1,$date2);
      $_SESSION['fullprice'] = ($service[0]['ServicePrice']+$roomss[0][0]['RoomPrice'])* $diff->format("%a");
      
      $ReservationObj->updatereservation($_SESSION);
    }
    if (isset($_POST['addconsumption'])) {

      $_SESSION['reservationid'] = $_POST['reservationid'];
      echo "<script>window.location.href='".$baseUrl."/dining/menu';</script>";
    }
    if (isset($_POST['deletee'])) {
      $_SESSION['reservationid'] = $_POST['reservationid']; 
      $ReservationObj->deleteconsumption($_SESSION['reservationid']);
      $ReservationObj->deletereservation($_SESSION['reservationid']);
    }
    $HelpObj->writearray($_POST);
    $reservations[] = $ReservationObj->selectallreservation();
    $allrooms = $RoomObj->selectallrooms();
    $services = $ServiceObj->getallservice();
    foreach ($allrooms as $oneroom) {
    }
    $counter = 0;
    $counter2 = 0;
    foreach ($reservations as $onereservation) {
      foreach ($onereservation as $oneonereservation) {
        $room[] = $RoomObj->selectoneroom2($oneonereservation['RoomID']);
        echo '
   <div  class="container" id="container">
   <form id="reservation" class="neon1" action="" method="POST">
     <h3>' . $oneonereservation['Name'] . '</h3>
     <h4 class="resemail">' . $oneonereservation['Email'] . '</h4>
     <div class="dropdown-divider"></div>
     <input type="hidden" name="customerid" value="' . $oneonereservation['CustomerID'] . '"/>
     <input type="hidden" name="guestnumber" value="' . $oneonereservation['GuestNumber'] . '"/>
     <input type="hidden" name="reservationid" value="' . $oneonereservation['ReservationID'] . '"/>
     <input type="hidden" name="price" value="' . $oneonereservation['Price'] . '"/>
     <fieldset>
     <h4 for="">Room type</h4>
     <select class="form-select" name="roomname" aria-label="Default select example">

      ';
        foreach ($allrooms as $oneroom) {
          $roomname =  $RoomObj->selectoneroomname($oneonereservation['RoomID']);
          echo ' <option value="' . $oneroom['RoomName'] . ' "';
          if ($oneroom['RoomName'] == $roomname['RoomName']) {
            echo 'selected';
          }
          echo ' ">' . $oneroom['RoomName'] . '   </option>';
          $counter2 += 1;
        }
        echo '
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

          echo '>' . $service['ServiceType'] . ' $' . $service['ServicePrice'] . ' /night </option>';
        }

        echo '
          </select>




     </fieldset>
     <fieldset>
      <h4 for="">Check in - Check out</h4>
      <input class="form-control" name="arrival" value="' . $oneonereservation['ArrivalDate'] . '" type="date" tabindex="2" required>
      <input class="form-control" name="leaving" value="' . $oneonereservation['LeavingDate'] . '"  type="date" tabindex="3" required>
     </fieldset>
     <fieldset>
      <h4 for="">Adults</h4>
      <input class="form-control" name="adults" value="' . $oneonereservation['Adults'] . '" type="number" tabindex="2" required>
      <h4 for="">Children</h4>
      <input class="form-control" name="children" value="' . $oneonereservation['Children'] . '"  type="number" tabindex="3" required>
     </fieldset>
     <fieldset>
      <h4 for="">Message</h4>
      <textarea placeholder="Type your Message Here...." tabindex="5" ></textarea>
     </fieldset>
     <fieldset>
      <button name="submit" type="submit" id="reservation-submit" data-submit="...Sending">Reservation Update</button>
      <button name="addconsumption" type="submit" id="Add-Consumption" data-submit="...Sending">Add Consumption</button>
      <a href="'.$baseUrl.'/delete" class="btn btn-danger w-100 delet"   data-bs-toggle="modal" data-bs-target="#deleteconfirm">Delete</a>
  
     </fieldset>
     <div class="modal fade text-dark"  id="deleteconfirm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-dark" id="staticBackdropLabel" >Please confirm</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete?
      </div>
      <div class="modal-footer">
        <button  class="btn btn-secondary w-25 no" data-bs-dismiss="modal">No</button>
        <button name="deletee" type="submit" class="btn btn-primary w-25 deletee" id="btnYes">Yes</button>
      </div>
    </div>
  </div>
</div>
   </form>


 </div>

   ';
        $counter += 1;
      }
    }
  if ($counter == 0) {
    echo'
    <div class="donthaveres">
    <h1 id="nagytitle">There are no reservations at the moment!</h1>
    <h4><a href="'.$baseUrl.'/booking">We are not mooning :(</a></h4>
    </div>
    ';
  }
?>
 </div>

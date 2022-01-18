<?php 
    defined('VEDETT') or die(' ísx');
?>
<div class="row">
<?php 
    $reservations[] = $ReservationObj->selectallreservation();
  $counter = 0;
foreach ($reservations as $onereservation) {
foreach ($onereservation as $oneonereservation) {
  $room[]=$RoomObj->selectoneroom2($oneonereservation['RoomID']);
   echo'
   <div class="container">  
   <form id="contact" action="" method="post">
     <h3>'.$oneonereservation['Name'].'</h3>
     <h4>'.$oneonereservation['Email'].'</h4>
     <fieldset>
       <input value="'.$room[$counter]['RoomName'].'" type="text" tabindex="1" required autofocus>
     </fieldset>
     <fieldset>
       <input value="'.$oneonereservation['ServiceID'].'" type="text" tabindex="1" required autofocus>
     </fieldset>
     <fieldset>
       <input value="'.$oneonereservation['ArrivalDate'].'" type="date" tabindex="2" required>
       <input value="'.$oneonereservation['LeavingDate'].'"  type="date" tabindex="3" required>
     </fieldset>
     <fieldset>
     <input value="'.$oneonereservation['Adults'].'" type="number" tabindex="2" required>
     <input value="'.$oneonereservation['Children'].'"  type="number" tabindex="3" required>
     </fieldset>
     <fieldset>
       <textarea placeholder="Type your Message Here...." tabindex="5" required></textarea>
     </fieldset>
     <fieldset>
       <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
     </fieldset>
   </form>
  
   
 </div>

   ';
   $counter+=1;
}
}
?>
 
 </div>
  
 

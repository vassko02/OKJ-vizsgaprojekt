<?php 
    defined('VEDETT') or die(' ísx');
?>
<div class="row">
<?php 
  if (isset($_POST['submit'])) {

  //  echo '<pre>';
  //  print_r($roomss[0][0]);
  //  echo '</pre>';

  $HelpObj->writearray($_POST);

   
  }
  $users = $GuestObj->getallusers();
 // $HelpObj->writearray($users);
 foreach ($users as $oneuser) {
     echo'


<div class="container">  
  <form id="reservation" action="" method="POST">
    <h3>USER: '.$oneuser['CustomerID'].'</h3>

    <fieldset>
      <input class="form-control" name="name" placeholder="Your name" type="text" value="'.$oneuser['Name'].'" tabindex="1" required autofocus>
    </fieldset>
    <fieldset>
      <input class="form-control" name="email" placeholder="Your Email Address" value="'.$oneuser['Email'].'" type="email" tabindex="2" required>
    </fieldset>
    <fieldset>
      <input class="form-control" name="phonenumber" placeholder="Your Phone Number" value="'.$oneuser['PhoneNumber'].'" type="tel" tabindex="3" required>
    </fieldset>
    <fieldset>
    <input  class="form-control" name="address" placeholder="Your Address " value="'.$oneuser['Address'].'" type="text" tabindex="3" required>
    </fieldset>
    <fieldset>
    <input class="form-check-input" type="checkbox"  id="isadmin" name="isadmin" ';
    if ($oneuser['IsAdmin'] == 1) {
        echo 'checked ';
    }
    echo'
    value="'.$oneuser['IsAdmin'].'">
    <label for="isadmin">Admin role</label>
    </fieldset>
    <fieldset>
      <button name="submit" type="submit" id="reservation-submit" data-submit="...Sending">Submit</button>
    </fieldset>
  </form>
 
  
</div>

  
     ';
 
  }
?>
 
 </div>
  






 
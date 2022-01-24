<?php 
    defined('VEDETT') or die(' ísx');
?>
<div class="row">
<?php 
  if (isset($_POST['submit'])) {
    if (isset($_POST['isadmin'])) {
      $_POST['isadmin'] = 1;
    }
    $GuestObj->updatecustomer2($_POST);
   
  }
  if (isset($_POST['delete'])) {
    $GuestObj->deleteuser($_POST['CustomerID']);
  }
  $users = $GuestObj->getallusers();
 // $HelpObj->writearray($users);
 foreach ($users as $oneuser) {
     echo'


<div class="container">  
  <form id="reservation" class="neon1" action="" method="POST">
    <h3>USER ID: '.$oneuser['CustomerID'].'</h3>

    <fieldset>
      <label for="name">Name: </label>
      <input class="form-control" id="name" name="name" placeholder="Your name" type="text" value="'.$oneuser['Name'].'" tabindex="1" required autofocus>
      <input type="hidden" name="CustomerID" value="'.$oneuser['CustomerID'].'"/>
    </fieldset>
    <fieldset>
    <label for="name">Email: </label>
      <input class="form-control" id="email" name="email" placeholder="Your Email Address" value="'.$oneuser['Email'].'" type="email" tabindex="2" required>
    </fieldset>
    <fieldset>
    <label for="name">Phone Number: </label>
      <input class="form-control"id="phonenumber" name="phonenumber" placeholder="Your Phone Number" value="'.$oneuser['PhoneNumber'].'" type="tel" tabindex="3" >
    </fieldset>
    <fieldset>
    <label for="name">Address: </label>
    <input  class="form-control" id="address" name="address" placeholder="Your Address " value="'.$oneuser['Address'].'" type="text" tabindex="3" >
    </fieldset>
    <fieldset>
    ';
    if ($oneuser['Name'] != "admin" && $oneuser['Email'] != "admin@admin") {
      echo'
    <input class="form-check-input ml-1 mt-2" type="checkbox"  id="isadmin" name="isadmin" ';
      if ($oneuser['IsAdmin'] == 1) {
        echo 'checked ';
    }
    echo'
    value="'.$oneuser['IsAdmin'].'">
    <p class="ml-4">Admin role</p>';
    }
    else {
      echo'<p>Always admin</p>';
    }
    
    echo'
    </fieldset>
    <fieldset>
      <button name="submit" type="submit" id="reservation-submit" data-submit="...Sending">Submit</button>
      <button name="delete" type="submit" id="reservation-delete" data-submit="...Sending">Delete</button>
    </fieldset>
  </form>
 
  
</div>

  
     ';
 
  }
?>
 
 </div>
  






 
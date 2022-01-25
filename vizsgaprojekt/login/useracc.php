<?php 
    defined('VEDETT') or die(' ísx');
?>
<div class="row">
<?php 
  if (isset($_POST['submit'])) {
    $GuestObj->updatecustomer2($_POST);
   
  }
 
  $users = $GuestObj->getallusers();
  foreach ($users as $item) {
    if ($item['UserName'] == $_SESSION['username']) {
        $user['name'] = $item['Name'];
        $user['email'] = $item['Email'];
        $user['phonenumber'] = $item['PhoneNumber'];
        $user['address'] = $item['Address'];
        $user['username'] = $item['UserName'];
        $user['customerid'] = $item['CustomerID'];
    }
  }

     echo'


<div class="container">  
  <form id="reservation" class="neon1" action="" method="POST">
    <h3>'.$user['name'].'</h3>
    <hr class="hr">
    <fieldset>
      <label for="name">Username: </label>
      <input class="form-control text-dark" id="username" name="username" placeholder="Your Username" type="text" value="'.$user['username'].'" tabindex="1" required autofocus>
    </fieldset>
    <fieldset>
      <label for="name">Name: </label>
      <input class="form-control" id="name" name="name" placeholder="Your name" type="text" value="'.$user['name'].'" tabindex="1" required autofocus>
      <input type="hidden" name="CustomerID" value="'.$user['customerid'].'"/>
    </fieldset>
    <fieldset>
    <label for="name">Email: </label>
      <input class="form-control" id="email" name="email" placeholder="Your Email Address" value="'.$user['email'].'" type="email" tabindex="2" required>
    </fieldset>
    <fieldset>
    <label for="name">Phone Number: </label>
      <input class="form-control"id="phonenumber" name="phonenumber" placeholder="Your Phone Number" value="'.$user['phonenumber'].'" type="tel" tabindex="3" >
    </fieldset>
    <fieldset>
    <label for="name">Address: </label>
    <input  class="form-control" id="address" name="address" placeholder="Your Address " value="'.$user['address'].'" type="text" tabindex="3" >
    </fieldset>
    <fieldset>
      <button name="submit" class="submit" type="submit" id="reservation-submit" data-submit="...Sending">Submit</button>
    </fieldset>
  </form>
 
  
</div>

  
     ';
 
  
?>
 
 </div>
  






 
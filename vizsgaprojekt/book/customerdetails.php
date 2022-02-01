<?php
     if (isset($_POST['select'])) {
        $_SESSION['serviceid'] = $_POST['select'];
        
     }
     $loggedin = false;
     if (isset($_SESSION['loginemail'])) {
         $loggedin = true;
         $userdetails[] = $GuestObj->findcustomerbyemail($_SESSION['loginemail']);
     }
  
?>

<div class="container  mt-5 bg-dark  keret">
    <div class="row">
        <div class="row">
            <img class="smalllogo col-1">
            <h1 class="mt-3 col-11">Guest information</h1>

        </div>
        <div class="col">
            <form action="<?php echo $baseUrl?>/booking/confirm" method="post">
                     <div class="mb-3 mt-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control bg-dark text-light"  placeholder="Bac Ilus" name="name" value="<?php if ($loggedin == true) {
                           echo $userdetails[0]['Name'];
                        }
                        else if(isset($_SESSION['customername'])) echo $_SESSION['customername']; else{ echo("Bac Ilus"); } ?>" id="name">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control bg-dark text-light" value="<?php if ($loggedin == true) {
                              echo $userdetails[0]['Email'];
                        }else if(isset($_SESSION['email'])) echo $_SESSION['email']; else{ echo("example@gmail.com"); } ?>" id="exampleFormControlInput1" placeholder="name@example.com">
                    </div>
                    <div class="mb-3">
                        <label for="tel" class="form-label">Phone number</label>
                        <input type="tel" name="tel" class="form-control bg-dark text-light"  value="<?php  if ($loggedin == true) {
                           echo $userdetails[0]['PhoneNumber'];
                        }else if(isset($_SESSION['phonenumber'])) echo $_SESSION['phonenumber'];  else{ echo("+36304206969"); }?>" id="tel" placeholder="+14844608072">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control bg-dark text-light" value="<?php  if ($loggedin == true) {
                           echo $userdetails[0]['Address'];
                        }else if(isset($_SESSION['address'])) echo $_SESSION['address']; else{ echo("9027 Győr Szeszgyár utca 1"); } ?>"  placeholder="3570 S Las Vegas Blvd" name="address" id="address">
                     </div>  
                     <div class="mb-3 mt-3">
                        <label for="message" class="form-label">Message</label>
                        <input type="textarea" class="form-control bg-dark text-light" value="<?php if(isset($_SESSION['Message'])) echo $_SESSION['Message']; else{ echo("Something very very important"); } ?>"  placeholder="Type your message here..." name="Message" id="Message">
                     </div>  
                     <button type="submit" name="btn_send" class="btn btn-warning mb-3">Continue</button>
            </form>
                   
        </div>
    </div>
</div> 








